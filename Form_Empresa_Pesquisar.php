<h1>Pesquisa Empresa</h1>

<?php

    $sql = "SELECT * from empresa ORDER BY id_empresa";

    $res = $pdo -> query($sql);

    $qtd = $res -> rowCount();

    if($qtd > 0){
        print "<table class = 'table table-hover table-striped table-bordered'>";

        print "<tr>";
        print "<th>ID</th>";
        print"<th>Razao Social</th>";
        print"<th>Nome Fantasia</th>";
        print"<th>CNPJ</th>";
        print"<th>Ações</th>";
        print"</tr>";

        while($row = $res -> fetchObject()){
            print "<tr>";
            print "<td>".$row -> id_empresa."</td>";
            print "<td>".$row -> razao_social."</td>";
            print "<td>".$row -> nome_fantasia."</td>";
            print "<td>".$row -> cnpj."</td>";
            print "<td>
                <button onclick=\"location.href='?page=editar_empresa&id=".$row->id_empresa."';\" class='btn btn-success'>Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=gravar_empresa&acao=excluir&id=".$row->id_empresa."';}else{false;}\"class='btn btn-danger'>Excluir</button>
            </td>";
            print "</tr>";
        }
        print "</table>";
    }
?>