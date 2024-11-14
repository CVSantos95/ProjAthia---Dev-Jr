<?php
switch ($_REQUEST["acao"]) {
    case "novo":
        $razao = $_POST["razao"];
        $fantasia = $_POST["fantasia"];
        $cnpj = $_POST["cnpj"];

        $sql = "INSERT INTO empresa (razao_social,nome_fantasia,cnpj) VALUES ('{$razao}','{$fantasia}','{$cnpj}')";

        $res = $pdo->query($sql);

        if ($res->rowCount() > 0) {
            print "<script> alert('Cadastro realizado com sucesso!'); </script>)";
            print "<script>location.href='?page=listar_empresa'</script>)";
        } else {
            print "<script>alert('Erro ao cadastrar!');</script>)";
            print "<script>location.href='?page=listar_empresa'</script>)";
        }
        break;

    case "editar":
        $razao = $_POST["razao"];
        $fantasia = $_POST["fantasia"];
        $cnpj = $_POST["cnpj"];

        $sql = "UPDATE empresa SET razao_social = '{$razao}',
                                     nome_fantasia = '{$fantasia}',
                                     cnpj = '{$cnpj}' WHERE id_empresa = " . $_REQUEST["id"];

        $res = $pdo->query($sql);

        if ($res->rowCount() > 0) {
            print "<script> alert('Editado com sucesso!'); </script>)";
            print "<script>location.href='?page=listar_empresa'</script>)";
        } else {
            print "<script>alert('Erro ao editar!');</script>)";
            print "<script>location.href='?page=listar_empresa'</script>)";
        }
        break;

    case "excluir":
        $sql = "DELETE FROM empresa WHERE id_empresa = " . $_REQUEST["id"];

        $res = $pdo->query($sql);

        if ($res->rowCount() > 0) {
            print "<script> alert('Excluido com sucesso!'); </script>)";
            print "<script>location.href='?page=listar_empresa'</script>)";
        } else {
            print "<script>alert('Erro ao excluir!');</script>)";
            print "<script>location.href='?page=listar_empresa'</script>)";
        }
        break;
}
