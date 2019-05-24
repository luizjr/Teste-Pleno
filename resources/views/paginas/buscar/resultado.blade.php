@extends('layouts.app')
@section('title', __('Resultado da Busca'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-6">
                <h2>{{ __('Resultado da Busca') }}</h2>
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
        </div>
    </div>
</div>
@endsection
