<h1>Editar Cliente</h1>
<?php
    $sql = "SELECT * FROM clientes WHERE id=".$_REQUEST['id'];
    $res = $mysqli->query($sql);
    $row = $res->fetch_object();
?>
<form action="salvar-cliente.php" method="POST">
    <input type="hidden" name="acao" value='editar-cliente'>
    <input type="hidden" name="id" value='<?php echo $row->id;?>'>
    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="nome" value="<?php echo $row->nome;?>" class="form-control">
        <label for="">E-mail</label>
        <input type="email" name="email" value="<?php echo $row->email;?>" class="form-control">
        <label for="">Telefone</label>
        <input type="text" name="telefone" value="<?php echo $row->telefone;?>" class="form-control">
        <label for="">CPF</label>
        <input type="text" name="cpf" value="<?php echo $row->cpf;?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>