<?php
require_once 'config.php';

$id_categoria = (int)$_REQUEST["id_categoria"];
$sql = "SELECT * FROM categoria WHERE id_categoria = {$id_categoria}";
$res = $conn->query($sql);

if (!$res) {
     print "<p class='alert alert-danger'>Erro na consulta ao banco de dados: " . $conn->error . "</p>";
     exit;
}

$row = $res->fetch_object();

if (!$row) {
    print "<p class='alert alert-warning'>Categoria não encontrada para edição.</p>";
    $res->free(); 
    exit;
}
?>

<h1 class="page-title">Editar Categoria (ID: <?= $row->id_categoria ?>)</h1>

<div class="card shadow p-4 form-card">
    <form action="?page=salvar-categoria" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_categoria" value="<?= $row->id_categoria ?>">

        <div class="mb-3">
            <label class="form-label fw-semibold">Nome da Categoria</label>
            <input 
                type="text" 
                name="nome_categoria" 
                class="form-control" 
                value="<?= htmlspecialchars($row->nome_categoria) ?>" 
                required
            >
        </div>

        <div class="text-end">
            <a href="?page=listar-categoria" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>

<?php 

$res->free(); 
?>