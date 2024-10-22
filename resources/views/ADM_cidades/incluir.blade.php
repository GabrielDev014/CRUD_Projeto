@extends('admin_layout.index')
@section('admin_template')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Cadastro de Cidades</h1>
        <div class="card-body">
            <form action="/adm_cidades/incluir" method="POST">
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="form-group col-md-6">
                        <label for="cidade_nome">Nome</label>
                        <input type="text" class="form-control" id="cidade_nome" name="cidade_nome" placeholder="Nome da Cidade">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="form-group col-md-6">
                        <label for="estado_id">Estado</label>
                        <select class="form-control" id="estado_id" name="estado_id">
                            @foreach($estados as $item)
                                <option value="{{ $item->id }}">{{ $item->estado_nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>                
                <div class="d-flex justify-content-center">  <!--Centraliza os botões-->
                    <a href="/adm_cidades" class="btn btn-secondary mr-2">Fechar</a> <!-- Adiciona margem à direita -->
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
