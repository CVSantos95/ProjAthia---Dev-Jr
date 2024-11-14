<h1>Cadastro de Empresas</h1>

<form action="?page=gravar_empresa" method="POST">
    <input type="hidden" name="acao" value="novo">

    <div class="mb-3">
        <label>Razão Social</label>
        <input type="text" name="razao" class="form-control" required maxlength="40">
    </div>

    <div class="mb-3">
        <label>Nome Fantasia</label>
        <input type="text" name="fantasia" class="form-control" required maxlength="40">
    </div>

    <div class="mb-3">
        <label>CNPJ</label>
        <input type="text" name="cnpj" class="form-control" required maxlength="14">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>


</form>