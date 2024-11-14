<h1>Editar Empresa</h1>

<?php
$busca_empresa = "SELECT * FROM empresa WHERE id_empresa = :id";

$stmt = $pdo->prepare($busca_empresa);
$stmt->bindParam(':id', $_REQUEST["id"], PDO::PARAM_INT);
$stmt->execute();
$empresa = $stmt->fetchObject();

$busca_setores_da_empresa = "SELECT s.descricao, s.id_setor
            FROM empresa e
            JOIN empresa_setor es ON e.id_empresa = es.empresa_id
            JOIN setor s ON es.setor_id = s.id_setor
            WHERE id_empresa =:id";

$stmt = $pdo->prepare($busca_setores_da_empresa);
$stmt->bindParam(':id', $_REQUEST["id"], PDO::PARAM_INT);
$stmt->execute();
$setores_empresa = $stmt->fetchAll(PDO::FETCH_OBJ);


$busca_setores = "SELECT id_setor, descricao FROM setor";
$stmt = $pdo->prepare($busca_setores);
$stmt->execute();
$setores = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<div class="modal fade" id="addSetorModal" tabindex="-1" role="dialog" aria-labelledby="addSetorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSetorModalLabel">Adicionar Setor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="Form_Adicionar_Setor.php" method="POST">
                    <input type="hidden" name="id_empresa" value="<?php echo $empresa->id_empresa; ?>">
                    <div class="form-group">
                        <label for="setor">Escolha o Setor</label>
                        <select name="select_setor" id="select_setor">
                            <?php
                            foreach ($setores as $setor) {
                                echo ("<option value=\"{$setor->id_setor}\">{$setor->descricao}</option>");
                            }
                            ?>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<form action="?page=gravar_empresa" method="POST">
    <input type="hidden" name="acao" value="editar">

    <input type="hidden" name="id" value="<?php print $empresa->id_empresa; ?>">

    <div class="mb-3">
        <label>ID</label>
        <input type="text" name="id" value="<?php print $empresa->id_empresa; ?>" class="form-control" disabled>
    </div>

    <div class="mb-3">
        <label>Razão Social</label>
        <input type="text" name="razao" value="<?php print $empresa->razao_social; ?>" class="form-control" required maxlength="40">
    </div>

    <div class="mb-3">
        <label>Nome Fantasia</label>
        <input type="text" name="fantasia" value="<?php print $empresa->nome_fantasia; ?>" class="form-control" required maxlength="40">
    </div>

    <div class="mb-3">
        <label>CNPJ</label>
        <input type="text" name="cnpj" value="<?php print $empresa->cnpj; ?>" class="form-control" required maxlength="14">
    </div>

    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSetorModal">
            Adicionar Setor
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Setores</th>
                    <th scope="col">Ação</th>
                </tr>

            </thead>
            <tbody>
                <?php foreach ($setores_empresa as $setor): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($setor->descricao); ?></td>
                        <td>

                            <a href="#" class="btn btn-danger" onclick="excluirSetor(<?php echo $empresa->id_empresa; ?>, <?php echo $setor->id_setor; ?>)">
                                Excluir
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>
</form>

<script type="text/javascript">
    function excluirSetor(id_empresa, id_setor) {        
        location.href = "Form_Excluir_Setor.php?id_empresa=" + id_empresa + "&id_setor=" + id_setor;
    }
</script>