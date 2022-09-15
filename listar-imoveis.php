<h1>Listar Imóveis</h1>
<?php
include('situacao-imovel.php');
    $sql = "SELECT * FROM imoveis";
    $res = $mysqli->query($sql);
    $quantidade = $res->num_rows;

    if($quantidade > 0){
        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>";
            echo "<th>Endereço</th>";
            echo "<th>Dimensões</th>";
            echo "<th>Observações</th>"; 
            echo "<th>Valor</th>"; 
            echo "<th>Situação</th>"; 
            echo "<th>Ações</th>";
        echo "</tr>";
        while($row = $res->fetch_object()){
            echo "<tr>";
            echo "<td>".$row->endereco."</td>";
            echo "<td>".$row->dimensoes."</td>";
            echo "<td>".$row->observacoes."</td>"; 
            echo "<td>"."R$".number_format($row->valor, 2, ',', '.')."</td>";
            if($row->situacaoimovel == $imovel_vendido){
                echo "<td> Vendido</td>";   
            }else{
                echo "<td> Disponível </td>"; 
            }
             
            echo "<td>
                <button onclick=\"location.href='?page=editar-imovel&id=".$row->id."';\"  class='btn btn-info'>Editar</button>

                <button onclick = \"if(confirm('Tem certeza que deseja excluir?')){location.href=
                    '?page=salvar-imovel&acao=excluir&id=".$row->id."';}else{false;}\" 
                    class='btn btn-secondary' >Excluir</button>
                </td>";
            echo "</tr>";
        }
        echo "</table>";

    }else{
         echo "<p class='alert alert-danger'>Não encontrou resultados</p>";   
    }
?>