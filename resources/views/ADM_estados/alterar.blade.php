@extends('admin_layout.index')
@section('admin_template')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Alteração de Estados</h1>
        <div class="card-body">
            <form action="/adm_estados/upd" method="POST">
                @csrf
                <div class="form-row">
                    <input type = "hidden" name = "id" value = "{{$estado->id}}"/>
                    <div class="form-group col-md-6">
                        <label for="estado_nome">Nome</label>
                        <input type="text" class="form-control" id="estado_nome" name="estado_nome" placeholder="Nome do Estado"
                        value ="{{$estado->estado_nome}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sigla">Sigla</label>
                        <input type="text" class="form-control" id="sigla" name="sigla" placeholder="Ex.: SP"
                        value ="{{$estado->sigla}}">
                    </div>  
                </div>
                <div class="d-flex justify-content-center">  <!--Centraliza os botões-->
                    <a href="/adm_estados" class="btn btn-secondary mr-2">Fechar</a> <!-- Adiciona margem à direita -->
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
