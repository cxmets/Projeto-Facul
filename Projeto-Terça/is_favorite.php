<?php
session_start();
require_once 'connection.php';

if (isset($_SESSION['user_id']) && isset($_GET['product_id'])) {
    $userId = $_SESSION['user_id'];
    $productId = $_GET['product_id'];

    $sql = "SELECT * FROM favoritos WHERE user_id = :user_id AND product_id = :product_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':product_id', $productId);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "yes";
    } else {
        echo "no";
    }
} else {
    echo "error";
}
?>
