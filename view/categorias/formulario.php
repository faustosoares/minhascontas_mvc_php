<?php include __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="categoria"/>
    
    <!-- Page Heading -->
    <?php if (!is_null($categoria)) : ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Alterar Categoria</h1>
        </div>
    <?php else: ?>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Nova Categoria</h1>
        </div>
    <?php  endif; ?>

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
        <div class="col-md-4" > 
            <a href="/listar-categorias" class="btn btn-secondary">
                <i class="fa fa-chevron-left"></i>
                Voltar
            </a>
            <button class="btn btn-primary">
                <i class="fa fa-check"></i>
                Salvar
            </button>
        </div>
    </form>

<?php include __DIR__ . '/../fim-html.php'; ?>