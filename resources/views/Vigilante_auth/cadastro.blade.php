<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/css/cadastro.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class = "container-cadastro">
        <form action = "{{route('cadastroVigilante')}}" method = "POST">
            @csrf
            <h1>Cadastro</h1>
            <div class = "input-box">
                <input type="text" placeholder="Nome" name = "name" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class = "input-box">
                <input type="text" placeholder="Celular" name = "vigia_celular" required>
                <i class='bx bxs-phone'></i>
            </div>

            <div class = "input-box">
                <input type="email" placeholder="Email" name = "email" required>
                <i class='bx bxl-gmail'></i>
            </div>

            <div class = "input-box">
                <input type="password" placeholder="Senha" id = "password" name = "password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Confirme sua senha" id="password_confirmation" name="password_confirmation" required>
                <i class='bx bxs-lock-alt'></i>
            </div>            

            <button type = "submit" class="btn">Cadastrar</button>

            <div class="link-login">
                <p>Já possui cadastro? <a href="/login">Clique aqui</a></p>
            </div>
        </form>
    </div>
</body>
</html>
