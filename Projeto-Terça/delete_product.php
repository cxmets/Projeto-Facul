<?php
require_once 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: admin_products.php");
        exit;
    } else {
        echo "Erro ao excluir o produto.";
    }
} else {
    header("Location: admin_products.php");
    exit;
}
?>
