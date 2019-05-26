@extends('layouts.app')
@if(isset($categoria))
@section('title', __('Editar Categoria'))
@else
@section('title', __('Cadastrar Categoria'))
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--<div class="card text-center">-->
            <div class="card">
                <div class="card-header pt-6">
                    <h5 class="inline">
                    @if(isset($categoria))
                    {{ __('Editar Categoria') }}
                    @else
                    {{ __('Cadastrar Categoria') }}
                    @endif
                    </h5>
                </div>

                <div class="card-body">
                    @if(isset($produto))
                    <form action="{{ route('categorias.update', $categoria->id) }}" method="post">
                        <input type="hidden" name="_method" value="patch" />
                    @else
                    <form method="post" action="{{ route('categorias.store') }}">
                    @endif

                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Categoria" @if(isset($categoria)) value="{{ $categoria->nome }}"@endif>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Produto" @if(isset($categoria)) value="{{ $categoria->descricao }}"@endif>
                            </div>
                        </div>

                        <a href="{{url()->previous()}}" class="btn btn-danger">Cancelar</a>
                        <button type="submit" class="btn btn-primary">@if(isset($categoria)) Atualizar @else  Cadastrar @endif</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
