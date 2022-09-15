<?php
include('conexao.php');
    switch(@$_REQUEST['acao']){
        case 'cadastrar-cliente':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cpf = $_POST['cpf'];
            $numero_compras = 0;

            $sql = "INSERT INTO clientes(nome, email, telefone, cpf, numero_compras)
            VALUES ('{$nome}', '{$email}', '{$telefone}', '{$cpf}', '{$numero_compras}')";
            $res = $mysqli->query($sql);

            if($res == true){
                echo "<script>alert('Cliente cadastrado com sucesso!');</script>";
                echo "<script>location.href='?page=listar-clientes';</script>";
            }else{
                echo "<script>alert('Não foi possível cadastrar o cliente.');</script>";
            }
            break;


        case 'editar-cliente':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cpf = $_POST['cpf'];


            $sql = "UPDATE clientes SET nome='{$nome}',
                    email='{$email}',
                    telefone='{$telefone}',
                    cpf='{$cpf}' WHERE id=".$_REQUEST['id'];

            $res = $mysqli->query($sql);
            if($res == true){
                echo "<script>alert('Cliente editado com sucesso!');</script>";
                echo "<script>location.href='comercial.php?page=listar-clientes';</script>";
            }else{
                echo "<script>alert('Não foi possível editar os dados do cliente.');</script>";
                echo "<script>location.href='comercial.php?page=listar-clientes';</script>";
            }
            break;    

        case 'excluir-cliente':
            $sql = "DELETE FROM clientes WHERE id=".$_REQUEST['id']; 
            $res = $mysqli->query($sql);
            if($res == true){
                echo "<script>alert('Cliente excluído com sucesso!');</script>";
                echo "<script>location.href='comercial.php?page=listar-clientes';</script>";
            }else{
                echo "<script>alert('Não foi possível excluir os dados do usuário.');</script>";
                echo "<script>location.href='comercial.php?page=listar-clientes';</script>";
            }
            break;  
        }