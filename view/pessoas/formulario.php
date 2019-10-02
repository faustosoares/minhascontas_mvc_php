<?php include __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="pessoa"/>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $titulo; ?></h1>
    </div>

    <!-- Mensagens de validacao de formulario -->
    <?php include __DIR__ . '/../mensagem-validacao-form.php'; ?>

    <form action="/salvar-pessoa<?= isset($pessoa) ? '?id=' . $pessoa->getId() : ''; ?>" method="post">
        <div class="form-group">
            <div class="form-group col-md-10">
                <label for="nome">Nome</label>
                <input type="text"
                    id="nome"
                    name="nome"
                    class="form-control"
                    value="<?= isset($pessoa) ? $pessoa->getNome() : ''; ?>">
            </div>

            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="email"
                    id="email"
                    name="email"
                    class="form-control"
                    value="<?= isset($pessoa) ? $pessoa->getEmail() : ''; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="usuario">Usuário</label>
                <input type="text"
                    id="usuario"
                    name="usuario"
                    class="form-control"
                    value="<?= isset($pessoa) ? $pessoa->getNomeUsuario() : ''; ?>">
            </div>

            <div class="form-group col-md-4">
                <label for="senha">Senha</label>
                <input type="password"
                    id="senha"
                    name="senha"
                    class="form-control"
                    value="<?= isset($pessoa) ? $pessoa->getSenhaUsuario() : ''; ?>">
            </div>
        </div>
        <div class="col-md-4" > 
            <a href="/listar-pessoas" class="btn btn-secondary">
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