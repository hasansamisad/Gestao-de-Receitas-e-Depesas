<?php
require_once 'config.php';

$id_lancamento = $conn->real_escape_string($_REQUEST["id_lancamento"]);
$sql_lancamento = "SELECT * FROM lancamentos WHERE id_lancamento = {$id_lancamento}";
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

    <div class="mb-3">
        <label>Categoria</label>
        <select name="id_categoria" class="form-control" required>
            <option value="">Selecione a Categoria</option>
            <?php
            while($row_categoria = $res_categorias->fetch_object()) {
                $selected = ($row_categoria->id_categoria == $lancamento->id_categoria) ? 'selected' : '';
                print "<option value='{$row_categoria->id_categoria}' {$selected}>{$row_categoria->nome_categoria}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Descrição</label>
        <input type="text" name="descricao" class="form-control" value="<?= htmlspecialchars($lancamento->descricao) ?>" required>
    </div>

    <div class="mb-3">
        <label>Valor</label>
        <input type="number" step="0.01" name="valor" class="form-control" value="<?= $lancamento->valor ?>" required>
    </div>

    <div class="mb-3">
        <label>Data</label>
        <input type="date" name="data" class="form-control" value="<?= date('Y-m-d', strtotime($lancamento->data)) ?>" required>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-warning">Salvar Alterações</button>
    </div>
</form>