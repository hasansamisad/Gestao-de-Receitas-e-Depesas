<?php
require_once 'config.php';

$id_lancamento = $conn->real_escape_string($_REQUEST["id_lancamento"]);

$sql_lancamento = "SELECT id_lancamento, id_categoria, tipo, valor, data_lancamento, observacoes 
                   FROM lancamento 
                   WHERE id_lancamento = '{$id_lancamento}'";
                   
$res_lancamento = $conn->query($sql_lancamento);
$lancamento = $res_lancamento->fetch_object();
$sql_categorias = "SELECT id_categoria, nome_categoria FROM categoria ORDER BY nome_categoria";
$res_categorias = $conn->query($sql_categorias);

if (!$lancamento) {
    print "<p class='alert alert-warning'>Lançamento não encontrado para edição.</p>";
    exit;
}
?>

<h1 class="page-title">Editar Lançamento (ID: <?= $lancamento->id_lancamento ?>)</h1>

<form action="?page=salvar-lancamento" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_lancamento" value="<?= $lancamento->id_lancamento ?>">
    <div class="card shadow p-4 form-card">
        <div class="mb-3">
            <label class="form-label fw-semibold">Categoria</label>
            <select name="id_categoria" class="form-control" required>
                <option value="">Selecione a Categoria</option>
                <?php
                if ($res_categorias && $res_categorias->num_rows > 0) {
                    while($row_categoria = $res_categorias->fetch_object()) {
                        $selected = ($row_categoria->id_categoria == $lancamento->id_categoria) ? 'selected' : '';
                        $nome_seguro = htmlspecialchars($row_categoria->nome_categoria);
                        print "<option value='{$row_categoria->id_categoria}' {$selected}>{$nome_seguro}</option>";
                    }
                    $res_categorias->free();
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Tipo de Lançamento</label>
            <select name="tipo" class="form-select" required>
                <option value="">Selecione o Tipo</option>
                <option value="RECEITA" <?= ($lancamento->tipo == 'RECEITA') ? 'selected' : '' ?>>Receita</option>
                <option value="DESPESA" <?= ($lancamento->tipo == 'DESPESA') ? 'selected' : '' ?>>Despesa</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Observações</label>
            <input type="text" name="observacoes" class="form-control" 
                   value="<?= htmlspecialchars($lancamento->observacoes ?? '') ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Valor</label>
            <input type="number" step="0.01" name="valor" class="form-control" 
                   value="<?= htmlspecialchars($lancamento->valor) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Data</label>
            <input type="date" name="data_lancamento" class="form-control" 
                   value="<?= date('Y-m-d', strtotime($lancamento->data_lancamento)) ?>" required>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-warning px-4">Salvar Alterações</button>
        </div>
    </div>
</form>

<?php 
$res_lancamento->free(); 
?>