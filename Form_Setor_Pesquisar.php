<h1>Pesquisa Setor</h1>

<?php

    $sql = "SELECT * from setor  ORDER BY id_setor";

    $res = $pdo -> query($sql);

    $qtd = $res -> rowCount();

    if($qtd > 0){
        print "<table class = 'table table-hover table-striped table-bordered'>";

        print "<tr>";
        print "<th>ID</th>";
        print "<th>Descrição</th>";
        print"<th>Ações</th>";
        print"</tr>";

        while($row = $res -> fetchObject()){
            print "<tr>";
            print "<td>".$row -> id_setor."</td>";
            print "<td>".$row -> descricao."</td>";
            print "<td>
                <button onclick=\"location.href='?page=editar_setor&id=".$row->id_setor."';\" class='btn btn-success'>Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=gravar_setor&acao=excluir&id=".$row->id_setor."';}else{false;}\"class='btn btn-danger'>Excluir</button>
            </td>";
            print "</tr>";
        }
        print "</table>";
    }
?>