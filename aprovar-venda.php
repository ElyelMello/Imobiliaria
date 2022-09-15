<?php
        $sql = "UPDATE vendas SET situacaovenda='1' WHERE id=".$_REQUEST['id'];
        $res = $mysqli->query($sql);
        if($res == true){
            echo "<script>alert('Venda aprovada com sucesso!');</script>";
            echo "<script>location.href='?page=vendas-pendentes';</script>";
        }else{
            echo "<script>alert('Nao foi possivel aprovar a venda.');</script>";
            echo "<script>location.href='?page=vendas-pendentes';</script>";
        }