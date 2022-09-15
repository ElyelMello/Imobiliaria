<h1>Listar Clientes</h1>
<?php
    $sql = "SELECT * FROM clientes";
    $res = $mysqli->query($sql);
    $quantidade = $res->num_rows;

    if($quantidade > 0){
        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>E-mail</th>";
            echo "<th>Telefone</th>"; 
            echo "<th>CPF</th>";
            echo "<th>Ações</th>";
        echo "</tr>";
        while($row = $res->fetch_object()){
            echo "<tr>";
            echo "<td>".$row->nome."</td>";
            echo "<td>".$row->email."</td>";
            echo "<td>".$row->telefone."</td>"; 
            echo "<td>".$row->cpf."</td>"; 
            echo "<td>
                <button onclick=\"location.href='?page=editar-cliente&id=".$row->id."';\"  class='btn btn-info'>Editar</button>

                <button onclick = \"if(confirm('Tem certeza que deseja excluir?')){location.href=
                    '?page=salvar-cliente&acao=excluir-cliente&id=".$row->id."';}else{false;}\" 
                    class='btn btn-secondary'>Excluir</button>
                </td>";
            echo "</tr>";
        }
        echo "</table>";

    }else{
         echo "<p class='alert alert-danger'>Não encontrou resultados</p>";   
    }
?>