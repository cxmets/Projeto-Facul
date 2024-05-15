<!-- cspell:disable (extenção) -->
<?php
if (empty($_POST["name"])) {
    die("O campo nome é obrigatório");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Insira um email válido");
}

if (strlen($_POST["password"]) < 6) {
    die("Sua senha deve conter pelo menos 6 caracteres");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Sua senha deve conter pelo menos uma letra");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Sua senha deve conter pelo menos um número");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("As senhas precisam coincidir");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

require __DIR__ . "/connection.php";

$sql = "INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)";

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST["name"], $_POST["email"], $password_hash]);
    echo "Registrado com sucesso!";

    header("Location: register-success.php");
    exit;

} catch(PDOException $e) {
    $errorcode = $e->getCode();
    if ($errorcode == 23000) {
        die("Este email já foi cadastrado");
    } else {
    die("Erro ao registrar: " . $e->getMessage());
    }
}