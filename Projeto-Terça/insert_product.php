<?php
require_once 'connection.php';

$sql = "INSERT INTO products (name, price, image, product_detail, status) VALUES 
        ('Camisa Brasil', 399.99, 'img/Camisa-bra1.png', 'Camisa do Brasil Modelo Original', 'active'),
        ('Camisa Argentina', 349.99, 'img/Camisa-Arg1.png', 'Camisa da Argentina Modelo Original', 'active'),
        ('Camisa Alemanha', 349.99, 'img/Camisa-Ale1.jpg', 'Camisa do Alemanha Modelo Original', 'active'),
        ('Camisa Mexico', 349.99, 'img/Camisa-Mex1.jpg', 'Camisa do Mexico Modelo Original', 'active'),
        ('Chuteira Tiempo', 399.99, 'img/Chuteira-Am1.png', 'Chuteira Tiempo Modelo Original', 'active'),
        ('Chuteira Predator', 249.99, 'img/Chuteira-Az1.png', 'Chuteira Predator Modelo Original', 'active'),
        ('Chuteira Future 7', 299.99, 'img/Chuteira-Ros1.png', 'Chuteira Future 7 Modelo Original', 'active'),
        ('Chuteira Mercurial Victory', 149.99, 'img/Chuteira-merc1.jpg', 'Chuteira Mercurial Modelo Original', 'active')";

$conn->exec($sql);
echo "Produtos inseridos com sucesso!";
?>
