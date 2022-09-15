<?php
include('conexao.php');
include('situacao-imovel.php');
include('situacao-vendas.php');
    switch(@$_REQUEST['acao']){
        case 'cadastrar-venda':
            $idimovel = (int)$_POST['endereco'];
            $idcliente = (int)$_POST['cliente'];
            $idvendedor = (int)$_POST['vendedor'];
            //cria a venda
            $sql_venda = "INSERT INTO vendas(idimovel, idcliente, idvendedor, situacaovenda)
            VALUES ('{$idimovel}', '{$idcliente}', '{$idvendedor}','{$pendente}')";
            $res = $mysqli->query($sql_venda);
            //muda a situacao do imovel
            $sql_imovel = "UPDATE imoveis SET situacaoimovel = '{$imovel_vendido}' WHERE id=".$idimovel;
            $res_imovel = $mysqli->query($sql_imovel);

            //atualizando número de compras do cliente
            $sql_cliente_compras = "SELECT numero_compras FROM clientes WHERE id=".$idcliente;
            $res_compras = $mysqli->query($sql_cliente_compras);
            $numero_compras = $res_compras->fetch_assoc();
            $numero_compras['numero_compras'] = $numero_compras['numero_compras'] + 1;
            $sql_cliente = "UPDATE clientes SET numero_compras ='{$numero_compras['numero_compras']}' WHERE id=".$idcliente;
            $query_cliente = $mysqli->query($sql_cliente);

            if($res == true && $res_imovel == true && $query_cliente == true){
                echo "<script>alert('Venda cadastrada com sucesso!');</script>";
                echo "<script>location.href='comercial.php?page=listar-vendas';</script>";
            }else{
        
                echo "<script>alert('Nao foi possivel cadastrar a venda.');</script>";
                echo "<script>location.href='comercial.php?page=listar-vendas';</script>";  
            }
            break;
        }
