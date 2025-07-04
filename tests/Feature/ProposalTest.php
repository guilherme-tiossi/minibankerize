<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Proposal;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProposalTest extends TestCase
{

    /** @test */
    public function it_lists_all_comment_likes()
    {
        $response = $this->postJson('/proposal',
            [
                "cpf" => "123123123123",
                "nome" => "Fulano de Tal",
                "data_nascimento" => "2024-10-10",
                "valor_emprestimo" => 1000.00,
                "chave_pix" => "teste@teste.com"
            ]
        );

        $response->assertStatus(200)
            ->assertJsonStructure(
            [
                "cpf" => "123123123123",
                "nome" => "Fulano de Tal",
                "data_nascimento" => "2024-10-10",
                "valor_emprestimo" => 1000.00,
                "chave_pix" => "teste@teste.com",
                "status" => "accepted",
                "notificado" => true
            ]
        );
    }
}