<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\VendedoresController;


class VendedoresControllerTest extends TestCase
{
    private $vendedor;

    public function __construct()
    {
        parent::__construct();
        $this->vendedor = new VendedoresController;
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200); // Assert = Afirmando que vai dar 200 se der qualquer outra coisa o teste falha
    }

    public function testCheckVendedor()
    {
        $this->assertTrue($this->vendedor->checkVendedor(-1));
        $this->assertTrue($this->vendedor->checkVendedor(1));
        $this->assertFalse($this->vendedor->checkVendedor(2));
        $this->assertFalse($this->vendedor->checkVendedor(999999));
    }

    public function testExisteVendedor()
    {
        $this->assertFalse($this->vendedor->existeVendedor('Marcos'));
        $this->assertTrue($this->vendedor->existeVendedor('Paula'));
    }

    public function testGetVendedor()
    {
        $this->assertEquals('Romeu', $this->vendedor->getVendedor(2));
        $this->assertNotEquals('Romeu', $this->vendedor->getVendedor(4));
    }

    public function testGetVendedorJson()
    {
        $this->assertJson($this->vendedor->getVendedorJson(3));
    }

}
