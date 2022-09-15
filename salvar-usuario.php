<?php

    switch(@$_REQUEST['acao']){
        case 'cadastrar-usuario':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $data_nasc = $_POST['data_nasc'];
            if($_POST['nivel'] == 2){
                $nivel = $nivelComercial;
            }else if($_POST['nivel'] == 3){
                $nivel = $nivelFinanceiro;
            }
             

            $sql = "INSERT INTO usuarios(nome, email, senha, data_nasc, nivel)
            VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasc}', '{$nivel}')";

            $res = $mysqli->query($sql);

            if($res == true){
                echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
                echo "<script>location.href='?page=listar-usuarios';</script>";
            }else{
                echo "<script>alert('Não foi possível cadastrar o usuário.');</script>";
                echo "<script>location.href='?page=listar-usuarios';</script>";
            }
            break;
    
        case 'editar-usuario':
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $data_nasc = $_POST['data_nasc'];


            $sql = "UPDATE usuarios SET nome='{$nome}',
                 email='{$email}',
                 senha='{$senha}',
                 data_nasc='{$data_nasc}' WHERE id=".$_REQUEST['id'];

            $res = $mysqli->query($sql);
            if($res == true){
                echo "<script>alert('Usuário editado com sucesso!');</script>";
                echo "<script>location.href='?page=listar-usuarios';</script>";
            }else{
                echo "<script>alert('Não foi possível editar os dados do usuário.');</script>";
                echo "<script>location.href='?page=listar-usuarios';</script>";
            }

            break;

        case 'excluir-usuario':
            $sql = "DELETE FROM usuarios WHERE id=".$_REQUEST['id']; 
            $res = $mysqli->query($sql);
            if($res == true){
                echo "<script>alert('Excluído com sucesso!');</script>";
                echo "<script>location.href='?page=listar-usuarios';</script>";
            }else{
                echo "<script>alert('Não foi possível excluir os dados do usuário.');</script>";
                echo "<script>location.href='?page=listar-usuarios';</script>";
            }
            break; 
    }