<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Administrador</title>
    <link rel="stylesheet" href="/css/loginAdmin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class = "container-login">
        <form action = "{{route('admin_cadastro')}}" method = "POST">
            @csrf
            <h1>Cadastro - Admin</h1>

            <div class = "input-box">
                <input type="text" placeholder="Nome" name = "name" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class = "input-box">
                <input type="email" placeholder="Usuário" name = "email" required>
                <i class='bx bxl-gmail'></i>
            </div>

            <div class = "input-box">
                <input type="password" placeholder="Senha" name = "password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="input-box">
                <input type="password" placeholder="Confirme sua senha" id="password_confirmation" name="password_confirmation" required>
                <i class='bx bxs-lock-alt'></i>
            </div>  

            <button type = "submit" class="btn">Cadastrar</button>
        </form>
    </div>
</body>
</html>