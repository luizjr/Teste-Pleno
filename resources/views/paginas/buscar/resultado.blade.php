@extends('layouts.app')
@section('title', __('Cadastrar Categoria'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-6">
                <h2>Resultado da Busca</h2>
            </div>

            <div class="card-columns">
                @foreach ($produtos as $produto)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->nome }}</h5>
                        <p class="card-text">{{ $produto->descricao }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection
