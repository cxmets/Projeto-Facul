<?php
require_once __DIR__ . "/connection.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST["email"]; 
    $password = $_POST["password"];


    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {

        if (password_verify($password, $user['password_hash'])) {
            session_start();
            session_regenerate_id();
            $_SESSION['user_id'] = $user['id'];

            header("Location: index.php");
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hebert Sports | Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <div class="wrapper">
        <form method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Username" required>
                <i class="bx bxs-user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class="bx bxs-lock-alt"></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox"> Manter conectado</label>
                <a href="#">Esqueceu sua senha?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Não possui uma conta? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>

</body>
</html>
