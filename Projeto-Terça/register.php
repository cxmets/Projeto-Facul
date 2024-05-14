<!-- cspell:disable (extenção) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hebert Sports | Register</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <div class="wrapper">
        <form action="process-register.php" method="post">
            <h1>Registrar-se</h1>
            <div class="input-box">
                <input type="text" id="username" name="name" placeholder="Username">
                <i class="bx bxs-user" required title="Digite seu nome de usuário"></i>
            </div>
            <div class="input-box">
                <input type="email" id="email" name="email" placeholder="Email">
                <i class='bx bxs-envelope' required title="Digite seu endereço de e-mail"></i>
            </div>
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Password">
                <i class="bx bxs-lock-alt" required title="Digite sua senha"></i>
            </div>
            <div class="input-box">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
                <i class='bx bx-refresh' required title="Confirme sua senha"></i>
            </div>

            <button type="submit" class="btn">Registrar</button>

            <div class="register-link">
                <p>Já possui uma conta? <a href="#">Login</a></p>
            </div>
        </form>
    </div>

</body>
</html>
