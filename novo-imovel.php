<h1>Novo Imóvel</h1>
<form action="salvar-imovel.php" method="POST">
    <input type="hidden" name="acao" value='cadastrar-imovel'>
    <div class="mb-3">
        <label for="">Endereço</label>
        <input type="text" name="endereco" class="form-control">
        <label for="">Dimensões</label>
        <input type="text" name="dimensoes" class="form-control">
        <label for="">Observações</label>
        <input type="text" name="observacoes" class="form-control">
        <label for="">Valor</label>
        <input type="number" step="any" name="valor" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn btn-outline-info">Enviar</button>
    </div>
</form>