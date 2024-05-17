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
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="script.js"></script>
</head>
<body>

<!-- Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Offcanvas navbar large">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Hebert Sports</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Offcanvas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form class="d-flex mt-3 mt-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Favoritos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Contato
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Instagram</a></li>
                            <li><a class="dropdown-item" href="#">Facebook</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Suporte</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<?php if (isset($_SESSION["user_id"])): ?>

    <p>Bem vindo <?= htmlspecialchars($user["name"]) ?></p>
    <p><a href="logout.php">Log out</a></p>

<?php else: ?>

    <p><a href="login.php">Login</a> ou <a href="register.php">Registre-se</a></p>

<?php endif; ?>


<!-- cards -->
<section class="card-container">

<div class="card">
    <img src="parte de tras carta.jpg">
    <div>
        <form>
            <input type="radio" id="opcao1" name="opcao" value="opcao1">
            <label for="opcao1"></label>
          
            <input type="radio" id="opcao2" name="opcao" value="opcao2">
            <label for="opcao2"></label>
          
            <input type="radio" id="opcao3" name="opcao" value="opcao3">
            <label for="opcao3"></label>
          </form>
          
        <h1>camisa brasil</h1>
        <h2>Descrição</h2>
        <span>R$ 5,50</span>
        <button> saiba mais</button>

    </div>
</div>

<div class="card">
    <img src="Projeto-Terça/img/camisetaARG.jpg">
    <div>
        <h1>camisa brasil</h1>
        <h2>Descrição</h2>
        <span>R$ 5,50</span>
        <button> saiba mais</button>

    </div>
</div>

<div class="card">
    <img src="Projeto-Terça/img/CamisetaBR.jpg">
    <div>
        <h1>camisa brasil</h1>
        <h2>Descrição</h2>
        <span>R$ 5,50</span>
        <button> saiba mais</button>

    </div>
</div>

<div class="card">
    <img src="Projeto-Terça/img/camisetaV.jpg">
    <div>
        <h1>camisa brasil</h1>
        <h2>Descrição</h2>
        <span>R$ 5,50</span>
        <button> saiba mais</button>

    </div>
</div>

<div class="card">
    <img src="Projeto-Terça/img/camisetaVERM.jpg">
    <div>
        <h1>camisa brasil</h1>
        <h2>Descrição</h2>
        <span>R$ 5,50</span>
        <button> saiba mais</button>

    </div>
</div>

<div class="card">
    <img src="Projeto-Terça/img/chuteira1.jpg">
    <div>
        <h1>camisa brasil</h1>
        <h2>Descrição</h2>
        <span>R$ 5,50</span>
        <button> saiba mais</button>

    </div>
</div>

<div class="card">
    <img src="chuteira2.jpg">
    <div>
        <h1>camisa brasil</h1>
        <h2>Descrição</h2>
        <span>R$ 5,50</span>
        <button> saiba mais</button>

    </div>
</div>

<div class="card">
    <img src="chuteira3.jpg">
    <div>
        <h1>camisa brasil</h1>
        <h2>Descrição</h2>
        <span>R$ 5,50</span>
        <button> saiba mais</button>

    </div>
</div>

</section>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2>Sobre nós</h2>
        <p>Conheça a equipe por trás do futuro site da Herbert Sport, uma loja de esportes online em ascensão, fundada por estudantes entusiasmados do terceiro semestre do curso de Análise e Desenvolvimento de Sistemas na Universidade Nove de Julho (UNINOVE). O objetivo central é desenvolver um site que não seja apenas funcional, mas também uma experiência envolvente para os clientes da Herbert Sport, proporcionando uma jornada de compra única, combinando funcionalidade e design de forma inteligente.</p>
      </div>
      <div class="col-md-4">
        <h3>Formas de Pagamento:</h3><br><br>
        <div id="footer-icons">
    <id="visa">
       <i class="fa-brands fa-cc-visa"></i>
    </id>

   <id="footer-icon-mastercard">
     <id="mastercard">
         <i class="fa-brands fa-cc-mastercard"></i>
        </id>

   <id="footer-icon-pix">
     <id="pix">
        <i class="fa-brands fa-pix"></i>
          </id>

   <id="footer-icon-paypal">
     <id="paypal">
        <i class="fa-brands fa-cc-paypal"></i>
        </id> 
     </div>
      </div>
      <div class="col-md-4" id="participantes">
        <h4>Integrantes</h4>
        <p2>Caio Francisco Silva de Sena - RA: 3022200928<br>Gabriel Cordeiros Ramos - RA: 3023101243<br>Filipe Augusto de Carvalho - RA: 923111862<br>Felipe Nerys Martins - RA: 3023101824<br>Emerson Campos Pacheco - RA: 3023104721<br>Matheus Duarte Luiz -RA:3023105788<br>Leandro Valdoski - RA: 3023105606<br>Guilherme Alves do nascimento - RA: 3023101021<br>Nickolas Palaro Vendrame - RA: 3023102885<br>Richard Gomes de Oliveira - RA: 3023101002</p2>
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
