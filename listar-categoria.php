<h1 class="page-title">Lista de Categorias</h1>

<?php
require_once 'config.php';

$sql = "SELECT * FROM categoria ORDER BY nome_categoria ASC";
$res = $conn->query($sql);

if (!$res) {
    echo "<p class='alert alert-danger text-center'>Erro ao consultar o banco de dados: " . $conn->error . "</p>";
    $conn->close();
    exit;
}

$qtd = $res->num_rows;

if($qtd > 0){
    echo "<div class='card table-card shadow-sm'>";
    echo "<div class='card-body p-0'>"; 
    echo "<div class='table-responsive'>"; 
    echo "<table class='table table-hover align-middle custom-table mb-0'>
              <thead class='table-header'>
                  <tr>
                      <th style='width: 80px;'>ID</th>
                      <th>Nome da Categoria</th>
                      <th style='width: 180px;'>Ações</th>
                  </tr>
              </thead>
              <tbody>";

    while($row = $res->fetch_object()){
        $nome_seguro = htmlspecialchars($row->nome_categoria);
        
        echo "<tr>
                <td>{$row->id_categoria}</td>
                <td>{$nome_seguro}</td>
                <td>
                    <a href='index.php?page=editar-categoria&id_categoria={$row->id_categoria}' 
                       class='btn btn-sm btn-info'>
                       <i class='bi bi-pencil-square'></i> Editar
                    </a>

                    <a href='index.php?page=salvar-categoria&acao=excluir&id_categoria={$row->id_categoria}'
                       class='btn btn-sm btn-danger'
                       onclick=\"return confirm('Tem certeza que deseja excluir a categoria {$nome_seguro}? Todos os lançamentos associados também serão excluídos devido ao ON DELETE CASCADE!');\">
                       <i class='bi bi-trash'></i> Excluir
                    </a>
                </td>
              </tr>";
    }

    echo "</tbody></table></div></div></div>";
    $res->free(); 
} else {
    echo "<p class='alert alert-warning text-center'>Nenhuma categoria encontrada.</p>";
}

$conn->close();
?>