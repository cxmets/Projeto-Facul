<?php
require_once 'connection.php';

$sql = "INSERT INTO products (name, price, image, product_detail, status) VALUES 
        ('Camisa Brasil', 549.99, 'img/Camisa-bra1.jpg', 'Camisa do Brasil Modelo Original', 'active'),
        ('Camisa Argentina', 549.99, 'img/Camisa-Arg1.jpg', 'Camisa do Brasil Modelo Original', 'active'),
        ('Camisa Alemanha', 549.99, 'img/Camisa-Ale1.jpg', 'Camisa do Brasil Modelo Original', 'active'),
        ('Camisa Mexico', 549.99, 'img/Camisa-Mex1.jpg', 'Camisa do Brasil Modelo Original', 'active'),
        ('Chuteira Tiempo', 629.99, 'img/Chuteira-Am1.jpg', 'Camisa do Brasil Modelo Original', 'active'),
        ('Chuteira Predator', 629.99, 'img/Chuteira-Az1.jpg', 'Camisa do Brasil Modelo Original', 'active'),
        ('Chuteira Future 7', 629.99, 'img/Chuteira-Ros1.jpg', 'Camisa do Brasil Modelo Original', 'active')";

$conn->exec($sql);
echo "Produtos inseridos com sucesso!";
?>
