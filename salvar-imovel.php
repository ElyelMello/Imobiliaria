<?php
include('conexao.php');
include('situacao-imovel.php');
    switch(@$_REQUEST['acao']){
        case 'cadastrar-imovel':
            $endereco = $_POST['endereco'];
            $dimensoes = $_POST['dimensoes'];
            $observacoes = $_POST['observacoes'];
            $valor = $_POST['valor'];
            $situacao_imovel = $imovel_disponivel;

            $sql = "INSERT INTO imoveis(endereco, dimensoes, observacoes, valor, situacaoimovel)
            VALUES ('{$endereco}', '{$dimensoes}', '{$observacoes}', '{$valor}', '{$situacao_imovel}')";

            $res = $mysqli->query($sql);

            if($res == true){
                echo "<script>alert('Im\u00f3vel cadastrado com sucesso!');</script>";
                echo "<script>location.href='index.php?page=listar-imoveis';</script>";
            }else{
                echo "<script>alert('Não foi possível cadastrar o imóvel.');</script>";
                echo "<script>location.href='index.php?page=listar-imoveis';</script>";
            }
            break;

        case 'editar-imovel':
            $endereco = $_POST['endereco'];
            $dimensoes = $_POST['dimensoes'];
            $observacoes = $_POST['observacoes'];
            $valor = $_POST['valor'];


            $sql = "UPDATE imoveis SET endereco='{$endereco}',
                    dimensoes='{$dimensoes}',
                    observacoes='{$observacoes}',
                    valor='{$valor}'
                    WHERE id=".$_REQUEST['id'];

            $res = $mysqli->query($sql);
            if($res == true){
                echo "<script>alert('Im\u00f3vel editado com sucesso!');</script>";
                echo "<script>location.href='index.php?page=listar-imoveis';</script>";
            }else{
                echo "<script>alert('Não foi possível editar os dados do im\u00f3vel.');</script>";
                echo "<script>location.href='index.php?page=listar-imoveis ';</script>";
            }
            break;

            case 'excluir':
                $sql = "DELETE FROM imoveis WHERE id=".$_REQUEST['id']; 
                $res = $mysqli->query($sql);
                if($res == true){
                    echo "<script>alert('Excluído com sucesso!');</script>";
                    echo "<script>location.href='?page=listar-imoveis';</script>";
                }else{
                    echo "<script>alert('Não foi possível excluir os dados do usuário.');</script>";
                    echo "<script>location.href='?page=listar-imoveis';</script>";
                }
                break;    
        }