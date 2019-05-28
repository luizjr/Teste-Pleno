@extends('layouts.app')
@if(isset($produto))
@section('title', __('Editar Produto'))
@else
@section('title', __('Cadastrar Produto'))
@endif

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--<div class="card text-center">-->
            <div class="card">
                <div class="card-header pt-6">
                    <h5 class="inline">
                        @if(isset($produto))
                        {{ __('Editar Produto') }}
                        @else
                        {{ __('Cadastrar Produto') }}
                        @endif
                    </h5>
                </div>

                <div class="card-body">
                    @if(isset($produto))
                    <form action="{{ route('produtos.update', $produto->id) }}" method="post">
                        <input type="hidden" name="_method" value="patch" />
                    @else
                    <form method="post" action="{{ route('produtos.store') }}">
                    @endif

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nome">{{ __('Nome') }}</label>
                            <input type="text" class="form-control" id="nome" name="nome" @if(isset($produto)) value="{{ $produto->nome }}"@endif placeholder="{{ __('Nome do Produto') }}">
                        </div>
                        <div class="form-group">
                            <label for="descricao">{{ __('Descrição') }}</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" @if(isset($produto)) value="{{ $produto->descricao }}"@endif placeholder="{{ __('Descrição do Produto') }}">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="quantidade">{{ __('Quantidade') }}</label>
                                <input type="text" class="form-control" id="quantidade" name="quantidade" @if(isset($produto)) value="{{ $produto->quantidade }}"@endif>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="categoria_id">{{ __('Categoria') }}</label>
                                <select id="categoria_id" name="categoria_id" class="form-control">
                                    @if(isset($produto))
                                    <option value="{{ $produto->categoria->id }}">{{ $produto->categoria->nome }}</option>
                                    @else
                                    <option selected>{{ __('Selecionar...') }}</option>
                                    @endif

                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="preco">{{ __('Preço') }}</label>
                                <input type="text" class="form-control" id="preco" name="preco" @if(isset($produto)) value="{{ $produto->preco }}"@endif>
                            </div>
                        </div>
                        <a href="{{url()->previous()}}" class="btn btn-danger">{{ __('Cancelar') }}</a>
                        <button type="submit" class="btn btn-primary">@if(isset($produto)) {{ __('Atualizar') }} @else  {{ __('Cadastrar') }} @endif</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
