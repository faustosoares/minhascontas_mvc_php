<?php include __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="cartao"/>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $titulo; ?></h1>
    </div>

    <!-- Mensagens de validacao de formulario -->
    <?php include __DIR__ . '/../mensagem-validacao-form.php'; ?>

    <form action="/salvar-cartao<?= isset($cartao) ? '?id=' . $cartao->getId() : ''; ?>" method="post">
        <div class="form-group">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bandeira">Bandeira</label>
                    <input type="text"
                        id="bandeira"
                        name="bandeira"
                        class="form-control"
                        value="<?= isset($cartao) ? $cartao->getBandeira() : ''; ?>">
                </div>
            </div>    

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="instituicao">Instituição</label>
                    <input type="text"
                        id="instituicao"
                        name="instituicao"
                        class="form-control"
                        value="<?= isset($cartao) ? $cartao->getInstituicaoFinanceira() : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="vencimento">Vencimento</label>
                    <input type="number"
                        id="vencimento"
                        name="vencimento"
                        class="form-control"
                        value="<?= isset($cartao) ? $cartao->getVencimento() : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="titular">Titular</label>
                    <select name="titular" id="titular" class="custom-select">
                        <?php foreach ($pessoas as $pessoa): ?>
                            <?php $selecionado = '' ?>
                            <?php 
                                if($pessoa->getId() == $titularAtual){
                                    $selecionado = 'selected';
                                }
                            ?>
                            <option <?= $selecionado ?> value="<?= $pessoa->getId(); ?>"> <?= $pessoa->getNome(); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-4" > 
                <a href="/listar-cartoes" class="btn btn-secondary">
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