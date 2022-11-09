<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Clientes;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientesTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
       $cliente = Clientes::create(['nome' => 'Bono Milan',
                                    'endereco' => 'Rua dos Bobos, 0',
                                    'email' => 'meu@email.com',
                                    'telefone' => '99999-8888']);
        $this->assertDataBaseHas('Clientes', ['nome' => 'Bono Milan']);

        /* Forma de Apagar deselegante, pois deixa resquisios no banco
        $cliente->destroy($cliente->id);

        $this->assertDataBaseMissing('Clientes',['nome' => 'Bono Milan']);
        */
    }
}
