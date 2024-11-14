<h1>Editar Setor</h1>

<?php
    $sql = "SELECT * FROM setor WHERE id_setor =".$_REQUEST["id"];

    $res = $pdo ->query($sql);
    $row = $res->fetchObject();
?>

<form action="?page=gravar_setor" method="POST">
    <input type="hidden" name="acao" value="editar">

    <input type="hidden" name="id" value="<?php print $row ->id_setor;?>">
    
    <div class="mb-3">
        <label>ID</label>
        <input type="text" name="id" value = "<?php print $row->id_setor;?>" class="form-control" disabled>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="descricao" value = "<?php print $row->descricao;?>" class="form-control" required maxlength="14">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>
</form>