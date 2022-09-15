<h1>Listar Usuários</h1>

<?php
    
    $sql = "SELECT * FROM usuarios";
    $res = $mysqli->query($sql);
    $quantidade = $res->num_rows;

    if($quantidade > 0){
        echo "<table class='table table-hover table-striped table-bordered'>";
        echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>E-mail</th>";
            echo "<th>Data de nascimento</th>"; 
            echo "<th>Ações</th>";
        echo "</tr>";
        while($row = $res->fetch_object()){
            $data = implode("/",array_reverse(explode("-",$row->data_nasc)));
            echo "<tr>";
            echo "<td>".$row->nome."</td>";
            echo "<td>".$row->email."</td>";
            echo "<td>".$data."</td>"; 
            echo "<td>
                <button onclick=\"location.href='?page=editar-usuario&id=".$row->id."';\"  class='btn btn-info'>Editar</button>

                <button onclick = \"if(confirm('Tem certeza que deseja excluir?')){location.href=
                    '?page=salvar-usuario&acao=excluir-usuario&id=".$row->id."';}else{false;}\" 
                    class='btn btn-secondary' >Excluir</button>
                </td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
         echo "<p class='alert alert-danger'>Não encontrou resultados</p>";   
    }
?>
