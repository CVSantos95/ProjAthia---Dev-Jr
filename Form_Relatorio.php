<h1>Empresas Geral</h1>
<br>
<br>

<form>
    <?php
        $busca_empresa = "SELECT * FROM empresa ORDER BY id_empresa";

        $stmt = $pdo->prepare($busca_empresa);
        $stmt->execute();
        $empresas = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($empresas as $empresa) {
            print "<table class = 'table table-hover table-striped table-bordered'>";

            print "<tr>";
            print "<th> ID </th>";
            print "<th> Razao Social </th>";
            print "<th> Nome Fantasia </th>";
            print "</tr>";

            print "<tr>";
            print "<td>".$empresa -> id_empresa."</td>";
            print "<td>".$empresa -> razao_social."</td>";
            print "<td>".$empresa -> nome_fantasia."</td>";
            print "</tr>";
 
            $busca_setores_da_empresa = "SELECT s.descricao, s.id_setor
                    FROM empresa e
                    JOIN empresa_setor es ON e.id_empresa = es.empresa_id
                    JOIN setor s ON es.setor_id = s.id_setor
                    WHERE id_empresa =:id";

            $stmt = $pdo->prepare($busca_setores_da_empresa);
            $stmt->bindParam(':id', $empresa->id_empresa, PDO::PARAM_INT);
            $stmt->execute();
            $setores_empresa = $stmt->fetchAll(PDO::FETCH_OBJ);
            
            print "<tr>";
            print "<th> ID </th>";
            print "<th colspan=\"2\"> Setor </th>";
            print "</tr>";
            if(count($setores_empresa) > 0){
                foreach ($setores_empresa as $setor) {

                    print "<tr>";
                    print "<td>".$setor -> id_setor."</td>";
                    print "<td colspan=\"2\">".$setor -> descricao."</td>";
                    print "</tr>";
                }
            }else{
                    print "<tr>";
                    print "<td> # </td>";
                    print "<td colspan=\"2\"> Não há setor cadastrado </td>";
                    print "</tr>";
                }
            print "</table>";
            echo "<br>";
            echo "<br>";        
        }
    ?>
</form>