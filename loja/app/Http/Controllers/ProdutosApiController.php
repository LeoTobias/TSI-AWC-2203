<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produtos::all();
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

        return Produtos::create(
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
        $produto = Produtos::find($id);

        if($produto){
            return $produto;
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
        $produto = Produtos::find($id);

        if($produto){
            $json = $request->getContent();
            $atualizar = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $produto->nome = $atualizar['nome'];
            $produto->descricao = $atualizar['descricao'];
            $produto->preco = $atualizar['preco'];
            $ret = $produto->update() ? [$id => 'Atualizado com sucesso!'] : [$id => 'Erro ao atualizar'];
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
        $produtos = Produtos::find($id);

        if($produtos){
            $ret = $produtos->delete() ? [$id => 'Apagado'] : [$id => 'Erro ao apagar'];
        }else{
            $ret = [$id => 'Não existe'];
        }

        return json_encode($ret);
    }
}
