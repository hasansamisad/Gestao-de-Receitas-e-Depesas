<?php
require_once 'config.php';

$sql = "SELECT * FROM categoria ORDER BY nome_categoria ASC";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    echo "<div class='card table-card shadow-sm'>";
    echo "<div class='card-body'>";
    echo "<table class='table table-hover align-middle custom-table'>
            <thead class='table-header'>
                <tr>
                    <th style='width: 80px;'>ID</th>
                    <th>Nome da Categoria</th>
                    <th style='width: 180px;'>Ações</th>
                </tr>
            </thead>
            <tbody>";

    while($row = $res->fetch_object()){
        echo "<tr>
                <td>{$row->id_categoria}</td>
                <td>{$row->nome_categoria}</td>
                <td>
                    <a href='index.php?page=editar-categoria&id_categoria={$row->id_categoria}' 
                       class='btn btn-sm btn-edit'>
                       Editar
                    </a>

                    <a href='index.php?page=salvar-categoria&acao=excluir&id_categoria={$row->id_categoria}'
                       class='btn btn-sm btn-delete'
                       onclick=\"return confirm('Tem certeza que deseja excluir?');\">
                       Excluir
                    </a>
                </td>
              </tr>";
    }

    echo "</tbody></table></div></div>";
}else{
    echo "<p class='alert alert-warning text-center'>Nenhuma categoria encontrada.</p>";
}

$conn->close();
?>