<?php
session_start();
require_once 'connection.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    $sql = "SELECT product_id FROM favoritos WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();

    $favorites = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode($favorites);
} else {
    echo json_encode([]);
}
?>
