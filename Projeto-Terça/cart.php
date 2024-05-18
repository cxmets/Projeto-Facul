<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>

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
