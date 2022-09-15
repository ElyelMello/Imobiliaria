<?php
    include('situacao-imovel.php');

    $sql_clientes = "SELECT COUNT(id) AS qntd_clientes FROM clientes";
    $res_clientes = $mysqli->query($sql_clientes);
    $qntd_clientes = $res_clientes->fetch_assoc();

    $sql_imoveis = "SELECT COUNT(id) AS qntd_imoveis FROM imoveis";
    $res_imoveis = $mysqli->query($sql_imoveis);
    $qntd_imoveis = $res_imoveis->fetch_assoc();

    $sql_clientes_compras = "SELECT COUNT(id) AS qntd_clientes_compras FROM clientes WHERE numero_compras <> 0";
    $res_clientes_compras = $mysqli->query($sql_clientes_compras);
    $qntd_clientes_compras = $res_clientes_compras->fetch_assoc();

    $sql_faturamento = "SELECT SUM(valor) as faturamento FROM imoveis WHERE situacaoimovel=".$imovel_vendido;
    $res_faturamento = $mysqli->query($sql_faturamento);
    $faturamento = $res_faturamento->fetch_assoc();
    

        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>";
            echo "<th>Número de clientes cadastrados</th>";
            echo "<th>Número de imóveis cadastrados</th>";
            echo "<th>Número de clientes que já compraram</th>"; 
            echo "<th>Faturamento total da empresa</th>"; 
            echo "<tr>";
            echo "<td>".$qntd_clientes['qntd_clientes']."</td>";
            echo "<td>".$qntd_imoveis['qntd_imoveis']."</td>";
            echo "<td>".$qntd_clientes_compras['qntd_clientes_compras']."</td>"; 
            echo "<td> R$".number_format($faturamento['faturamento'], 2, ',', '.')."</td>"; 
        echo "</tr>";
        echo "</table>";
?>