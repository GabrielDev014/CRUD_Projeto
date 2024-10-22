@extends('admin_layout.index')
@section('admin_template')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Alteração de Vigilantes</h1>
        <div class="card-body">
            <form action="/adm_vigilantes/upd" method="POST">
                @csrf
                <div class="form-row">
                    <input type = "hidden" name = "id" value = "{{$vigilante->id}}"/>
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Vigilante"
                        value ="{{$vigilante->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"
                        value ="{{$vigilante->email}}">
                    </div>
                </div>
                    <div class="d-flex justify-content-center">
                        <div class="form-group col-md-6">
                            <label for="vigia_celular">Celular</label>
                            <input type="text" class="form-control" id="vigia_celular" name="vigia_celular" 
                            placeholder="Celular" value="{{$vigilante->vigia_celular}}">
                        </div>
                    </div>
                <div class="d-flex justify-content-center">  <!--Centraliza os botões-->
                    <a href="/adm_vigilantes" class="btn btn-secondary mr-2">Fechar</a> <!-- Adiciona margem à direita -->
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
