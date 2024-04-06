<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\RequestBorrow;
use App\Enums\RequestBorrowStatus;

// use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request?->user()?->isAdmin()) {
            return redirect()->route('admin.books.index');
        }

        $search = $request->input('search');
        $search = filled($search) && is_string($search) ? strtolower(trim($search)) : null;

        $booksQuery = Book::with('author', 'category')
            ->when($search, function ($query, $search) {
                // Join with the authors table to include author names in the search
                return $query->join('authors', 'books.author_id', '=', 'authors.id')
                    ->where(function ($query) use ($search) {
                        $query->whereRaw('LOWER(books.title) LIKE ?', ["%{$search}%"])
                            ->orWhereRaw('LOWER(books.reference) LIKE ?', ["%{$search}%"])
                            ->orWhereRaw('LOWER(authors.name) LIKE ?', ["%{$search}%"]);
                    })
                    ->select('books.*'); // Ensure only book fields are selected after the join
            });

        return view('books.index', [
            'myBorrowedBooks' => Borrow::where('user_id', auth()->user()->id)
                ->whereNull('returned_at')->select(['user_id', 'book_id'])->pluck('book_id'),

            'myRequestBorrowedBooks' => RequestBorrow::where('user_id', auth()->user()->id)
                ->where('status', RequestBorrowStatus::PENDING)->select(['user_id', 'book_id'])->pluck('book_id'),

            'books' => $booksQuery->paginate(20),
        ]);
    }

}
