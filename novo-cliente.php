<h1>Novo Cliente</h1>
<form action="?page=salvar-cliente" method="POST">
    <input type="hidden" name="acao" value='cadastrar-cliente'>
    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="nome" class="form-control">
        <label for="">E-mail</label>
        <input type="email" name="email" class="form-control">
        <label for="">Telefone</label>
        <input type="text" name="telefone" class="form-control">
        <label for="">CPF</label>
        <input type="text" name="cpf" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn btn-outline-info">Enviar</button>
    </div>
</form>