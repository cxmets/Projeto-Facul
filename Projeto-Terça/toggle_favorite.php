<?php
session_start();
require_once 'connection.php';

if (isset($_SESSION['user_id']) && isset($_POST['product_id'])) {
    $userId = $_SESSION['user_id'];
    $productId = $_POST['product_id'];
    $price = $_POST['price'];

    $sql = "SELECT * FROM favoritos WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $sql = "DELETE FROM favoritos WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->execute();
        echo "removed";
    } else {
        $sql = "INSERT INTO favoritos (id, user_id, product_id, price) VALUES (UUID(), :user_id, :product_id, :price)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':price', $price);
        $stmt->execute();
        echo "added";
    }
} else {
    echo "error";
}
?>
