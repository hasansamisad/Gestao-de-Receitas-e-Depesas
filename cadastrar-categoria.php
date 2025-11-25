<h1 class="page-title mb-4">Cadastrar Categoria</h1>

<div class="card shadow p-4 form-card">
    <form action="?page=salvar-categoria" method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <div class="mb-3">
            <label class="form-label fw-semibold">Nome da Categoria</label>
            <input type="text" name="nome_categoria" class="form-control" placeholder="Ex: Alimentação, Transporte..." required>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary px-4">Salvar</button>
        </div>
    </form>
</div>