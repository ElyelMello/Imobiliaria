<?php
    $sql = "SELECT * FROM vendas WHERE situacaovenda='2'";
    $res = $mysqli->query($sql);
    $quantidade = $res->num_rows;

    if($quantidade > 0){
        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>";
            echo "<th>Endereço</th>";
            echo "<th>Cliente</th>";
            echo "<th>Vendedor</th>"; 
            echo "<th>Situação da venda</th>";
            echo "<th>Ações</th>";
        echo "</tr>";
        while($row = $res->fetch_object()){
            //Queries
            $sql_endereco = "SELECT * FROM imoveis WHERE id=".$row->idimovel;
            $sql_nome_cliente = "SELECT * FROM clientes WHERE id=".$row->idcliente;
            $sql_nome_vendedor = "SELECT * FROM usuarios WHERE id=".$row->idvendedor;
            //Buscando os resultados
            $res_endereco = $mysqli->query($sql_endereco);
            $res_nome_cliente = $mysqli->query($sql_nome_cliente);
            $res_nome_vendedor = $mysqli->query($sql_nome_vendedor);
            //fetching the objects
            $res_e = $res_endereco->fetch_object();
            $res_n_c = $res_nome_cliente->fetch_object();
            $res_n_v = $res_nome_vendedor->fetch_object();
            
            echo "<tr>";
            echo "<td>".$res_e->endereco."</td>";
            echo "<td>".$res_n_c->nome."</td>";
            echo "<td>".$res_n_v->nome."</td>"; 

    
            if($row->situacaovenda == $pendente){
                echo "<td> Pendente </td>";
            }
            echo "<td>
                <button onclick=\"if(confirm('Tem certeza que deseja aprovar venda?')){location.href='?page=aprovar-venda&id=".$row->id."';
                }else{false;}\"class='btn btn-outline-info'>Aprovar Venda</button>

                
                <button onclick=\"if(confirm('Tem certeza que deseja rejeitar venda?')){location.href='?page=rejeitar-venda&id=".$row->id."';
                }else{false;}\"class='btn btn-outline-danger'>Rejeitar Venda</button>
                </td>";  
                
              echo "</tr>";
        }
        echo "</table>";
    }else{
         echo "<p class='alert alert-danger'>Não encontrou resultados</p>";   
    }
?>