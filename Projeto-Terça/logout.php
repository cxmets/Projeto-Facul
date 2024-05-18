<?php
session_start();

// Limpa o carrinho
unset($_SESSION['cart']);

session_destroy();

header("Location: index.php");
exit;
?>
