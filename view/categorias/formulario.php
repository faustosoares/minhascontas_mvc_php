<?php include __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="categoria"/>
    <input type="hidden" id="situacaoMenu" name="situacaoMenu" value=""/>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $titulo; ?></h1>
    </div>

    <!-- Mensagens de validacao de formulario -->
    <?php include __DIR__ . '/../mensagem-validacao-form.php'; ?>

    <form action="/salvar-categoria<?= isset($categoria) ? '?id=' . $categoria->getId() : ''; ?>" method="post">
        <div class="form-group">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text"
                        id="nome"
                        name="nome"
                        class="form-control"
                        value="<?= isset($categoria) ? $categoria->getNome() : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="descricao">Descrição</label>
                    <input type="text"
                        id="descricao"
                        name="descricao"
                        class="form-control"
                        value="<?= isset($categoria) ? $categoria->getDescricao() : ''; ?>">
                </div>
            </div>    
        </div>
        <div class="form-row">
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
        </div>    
    </form>

<?php include __DIR__ . '/../fim-html.php'; ?>