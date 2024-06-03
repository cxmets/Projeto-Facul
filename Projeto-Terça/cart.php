<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];

    require_once __DIR__ . "/connection.php";

    $sql = "SELECT * FROM users WHERE id = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":userId", $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

require_once 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hebert Sports | Carrinho</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>

    <!-- Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
        <a class="logo" href="index.php"><img src="img/Logo-HS.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Offcanvas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                <div class="offcanvas-body">
                <form class="search" role="search">
                    <input class="form-control me-2" type="search" placeholder="Busque pelo seu produto!" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class='bx bx-search-alt-2' id="lupa"></i></button>
                </form>

                    <li class="user-icon-container">
                        <i class='bx bx-user-circle' id="user-icon" ></i>
                        <?php if (isset($_SESSION["user_id"])): ?>
                            <p>Bem vindo&nbsp;<strong><?= htmlspecialchars($user["name"]) ?></strong></p>
                            <p><a href="logout.php">Log out</a></p>
                        <?php else: ?>
                            <p><a href="login.php">Login</a>&nbsp;ou&nbsp;<a href="register.php">Registre-se</a></p>
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#footer">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Favoritos</a>
                    </li>

                    <div class="cart-icon-container">
                        <a href="cart.php" aria-current="page" class="cart-icon">
                        <i class='bx bx-shopping-bag' id="cart"></i>
                        <span class="cart-count"></span></a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>


<div class="container">
    <h1 class="cart-title">Carrinho de Compras</h1>

    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['quantity']) ?></td>
                        <td>R$ <?= number_format($item['price'], 2, ',', '.') ?></td>
                        <td>R$ <?= number_format($item['price'] * $item['quantity'], 2, ',', '.') ?></td>
                        <td>
                            <form method="post" action="remove_from_cart.php">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <button type="submit" class="remove-btn">Remover</button>
                            </form>
                        </td>
                    </tr>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="cart-total">Total: R$ <?= number_format($total, 2, ',', '.') ?></p>
    <?php else: ?>
        <p>Seu carrinho está vazio!</p>
    <?php endif; ?>

    <a href="index.php" class="continue-shopping">Continuar comprando</a>
</div>

</body>
</html>
