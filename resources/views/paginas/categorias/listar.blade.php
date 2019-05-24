@extends('layouts.app')
@section('title', __('Listar Categorias'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--<div class="card text-center">-->
            <div class="card">
                <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs pull-xs-left">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
      </li>
    </ul>
    <button class="btn btn-primary pull-right" style="float:right;" type="button">Do something cool</button>
  </div>

                <div class="card-header clearfix">
      <i class="fa fa-circle pull-left"></i>
      <div class="w-75 p-3 pull-left">{{ __('Categorias') }}</div>
      <div class="text-xs-right pull-right">04.07.2016</div>
    </div>

                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="w-75 p-3">{{ __('Categorias') }}</div>
                        </div>
                        <div class="col-md-2 float-right">
                            <button class="btn btn-primary"
                            (click)="onAddCategoieModal(addCategorieModal)">Add</button>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <nav class="nav text-right">
                        <a class="btn btn-primary" href="#">{{ __('Criar Categoria') }}</a>
                    </nav>

                    <nav class="nav float-left ">
                        <span class="nav-link">{{ __('Categorias') }}</span>
                    </nav>

                </div>

                <div class="card-body text-center">
                    <h5 class="card-title">Nenhuma Categoria foi encontrada</h5>
                    <p class="card-text">Você pode criar uma nova categoria clicando no botão abaixo.</p>
                    <a href="{{ route('categorias.create') }}" class="btn btn-primary">{{ __('Criar Categoria') }}</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

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
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td><!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        Launch demo modal
                                    </button>

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
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
        </script>
        @endsection
