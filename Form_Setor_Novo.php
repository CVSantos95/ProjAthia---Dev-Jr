<h1>Cadastro de Setor</h1>

<form action="?page=gravar_setor" method="POST">
    <input type="hidden" name="acao" value="novo">

    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control"  required maxlength="40">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div> 

</form>
