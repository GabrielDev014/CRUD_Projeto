@extends('admin_layout.index')
@section('admin_template')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Cadastro de Vigilantes</h1>
        <div class="card-body">
            <form action="/adm_vigilantes/incluir" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="vigia_celular">Celular</label>
                        <input type="text" class="form-control" id="vigia_celular" name="vigia_celular" placeholder="Celular">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirme a senha</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
                        placeholder="Confirme a senha">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <a href="/adm_vigilantes" class="btn btn-secondary mr-2">Fechar</a>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
