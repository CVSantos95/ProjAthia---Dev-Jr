<?php

include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_empresa = $_POST['id_empresa'];
    $id_setor = $_POST['select_setor'];

    $sql = "SELECT * FROM empresa_setor WHERE setor_id = :setor_id AND empresa_id = :empresa_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':empresa_id', $id_empresa, PDO::PARAM_INT);
    $stmt->bindParam(':setor_id', $id_setor, PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->rowCount()>0){
        //print "<script>alert('Setor já cadastrado!');</script>)";
        header("Location: index.php?page=editar_empresa&id=" . $id_empresa);      
        exit();
    }else{
        $sql = "INSERT INTO empresa_setor (empresa_id, setor_id) VALUES (:empresa_id, :setor_id)";

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
}
?>
