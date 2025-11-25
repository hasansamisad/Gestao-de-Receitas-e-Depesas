<?php
require_once 'config.php';

$sql_categorias = "SELECT id_categoria, nome_categoria FROM categoria ORDER BY nome_categoria ASC";
$res_categorias = $conn->query($sql_categorias);
?>

<h1 class="page-title mb-4">Cadastrar Lançamento</h1>

<div class="card shadow p-4 form-card">
    <form action="?page=salvar-lancamento" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label class="form-label fw-semibold">Categoria</label>
            <select name="id_categoria" class="form-select" required>
                <option value="">Selecione a Categoria</option>
                <?php
                if ($res_categorias->num_rows > 0) {
                    while($row_cat = $res_categorias->fetch_object()) {
                        print "<option value='{$row_cat->id_categoria}'>{$row_cat->nome_categoria}</option>";
                    }
                } else {
                    print "<option value='' disabled>Nenhuma categoria cadastrada.</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Descrição</label>
            <input type="text" name="descricao" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Valor</label>
            <input type="number" step="0.01" name="valor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Tipo de Lançamento</label>
            <select name="tipo" class="form-select" required>
                <option value="">Selecione o Tipo</option>
                <option value="RECEITA">Receita</option>
                <option value="DESPESA">Despesa</option>
            </select>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">Salvar Lançamento</button>
        </div>
    </form>
</div>