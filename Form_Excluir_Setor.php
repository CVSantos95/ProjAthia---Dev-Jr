<?php

include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_empresa = $_GET['id_empresa'];
    $id_setor = $_GET['id_setor'];

    $sql = "DELETE FROM empresa_setor WHERE empresa_id = :empresa_id AND setor_id = :setor_id";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':empresa_id', $id_empresa, PDO::PARAM_INT);
        $stmt->bindParam(':setor_id', $id_setor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: index.php?page=editar_empresa&id=" . $id_empresa);
            exit();
        } else {            
            echo "Erro ao adicionar setor.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>
