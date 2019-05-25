@extends('layouts.app')
@section('title', __('Editar Categorias'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--<div class="card text-center">-->
            <div class="card">
                <div class="card-header pt-6">
                    <h5 class="inline">{{ __('Cadastrar Produto') }}</h5>
                </div>

                <div class="card-body">

                    <form method="post" action="{{ route('categorias.store') }}">
                        {{ csrf_field() }}

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Categoria">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do Produto">
                            </div>
                        </div>

                        <button type="reset" class="btn btn-danger">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
