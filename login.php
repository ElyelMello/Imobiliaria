<?php
    include('conexao.php');
    include('permissoes.php');
    
    if(isset($_POST['email']) && isset($_POST['senha'])){
        if((strlen($_POST['email']) == 0) || (strlen($_POST['senha'])==0)){
            echo "E-mail ou senha nao preenchidos.";
        } else{
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);   

            $sql_code = "SELECT * FROM usuarios WHERE email ='$email' LIMIT 1";
            $sql_query = $mysqli->query($sql_code) or die ("Falha execucao cod sql");

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();
                if(password_verify($senha, $usuario['senha'])){
                    if(!isset($_SESSION)){
                        session_start();
                    }

                    $_SESSION['user'] = $usuario['nome'];
                    $_SESSION['nivel'] = $usuario['nivel'];
                    if($_SESSION['nivel'] == $nivelAdministrador){
                        header('location:index.php');
                    }else if($_SESSION['nivel'] == $nivelComercial){
                        header('location:comercial.php');
                    }else if ($_SESSION['nivel'] == $nivelFinanceiro){
                        header('location:financeiro.php');
                    }else if ($_SESSION['nivel'] == $nivelCeo){
                        header('location:ceo.php');
                    }
                }   
            }else{
                echo "Falha ao logar! Email ou senha incorretos!";
            }
        }
    }
?>

<!DOCTYPE html>
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
  <div class="container" >
    <div class="content">      
      <!--FORMULÁRIO DE LOGIN-->
      <div id="login">
        <form method="POST" action=""> 
          <h1>Login</h1> 
          <p> 
            <label for="Email">E-mail</label>
            <input id="email" name="email" required="required" type="email" placeholder="ex. contato@imobiliaria.com"/>
          </p>
           
          <p> 
            <label for="senha">Senha</label>
            <input id="senha" name="senha" required="required" type="password" placeholder="ex. senha" /> 
          </p>      
          <p> 
            <input type="submit" value="Logar" /> 
          </p>
           
        </form>
      </div>
    </div>
  </div>  
</body>
</html>