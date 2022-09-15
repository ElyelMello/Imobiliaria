<?php
    include('protect.php');
    include('conexao.php');
    include('permissoes.php');
    include('situacao-vendas.php');
    if (!isset($_SESSION)){
        session_start();
    }
    if($_SESSION['nivel'] != $nivelFinanceiro){
      echo"<script>alert('voce nao tem acesso')</script>";
      echo"<script>location.href='logout.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "Bem vindo, {$_SESSION['user']}"?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo "Bem vindo, {$_SESSION['user']}."?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=vendas-pendentes">Vendas Pendentes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=vendas-aprovadas">Vendas Aprovadas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="?page=vendas-rejeitadas">Vendas Rejeitadas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">sair</a>
        </li>
  
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
      <div class="row">
        <div class="col mt-5">
        <?php
        switch(@$_REQUEST['page']){
          case 'vendas-aprovadas':
            include('vendas-aprovadas.php');
            break;
            
          case 'vendas-pendentes':
            include('vendas-pendentes.php');
            break;
           
          case 'vendas-rejeitadas':
            include('vendas-rejeitadas.php');
            break; 
            
          case 'aprovar-venda':
            include('aprovar-venda.php');
            break;
          case 'rejeitar-venda':
            include('rejeitar-venda.php');
            break;
          
      }
    ?>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>