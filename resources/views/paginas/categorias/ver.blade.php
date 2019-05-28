@extends('layouts.app')
@section('title', __('Ver Categoria'))

@section('content')
<!-- Include this after the sweet alert js file -->
@include('sweet::alert')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--<div class="card text-center">-->
            <div class="card">

                <div class="card-header pt-6">
                    <h5 class="inline">{{ __('Categorias') }}
                        <a class="btn-sm btn btn-primary float-right" href="{{ route('categorias.index') }}">{{ __('Voltar') }}</a>
                    </h5>
                </div>

                <div class="card-body">

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">{{ __('Nome') }}</th>
                                <th class="th-sm">{{ __('Descrição') }}</th>
                                <th class="th-sm">{{ __('Produtos') }}</th>
                                <th class="th-sm">{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $categoria->nome }}</td>
                                <td>{{ $categoria->descricao }}</td>
                                <td>{{ $categoria->produtos->count() }}</td>

                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('Ações') }}
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('categorias.edit',$categoria->id) }}">{{ __('Editar') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ route('categorias.destroy',$categoria->id) }}" data-toggle="modal" data-target="#deletaCategoria{{ $categoria->id }}">{{ __('Excluir') }}</a>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deletaCategoria{{ $categoria->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="{{ $categoria->nome }}">Excluíndo Categoria {{ $categoria->nome }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ __('Tem certeza que deseja Excluir o :item, está ação será irreversível.',['item'=>$categoria->nome]) }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
                                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post">
                                                        <input type="hidden" name="_method" value="delete" />
                                                        {!! csrf_field() !!}
                                                        <button type="submit" class="btn btn-danger">{{ __('Excluir') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection
