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
            lancamento l  
        INNER JOIN 
            categoria c ON l.id_categoria = c.id_categoria
        ORDER BY 
            l.data_lancamento DESC"; 

$res = $conn->query($sql);

if (!$res) {
    echo "<p class='alert alert-danger text-center'>Erro ao consultar o banco de dados: " . $conn->error . "</p>";
    exit;
}

$qtd = $res->num_rows;

if($qtd > 0){
    $sql_saldo = "SELECT saldo_total FROM saldo WHERE id_saldo = 1";
    $res_saldo = $conn->query($sql_saldo);
    $saldo_total = ($res_saldo && $res_saldo->num_rows > 0) ? $res_saldo->fetch_object()->saldo_total : 0.00;
    
    if ($res_saldo) $res_saldo->free(); 

    $saldo_classe = ($saldo_total >= 0) ? 'text-success' : 'text-danger';

    echo "<div class='card shadow-sm mb-4 p-3 d-inline-block'>
            <h5 class='mb-0'>Saldo Atual: 
                <span class='fw-bold {$saldo_classe}'>
                    R$ " . number_format($saldo_total, 2, ',', '.') . "
                </span>
            </h5>
          </div>";
    
    echo "<div class='card table-card shadow-sm'>";
    echo "<div class='card-body p-0'>"; 
    echo "<div class='table-responsive'>"; 
    echo "<table class='table table-hover align-middle custom-table mb-0'>
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
        $categoria_segura = htmlentities($row->nome_categoria, ENT_QUOTES, 'UTF-8');
        $observacoes_seguras = htmlentities($row->observacoes, ENT_QUOTES, 'UTF-8');

        echo "<tr>
                <td>{$row->id_lancamento}</td>
                <td>{$categoria_segura}</td>
                <td><span class='badge {$badge_class}'>{$row->tipo}</span></td>
                <td>R$ " . number_format($row->valor, 2, ',', '.') . "</td>
                <td>{$data_formatada}</td>
                <td>{$observacoes_seguras}</td>
                <td>
                    <a href='index.php?page=editar-lancamento&id_lancamento={$row->id_lancamento}' 
                        class='btn btn-sm btn-info'>
                        <i class='bi bi-pencil-square'></i> Editar
                    </a>

                    <a href='index.php?page=salvar-lancamento&acao=excluir&id_lancamento={$row->id_lancamento}'
                        class='btn btn-sm btn-danger'
                        onclick=\"return confirm('Tem certeza que deseja excluir o lançamento #{$row->id_lancamento}? Esta ação é irreversível e o saldo será ajustado!');\">
                        <i class='bi bi-trash'></i> Excluir
                    </a>
                </td>
            </tr>";
    }
    echo "</tbody></table></div></div></div>";
    
    $res->free(); 
}
else {
    if (isset($saldo_total)) {
        echo "<div class='card shadow-sm mb-4 p-3 d-inline-block'>
                <h5 class='mb-0'>Saldo Atual: 
                    <span class='fw-bold {$saldo_classe}'>
                        R$ " . number_format($saldo_total, 2, ',', '.') . "
                    </span>
                </h5>
              </div>";
    }
    echo "<p class='alert alert-warning text-center'>Nenhum lançamento encontrado.</p>";
}

$conn->close();
?>