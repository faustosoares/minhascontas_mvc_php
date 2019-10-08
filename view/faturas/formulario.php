<?php include __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="fatura"/>
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $titulo; ?></h1>
    </div>

    <!-- Mensagens de validacao de formulario -->
    <?php include __DIR__ . '/../mensagem-validacao-form.php'; ?>

    <form action="/salvar-fatura<?= isset($fatura) ? '?id=' . $fatura->getId() : ''; ?>" method="post">
        <div class="form-group">
          
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cartao">Cartão</label>
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
                <div class="form-group col-md-2">
                    <label for="mes">Mês</label>
                    <input type="number"
                        id="mes"
                        name="mes"
                        class="form-control"
                        value="<?= isset($fatura) ? $fatura->getMes() : ''; ?>">
                </div>
            
                <div class="form-group col-md-2">
                    <label for="ano">Ano</label>
                    <input type="number"
                        id="ano"
                        name="ano"
                        class="form-control"
                        value="<?= isset($fatura) ? $fatura->getAno() : ''; ?>">
                </div>
            </div>    

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="diaFechamento">Dia de Fechamento</label>
                    <input type="number"
                        id="diaFechamento"
                        name="diaFechamento"
                        class="form-control"
                        value="<?= isset($fatura) ? $fatura->getDiaFechamento() : ''; ?>">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="diaVencimento">Dia de Vencimento</label>
                    <input type="number"
                        id="diaVencimento"
                        name="diaVencimento"
                        class="form-control"
                        value="<?= isset($fatura) ? $fatura->getDiaVencimento() : ''; ?>">
                </div>
            </div>
        </div>
        
        <div class="form-row">
            <div class="col-md-4" > 
                <a href="/listar-faturas" class="btn btn-secondary">
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