<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendedores;

class VendedoresApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Vendedores::all();
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

        return Vendedores::create(
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
        $vendedor = Vendedores::find($id);

        if($vendedor){
            return $vendedor;
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
        $vendedor = Vendedores::find($id);

        if($vendedor){
            $json = $request->getContent();
            $atualizar = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $vendedor->nome = $atualizar['nome'];
            $vendedor->matricula = $atualizar['matricula'];
            $ret = $vendedor->update() ? [$id => 'Atualizado com sucesso!'] : [$id => 'Erro ao atualizar'];
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
        $vendedor = Vendedores::find($id);

        if($vendedor){
            $ret = $vendedor->delete() ? [$id => 'Apagado'] : [$id => 'Erro ao apagar'];
        }else{
            $ret = [$id => 'Não existe'];
        }

        return json_encode($ret);
    }
}
