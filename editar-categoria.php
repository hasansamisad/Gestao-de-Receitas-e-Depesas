<?php
require_once 'config.php';

$id_categoria = $conn->real_escape_string($_REQUEST["id_categoria"]);
$sql = "SELECT * FROM categoria WHERE id_categoria = " . $id_categoria;
$res = $conn->query($sql);
$row = $res->fetch_object();

if (!$row) {
    print "<p class='alert alert-warning'>Categoria não encontrada para edição.</p>";
    exit;
}
?>

<h1 class="page-title">Editar Categoria</h1>

<div class="card shadow p-4 form-card">
    <form action="?page=salvar-categoria" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id_categoria" value="<?php print $row->id_categoria; ?>">

        <div class="mb-3">
            <label class="form-label fw-semibold">Nome da Categoria</label>
            <input 
                type="text" 
                name="nome_categoria" 
                class="form-control" 
                value="<?php print htmlspecialchars($row->nome_categoria); ?>" 
                required
            >
        </div>

        <div class="text-end">
            <a href="?page=listar-categoria" class="btn btn-cancel me-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>