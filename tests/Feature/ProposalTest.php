<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProposalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function receives_proposal_object()
    {
        $response = $this->postJson(
            '/proposal',
            [
                "cpf" => "123123123123",
                "nome" => "Fulano de Tal",
                "data_nascimento" => "2024-10-10",
                "valor_emprestimo" => 1000.00,
                "chave_pix" => "teste@teste.com"
            ]
        );

        $response->assertStatus(200)
            ->assertJsonStructure([
                "cpf",
                "nome",
                "data_nascimento",
                "valor_emprestimo",
                "chave_pix",
                "status",
                "notificado"
            ]);
    }

    /** @test */
    public function proposal_was_accepted()
    {
        $response = $this->postJson(
            '/proposal',
            [
                "cpf" => "123123123123",
                "nome" => "Fulano de Tal",
                "data_nascimento" => "2024-10-10",
                "valor_emprestimo" => 1000.00,
                "chave_pix" => "teste@teste.com"
            ]
        );

        $response->assertStatus(200)
            ->assertJsonFragment([
                "cpf" => "123123123123",
                "nome" => "Fulano de Tal",
                "data_nascimento" => "2024-10-10",
                "valor_emprestimo" => 1000.00,
                "chave_pix" => "teste@teste.com",
                "status" => "approved",
                "notificado" => true
            ]);
    }
}
