<h1 class="page-title">Lista de Lançamentos</h1>

<?php
require_once 'config.php';

$sql = "SELECT 
            l.id_lancamento,
            l.tipo,
            l.valor,
            l.data_lancamento,
            l.observacoes,
            c.nome_categoria
        FROM 
            lancamentos l
        INNER JOIN 
            categoria c ON l.id_categoria = c.id_categoria
        ORDER BY 
            l.data_lancamento DESC"; 

$res = $conn->query($sql);
$qtd = $res->num_rows;

if($qtd > 0){
    echo "<div class='card table-card shadow-sm'>";
    echo "<div class='card-body'>";
    echo "<table class='table table-hover align-middle custom-table'>
              <thead class='table-header'>
                  <tr>
                      <th style='width: 80px;'>ID</th>
                      <th>Categoria</th>
                      <th>Tipo</th>
                      <th>Valor</th>
                      <th>Data</th>
                      <th>Observações</th>
                      <th style='width: 180px;'>Ações</th>
                  </tr>
              </thead>
              <tbody>";
    
    while($row = $res->fetch_object()) {
        $badge_class = ($row->tipo == 'RECEITA') ? 'bg-success' : 'bg-danger';
        $data_formatada = date('d/m/Y', strtotime($row->data_lancamento));

        echo "<tr>
                <td>{$row->id_lancamento}</td>
                <td>{$row->nome_categoria}</td>
                <td><span class='badge {$badge_class}'>{$row->tipo}</span></td>
                <td>R$ " . number_format($row->valor, 2, ',', '.') . "</td>
                <td>{$data_formatada}</td>
                <td>{$row->observacoes}</td>
                <td>
                    <a href='index.php?page=editar-lancamento&id_lancamento={$row->id_lancamento}' 
                        class='btn btn-sm btn-edit'>
                        Editar
                    </a>

                    <a href='index.php?page=salvar-lancamento&acao=excluir&id_lancamento={$row->id_lancamento}'
                        class='btn btn-sm btn-delete'
                        onclick=\"return confirm('Tem certeza que deseja excluir este lançamento?');\">
                        Excluir
                    </a>
                </td>
            </tr>";
    }
    echo "</tbody></table></div></div>";
}
else {
    echo "<p class='alert alert-warning text-center'>Nenhum lançamento encontrado.</p>";
}
$conn->close();
?>