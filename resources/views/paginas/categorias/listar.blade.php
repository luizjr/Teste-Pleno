@extends('layouts.app')
@section('title', __('Listar Categorias'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--<div class="card text-center">-->
            <div class="card">

                <div class="card-header pt-6">
                    <h5 class="inline">{{ __('Categorias') }}<a class="btn-sm btn btn-primary float-right" href="{{ route('categorias.create') }}">{{ __('Criar Categoria') }}</a></h5>
                </div>

                @if ($categorias->isEmpty())
                <div class="card-body text-center">
                    <h5 class="card-title">Nenhuma Categoria foi encontrada</h5>
                    <p class="card-text">Você pode criar uma nova categoria clicando no botão abaixo.</p>
                    <a href="{{ route('categorias.create') }}" class="btn btn-primary">{{ __('Criar Categoria') }}</a>
                </div>

                @else

                <div class="card-body">

                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Nome</th>
                                <th class="th-sm">Descrição</th>
                                <th class="th-sm">Produtos</th>
                                <th class="th-sm">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>
                                <td>{{ $categoria->nome }}</td>
                                <td>{{ $categoria->descricao }}</td>
                                <td>
                                    {{ $categoria->produtos->count() }}
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Ações
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Ver</a>
                                            <a class="dropdown-item" href="#">Editar</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModalCenter">Excluir</a>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div></td>
                                </tr>
                                @endforeach
                            </table>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>


                        </div>

                        @endif

                    </div>
                </div>
            </div>
        </div>

        @endsection
