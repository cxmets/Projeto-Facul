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

$sql = "SELECT * FROM products WHERE status = 'active'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hebert Sports | Home</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <script defer src="script.js"></script>
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
                        <a class="nav-link active" id="favorites-link" aria-current="page" href="#">Favoritos</a>
                    </li>

                    <div class="cart-icon-container">
                        <a href="cart.php" aria-current="page" class="cart-icon">
                        <i class='bx bx-shopping-bag' id="cart"></i>
                        <span class="cart-count">0</span></a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>


<div class="slider-body">
    <div class="slider">
        <div class="slides">
    <!---radio buttons-->
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">
        <input type="radio" name="radio-btn" id="radio4">
    <!---radio buttons FIM -->
    
    <!-- imagens-->
        <div class="slide first">
        <img src="img/car-1.png" alt="imagem 1" />
        </div>
        <div class="slide">
            <img src="img/car-2.png" alt="imagem 2" />
        </div>
        <div class="slide">
            <img src="img/car-3.png" alt="imagem 3" />
        </div>
        <div class="slide">
            <img src="img/car-4.png" alt="imagem 4" />
        </div>
        
    <!-- imagens FIM-->

    <!-- Navigation auto-->
        <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
        </div>
    <!-- Navigation auto FIM-->

        </div>

    <!-- manual navigation -->

        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
    <!--- manual navihgationn FIM-->
    </div>
</div>



<!-- cards -->
<section class="card-container">
    <p id="no-favorites-message" style="display: none;">Não há nenhum produto nos favoritos.</p>
    <?php if (empty($products)): ?>
        <p>Nenhum produto encontrado.</p>
    <?php else: ?>
        <?php foreach ($products as $product): ?>
            <div class="card" data-product-id="<?= $product['id'] ?>">
                <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                <div class="card-content">
                    <h1><?= htmlspecialchars($product['name']) ?></h1>
                    <h2><?= htmlspecialchars($product['product_detail']) ?></h2>
                    <span>R$ <?= number_format($product['price'], 2, ',', '.') ?></span>
                    <div class="quantity-and-cart">
                        <input type="number" id="quantity-<?= $product['id'] ?>" name="quantity" min="1" placeholder="1" class="quantity-input">
                        <button class="add-to-cart-btn" id="btn-qnt" data-product-id="<?= $product['id'] ?>">Adicionar ao carrinho</button>
                        <a><i class='bx bx-star star-icon' id="star-0" data-product-id="<?= $product['id'] ?>" data-price="<?= $product['price'] ?>"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>


<!-- Footer -->
<footer class="footer" id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2>Sobre nós</h2>
        <p>Conheça a equipe por trás do futuro site da Herbert Sport, uma loja de esportes online em ascensão, fundada por estudantes entusiasmados do terceiro semestre do curso de Análise e Desenvolvimento de Sistemas na Universidade Nove de Julho (UNINOVE). O objetivo central é desenvolver um site que não seja apenas funcional, mas também uma experiência envolvente para os clientes da Herbert Sport, proporcionando uma jornada de compra única, combinando funcionalidade e design de forma inteligente.</p>
      </div>
      <div class="col-md-4">
        <h3>Formas de Pagamento:</h3><br><br>
        <div id="footer-icons">
          <i class="fa-brands fa-cc-visa"></i>
          <i class="fa-brands fa-cc-mastercard"></i>
          <i class="fa-brands fa-cc-paypal"></i>
          <i class="fa-brands fa-pix"></i>
        </div>
      </div>
      <div class="col-md-4" id="participantes">
        <h4>Integrantes</h4>
        <p>Guilherme Alves do nascimento - RA: 3023101021<br>Caio Francisco Silva de Sena - RA: 3022200928<br>Gabriel Cordeiros Ramos - RA: 3023101243<br>Filipe Augusto de Carvalho - RA: 923111862<br>Felipe Nerys Martins - RA: 3023101824<br>Emerson Campos Pacheco - RA: 3023104721<br>Leandro Valdoski - RA: 3023102868<br>Richard Gomes de oliveira - RA: 3023101002<br>Nickolas Palaro Vendrame - RA: 3023102885</p>
      </div>
    </div>
  </div>
  <div class="direitos-autorais">
     <id="footer_copyright">
        &#169
        2024 todos os direitos reservados
      </id>
  </div>
</footer>

</body>
</html>