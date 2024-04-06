<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

// use PHPUnit\Framework\TestCase;

class AdminUserTest extends TestCase
{
    use RefreshDatabase;

    // Testa se a lógica de identificação de usuários administradores está funcionando corretamente.
    public function testIfUserIsAdmin(): void
    {
        // Cria um usuário de teste com o status de administrador definido como falso.
        $user = User::factory()->createOne([
            'is_admin' => false,
        ]);

        // Verifica se o método isAdmin() retorna falso para um usuário não-administrador.
        $this->assertFalse($user->isAdmin());

        // Altera o status do usuário para administrador.
        $user->is_admin = true;
        $user->save(); // Salva a alteração no banco de dados.

        // Verifica se o método isAdmin() agora retorna verdadeiro, indicando que o usuário é um administrador.
        $this->assertTrue($user->isAdmin());
    }
}
