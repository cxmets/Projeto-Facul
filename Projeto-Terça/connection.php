<?php
$db_host = 'localhost';
$db_name = 'proj_db';
$db_user = 'root';
$db_password = '';

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Ativar o modo de exceção
} catch(PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// function unique_id(){
//     $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
//     $charLength = strlen($chars);
//     $randomString = '';

//     for ($i = 0; $i < 20; $i++) {
//         $randomString .= $chars[mt_rand(0, $charLength - 1)];
//     }
//     return $randomString;
// }