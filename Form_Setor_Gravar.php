<?php
    switch($_REQUEST["acao"]){
        case "novo":
            $descricao = $_POST["descricao"];


            $sql = "INSERT INTO setor (descricao) VALUES ('{$descricao}')";
            
            $res = $pdo -> query($sql);

            if($res->rowCount() > 0){          
                print "<script> alert('Cadastro realizado com sucesso!'); </script>)";
                print "<script>location.href='?page=listar_setor'</script>)";
            }else{
                print "<script>alert('Erro ao cadastrar!');</script>)";
                print "<script>location.href='?page=listar_setor'</script>)";
            }
        break;

        case"editar":
            $descricao = $_POST["descricao"];
            

            $sql = "UPDATE setor SET descricao = '{$descricao}' WHERE id_setor = ".$_REQUEST["id"];
            
            $res = $pdo -> query($sql);

            if($res->rowCount() > 0){          
                print "<script> alert('Editado com sucesso!'); </script>)";
                print "<script>location.href='?page=listar_setor'</script>)";
            }else{
                print "<script>alert('Erro ao editar!');</script>)";
                print "<script>location.href='?page=listar_setor'</script>)";
            }
        break;

        case"excluir":
            $sql = "DELETE FROM setor WHERE id_setor = ".$_REQUEST["id"];
            
            $res = $pdo -> query($sql);

            if($res->rowCount() > 0){          
                print "<script> alert('Excluido com sucesso!'); </script>)";
                print "<script>location.href='?page=listar_setor'</script>)";
            }else{
                print "<script>alert('Erro ao excluir!');</script>)";
                print "<script>location.href='?page=listar_setor'</script>)";
            }
        break;
    }
