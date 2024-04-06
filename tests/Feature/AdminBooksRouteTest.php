<?php

namespace Tests\Feature;

// use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class AdminBooksRouteTest extends TestCase
{
    use RefreshDatabase;

    public function testNoAdminCantAccessRoute(): void
    {
        $user = User::factory()->createOne([
            'is_admin' => false,
        ]);

        $this->assertFalse($user->isAdmin());

        $this->get(route('admin.books.index'))
            ->assertStatus(302)
            ->assertRedirectToRoute('login');

        $this->actingAs($user)->get(route('admin.books.index'))
            ->assertStatus(401);

        $user->is_admin = true;
        $user->save();

        $this->assertTrue($user->isAdmin());

        $this->actingAs($user)->get(route('admin.books.index'))
            ->assertStatus(200);
    }

    public function testRouteRedirects(): void
    {
        // Cria um usuário comum (não-administrador) usando uma factory.
        $user = User::factory()->createOne([
            'is_admin' => false,
        ]);

        // Verifica que, inicialmente, o usuário não é um administrador.
        $this->assertFalse($user->isAdmin());

        // Testa o acesso à rota 'books.index' sem estar logado. Espera-se ser redirecionado para a tela de login.
        $this->get(route('books.index'))
            ->assertStatus(302)
            ->assertRedirectToRoute('login');

        // Testa o acesso à rota 'books.index' estando logado como um usuário não-administrador.
        // Espera-se que o acesso seja concedido (status 200), indicando que a página é acessível para usuários autenticados.
        $this->actingAs($user)->get(route('books.index'))
            ->assertStatus(200);

        // Testa o acesso à rota 'admin.books.index' como um usuário não-administrador.
        // Espera-se um status 401 (Não autorizado), pois apenas administradores deveriam acessar essa rota.
        $this->actingAs($user)->get(route('admin.books.index'))
            ->assertStatus(401);

        // Promove o usuário a administrador.
        $user->is_admin = true;
        $user->save();

        // Verifica que o usuário é agora um administrador.
        $this->assertTrue($user->isAdmin());

        // Testa o acesso à rota 'books.index' estando logado como administrador.
        // Espera-se ser redirecionado para a rota 'admin.books.index', pois administradores têm uma área dedicada.
        $this->actingAs($user)->get(route('books.index'))
            ->assertStatus(302)
            ->assertRedirectToRoute('admin.books.index');

        // Testa o acesso à rota 'admin.books.index' como um administrador.
        // Espera-se que o acesso seja concedido (status 200), indicando que a página de administração é acessível para administradores.
        $this->actingAs($user)->get(route('admin.books.index'))
            ->assertStatus(200);
    }
}
