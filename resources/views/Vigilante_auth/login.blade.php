<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/loginVigia.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class = "container-login">
        <form action = "{{route('loginVigilante')}}" method = "POST">
            @csrf
            <h1>Login</h1>
            <div class = "input-box">
                <input type="email" placeholder="Usuário" name = "email" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class = "input-box">
                <input type="password" placeholder="Senha" name = "password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="esqueceu-senha">
                <a href="#"> Esqueci minha senha</a>
            </div>
            <button type = "submit" class="btn">Login</button>
            <div class="link-cadastro">
                <p>Ainda não possui cadastro? <a href="cadastro">Cadastre-se!</a></p>
            </div>
        </form>
    </div>
</body>
</html>