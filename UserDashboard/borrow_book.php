<?php
session_start();
if (!isset($_SESSION['id']) || !isset($_GET['book_id'])) {
    // Redirect to login page if the user is not logged in or if the book_id is not provided
    header('Location: login.php');
    exit();
}

// Connect to the database
$connection = mysqli_connect("localhost", "root", "", "sbun");

$book_id = mysqli_real_escape_string($connection, $_GET['book_id']);
$user_id = $_SESSION['id'];

// Assume the status 1 means issued
$status = 1;
$issue_date = date("Y-m-d H:i:s"); // Current date and time

// Insert query
$query = "INSERT INTO issued_books (book_no, book_name, book_author, student_id, status, issue_date) SELECT book_no, book_name, (SELECT author_name FROM authors WHERE author_id = books.author_id), $user_id, $status, '$issue_date' FROM books WHERE book_id = $book_id";

if (mysqli_query($connection, $query)) {
    echo "<p>Book borrowed successfully.</p>";
    // Redirect back to the dashboard or the search page
    header('Location: user_dashboard.php');
} else {
    echo "<p>Error borrowing book: " . mysqli_error($connection) . "</p>";
}

mysqli_close($connection);
?>
