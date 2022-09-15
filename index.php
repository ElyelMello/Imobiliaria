<?php
    include('protect.php');
    include('conexao.php');
    include('permissoes.php');
    if (!isset($_SESSION)){
        session_start();
    }
    if($_SESSION['nivel'] != $nivelAdministrador){
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
    <link href="css/style.css" rel="stylesheet">
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?page=novo-usuario">Novo Usuário</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=novo-imovel">Novo Imóvel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=listar-usuarios">Listar Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=listar-imoveis">Listar Imóveis</a>
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
          case 'novo-usuario':
            include('novo-usuario.php');
            break;
            
          case 'novo-imovel':
            include('novo-imovel.php');
            break;
           
          case 'listar-usuarios':
            include('listar-usuarios.php');
            break; 
          
          case 'listar-imoveis':
            include('listar-imoveis.php');
            break;
            
          case 'editar-usuario':
            include('editar-usuario.php');
            break;
          
          case 'editar-imovel':
            include('editar-imovel.php');
            break;
          
          case 'salvar-usuario':
            include('salvar-usuario.php');
            break;

          case 'salvar-imovel':
            include('salvar-imovel.php');
            break;
          
      }
    ?>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>