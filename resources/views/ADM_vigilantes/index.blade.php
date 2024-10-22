@extends('admin_layout.index')
@section('admin_template')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vigilantes</h1>
        <p class="mb-4">Todos os vigilantes cadastrados</p>

        <a href="{{ route('adm_vigilantes.incluir') }}" class="btn btn-primary mb-3">
            Novo
        </a>        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Vigilantes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Celular</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vigilantes as $linha)
                                <tr>
                                    <td>{{ $linha->id }}</td>
                                    <td>{{ $linha->name }}</td>
                                    <td>{{ $linha->email }}</td>
                                    <td>{{ $linha->vigia_celular }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('adm_vigilantes_upd', ['id' => $linha->id]) }}" class="btn btn-success mr-2">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        |
                                        <a href="{{ route('adm_vigilantes_ex', ['id' => $linha->id]) }}" class="btn btn-danger ml-2">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
