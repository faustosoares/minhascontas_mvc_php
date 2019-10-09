<?php include __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="compra"/>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $titulo; ?></h1>
       
    </div>

    <!-- Mensagens de validacao de formulario -->
    <?php include __DIR__ . '/../mensagem-validacao-form.php'; ?>

    <form action="/salvar-compra<?= isset($compra) ? '?id=' . $compra->getId() : ''; ?>" method="post">
        <div class="form-group">
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="descricao">Descrição</label>
                    <input type="text"
                        id="descricao"
                        name="descricao"
                        class="form-control"
                        value="<?= isset($compra) ? $compra->getDescricao() : ''; ?>">
                </div>
            </div>    

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="valor">Valor</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>

                        <input type="text"
                            id="valor"
                            name="valor"
                            class="form-control"
                            value="<?= isset($compra) ? str_replace('.',',',$compra->getValor()) : ''; ?>">
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="numeroParcelas">Parcelas</label>
                    <input type="number"
                        id="numeroParcelas"
                        name="numeroParcelas"
                        class="form-control"
                        value="<?= isset($compra) ? $compra->getNumeroParcelas() : ''; ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="data">Data</label>
                    <input type="date"
                        id="data"
                        name="data"
                        class="form-control"
                        value="<?= isset($compra) ? $compra->getDataFormulario() : ''; ?>">
                </div>

                <div class="form-group col-md-4">
                    <label for="pessoa">Cartão</label>
                    <select name="cartao" id="cartao" class="custom-select">
                        <option value="-1">Selecione</option>
                        <?php foreach ($cartoes as $cartao): ?>
                            <?php $selecionado = '' ?>
                            <?php 
                                if($cartao->getId() == $cartaoAtual){
                                    $selecionado = 'selected';
                                }
                            ?>
                            <option <?= $selecionado ?> value="<?= $cartao->getId(); ?>"> 
                                <?= $cartao->getBandeira() . ' - ' . $cartao->getTitular()->getNome();  ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pessoa">Categoria</label>
                    <select name="categoria" id="categoria" class="custom-select">
                        <option value="-1">Selecione</option>
                        <?php foreach ($categorias as $categoria): ?>
                            <?php $selecionado = '' ?>
                            <?php 
                                if($categoria->getId() == $categoriaAtual){
                                    $selecionado = 'selected';
                                }
                            ?>
                            <option <?= $selecionado ?> value="<?= $categoria->getId(); ?>"> <?= $categoria->getNome(); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="pessoa">Fatura</label>
                    <select name="fatura" id="fatura" class="custom-select">
                        <option value="-1">Selecione</option>
                        <?php foreach ($faturas as $fatura): ?>
                            <?php $selecionado = '' ?>
                            <?php 
                                if($fatura->getId() == $faturaAtual){
                                    $selecionado = 'selected';
                                }
                            ?>
                            <option <?= $selecionado ?> value="<?= $fatura->getId(); ?>"> <?= $fatura->getIdentificacao(); ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pessoa">Comprador</label>
                    <select name="comprador" id="comprador" class="custom-select">
                        <option value="-1">Selecione</option>
                        <?php foreach ($pessoas as $pessoa): ?>
                            <?php $selecionado = '' ?>
                            <?php 
                                if($pessoa->getId() == $compradorAtual){
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
                <a href="/listar-compras" class="btn btn-secondary">
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