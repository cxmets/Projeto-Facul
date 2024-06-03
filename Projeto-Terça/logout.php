<?php
session_start();

// Limpa o carrinho
unset($_SESSION['cart']);

// Destroi a sessão
session_destroy();

header("Location: index.php");
exit;
?>
