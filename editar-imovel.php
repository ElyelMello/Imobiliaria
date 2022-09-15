<h1>Editar Imóvel</h1>
<?php
    $sql = "SELECT * FROM imoveis WHERE id=".$_REQUEST['id'];
    $res = $mysqli->query($sql);
    $row = $res->fetch_object();
?>
<form action="salvar-imovel.php" method="POST">
    <input type="hidden" name="acao" value='editar-imovel'>
    <input type="hidden" name="id" value='<?php echo $row->id;?>'>
    <div class="mb-3">
        <label for="">Endereço</label>
        <input type="text" name="endereco" value="<?php echo $row->endereco;?>" class="form-control">
        <label for="">Dimensões</label>
        <input type="text" name="dimensoes" value="<?php echo $row->dimensoes;?>" class="form-control">
        <label for="">Observações</label>
        <input type="text" name="observacoes" class="form-control">
        <label for="">Valor</label>
        <input type="text" name="valor" value="<?php echo $row->valor;?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>