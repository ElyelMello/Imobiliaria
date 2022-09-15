<h1>Novo Usuário</h1>
<form action="?page=salvar-usuario" method="POST">
    <input type="hidden" name="acao" value='cadastrar-usuario'>
    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="nome" class="form-control">
        <label for="">E-mail</label>
        <input type="email" name="email" class="form-control">
        <label for="">Senha</label>
        <input type="password" name="senha" class="form-control">
        <label for="">Data de Nascimento</label>
        <input type="date" name="data_nasc" class="form-control">
        <label for="nivel">Nível do usuário</label>
        <?php
            include('permissoes.php');
            echo "<select class=\"form-control form-control-lg\" name=\"nivel\"> ";
                
                $sql_nivel= "SELECT * FROM niveis WHERE idnivel in (2, 3)";
                $res_nivel = mysqli_query($mysqli, $sql_nivel);
                
                $qntd_niveis = $res_nivel->num_rows;
                if($qntd_niveis == 0){
                    echo "<option>Nao há imóveis disponíveis</option>";
                }else{
                    while( $nivel= $res_nivel->fetch_assoc()){
                   echo "<option value=";
                   echo "{$nivel['idnivel']}";
                   echo "\"\> {$nivel['nivel']}</option>"; 
                }
                }
            echo "</select>";
            ?>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn btn-outline-info">Enviar</button>
    </div>
</form>