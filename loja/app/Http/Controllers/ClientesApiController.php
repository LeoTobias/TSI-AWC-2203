<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Clientes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $json = $request->getContent();

        return Clientes::create(
                                    json_decode($json, JSON_OBJECT_AS_ARRAY)
                                );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Clientes::find($id);

        if($cliente){
            return $cliente;
        }else{
            return json_decode([$id => 'Não existe']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Clientes::find($id);

        if($cliente){
            $json = $request->getContent();
            $atualizar = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $cliente->nome = $atualizar['nome'];
            $cliente->endereco = $atualizar['endereco'];
            $cliente->email = $atualizar['email'];
            $cliente->telefone = $atualizar['telefone'];
            $ret = $cliente->update() ? [$id => 'Atualizado com sucesso!'] : [$id => 'Erro ao atualizar'];
        }else{
            $ret = [$id => 'Não existe'];
        }

        return json_encode($ret);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Clientes::find($id);

        if($cliente){
            $ret = $cliente->delete() ? [$id => 'Apagado'] : [$id => 'Erro ao apagar'];
        }else{
            $ret = [$id => 'Não existe'];
        }

        return json_encode($ret);
    }
}
