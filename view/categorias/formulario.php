<?php include __DIR__ . '/../inicio-html.php'; ?>

    <form action="/salvar-categoria<?= isset($categoria) ? '?id=' . $categoria->getId() : ''; ?>" method="post">
        <div class="form-group">
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text"
                    id="nome"
                    name="nome"
                    class="form-control"
                    value="<?= isset($categoria) ? $categoria->getNome() : ''; ?>">
            </div>

            <div class="form-group col-md-10">
                <label for="descricao">Descrição</label>
                <input type="text"
                    id="descricao"
                    name="descricao"
                    class="form-control"
                    value="<?= isset($categoria) ? $categoria->getDescricao() : ''; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>

<?php include __DIR__ . '/../fim-html.php'; ?>