<!-- Usa o HTML/CSS/JS do layouts/padrao.blade.php -->
@extends('layouts.padrao')

<!-- Define o título da página/view -->
@section('title', 'Quadro de Avisos')

<!-- Usa o sidebar do layout padrão (layouts/padrao.blade.php) -->
@section('sidebar')
    @parent
    <br>
    --------------- Barra Superior Específica ---------------
@endsection

<!-- Para inserir o conteúdo no layout padrão (layouts/padrao.blade.php) -->
@section('content')

    <h3>Quadro de avisos</h3>
    <br>
    <br>

    <!-- Looping para vetor do Blade -->
    @foreach($avisos as $aviso)

        <!-- If no Blade -->
        @if($aviso['exibir'])
            {{$aviso['data']}}: {{$aviso['aviso']}} <br>
        @else
            Não há avisos
        @endif

    @endforeach

    <?php

    //Também podemos usar o PHP puro aqui! :)
    foreach($avisos as $aviso){

        if($aviso['exibir']){
            echo "{$aviso['data']}: {$aviso['aviso']} <br>";
        }else{
            echo "Não há avisos";
        }
    }

    ?>

@endsection
