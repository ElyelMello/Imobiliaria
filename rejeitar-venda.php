<?php
    include('situacao-imovel.php');
    include('situacao-vendas.php');
        $sql = "UPDATE vendas SET situacaovenda='{$rejeitada}' WHERE id=".$_REQUEST['id'];
        $res = $mysqli->query($sql);


        $sql_imovel_venda = "SELECT * FROM vendas WHERE id=".$_REQUEST['id'];
        $sql_imovel_exec = $mysqli->query($sql_imovel_venda);
        $imovel_venda = $sql_imovel_exec->fetch_assoc();

        $sql_situacao_imovel = "UPDATE imoveis SET situacaoimovel='{$imovel_disponivel}' WHERE id=".$imovel_venda['idimovel'];
        $query_situacao_imovel = $mysqli->query($sql_situacao_imovel);

        if($res == true && $query_situacao_imovel == true){
            echo "<script>alert('Venda rejeitada!');</script>";
            echo "<script>location.href='?page=vendas-pendentes';</script>";
        }else{
            echo "<script>alert('Nao foi possivel rejeitar a venda.');</script>";
        }