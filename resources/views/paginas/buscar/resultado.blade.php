@extends('layouts.app')
@section('title', __('Resultado da Busca'))

@section('content')
<!-- Include this after the sweet alert js file -->
@include('sweet::alert')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if ($produtos->isEmpty())
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Nenhum resultado para o termo: :termo',['termo' => $termo]) }}</h5>
                    <p class="card-text">Não encontramos nenhum resultado para a busca, altere o termo ou volte para a página principal</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Voltar para Home</a>
                </div>
            </div>

            @else

            <div class="mb-6">
                <h2>{{ __('Resultado da busca para: :termo',['termo' => $termo]) }}</h2>
            </div>

            <div class="card-columns">

                @foreach ($produtos as $produto)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <p class="card-text"><a href="{{ route('categorias.show',$produto->categoria->id) }}"><small>{{ $produto->categoria->nome }}</small></a></p>
                        <a href="{{ route('produtos.show',$produto->id) }}" class="btn btn-primary">{{ __('Ver Produto') }}</a>
                    </div>
                </div>
                @endforeach

            </div>
            @endif

        </div>
    </div>
</div>
@endsection
