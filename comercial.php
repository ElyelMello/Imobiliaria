<?php
    include('protect.php');
    include('conexao.php');
    include('permissoes.php');
    if (!isset($_SESSION)){
        session_start();
    }
    if($_SESSION['nivel'] != $nivelComercial ){
      echo"<script>alert('voce nao tem acesso a esta pagina')</script>";
      echo "<script>location.href='logout.php';</script>";
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
    <a class="navbar-brand" href="#"><?php echo "Bem vindo, vendedor!"?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="comercial.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=novo-cliente">Novo Cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=nova-venda">Nova Venda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=listar-clientes">Listar Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=listar-vendas">Listar Vendas</a>
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
            case 'novo-cliente':
              include('novo-cliente.php');
              break;
              
            case 'nova-venda':
              include('nova-venda.php');
              break;
            
            case 'listar-clientes':
              include('listar-clientes.php');
              break; 
            
            case 'listar-vendas':
              include('listar-vendas.php');
              break;
              
            case 'editar-cliente':
              include('editar-cliente.php');
              break;
            
            case 'salvar-cliente':
              include('salvar-cliente.php');
              break;

            case 'salvar-venda':
              include('salvar-venda.php');
              break;
            
        }
      ?>
          </div>
        </div>
      </div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>