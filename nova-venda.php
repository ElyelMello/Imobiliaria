<h1>Nova Venda</h1>
<form action="salvar-venda.php" method="POST">
    <input type="hidden" name="acao" value='cadastrar-venda'> 
        <div class="mb-3">
            <label for="endereco">Endereço do imóvel</label>
            <?php
            include('situacao-imovel.php');
            echo "<select class=\"form-control form-control-lg form-venda\" name=\"endereco\"> ";
                
                $sql_endereco = "SELECT * FROM imoveis WHERE situacaoimovel=".$imovel_disponivel;
                $res_endereco = mysqli_query($mysqli, $sql_endereco);
                
                $qntd_imoveis_disponiveis = $res_endereco->num_rows;
                if($qntd_imoveis_disponiveis == 0){
                    echo "<option>Nao há imóveis disponíveis</option>";
                }else{
                    while( $endereco= $res_endereco->fetch_assoc()){
                   echo "<option value=";
                   echo "{$endereco['id']}";
                   echo "\"\> {$endereco['endereco']}</option>"; 
                }
                }
                
        
            echo "</select>";
       
            echo "<label for=\"cliente\">Nome do Cliente</label>";
       echo "<select class=\"form-control form-control-lg\" name=\"cliente\">";
                
                $sql_cliente = "SELECT * FROM clientes";
                $res_cliente = mysqli_query($mysqli, $sql_cliente);
                
                while( $cliente= $res_cliente->fetch_assoc()){
                   echo "<option value=";
                   echo "{$cliente['id']}";
                   echo "\"\> {$cliente['nome']}</option>"; 
                }
        
       echo "</select>";
       echo "<label for=\"vendedor\">Nome do Vendedor</label>";
       echo "<select class=\"form-control form-control-lg\" name=\"vendedor\">";
                
                $sql_vendedor = "SELECT * FROM usuarios WHERE nivel='2'";
                $res_vendedor = mysqli_query($mysqli, $sql_vendedor);
                
                while( $vendedor= $res_vendedor->fetch_assoc()){
                   echo "<option value=";
                   echo "{$vendedor['id']}";
                   echo "\"\> {$vendedor['nome']}</option>"; 
                }
       echo "</select>";
       ?>
       <button type="submit" class="btn btn-outline-info mt-3">Cadastrar venda</button>
                </div>
       </div>
       
        
</form>