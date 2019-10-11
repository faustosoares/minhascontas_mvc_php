<?php

require __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="fatura"/>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 id="entidade" class="h3 mb-0 text-gray-800"><?= $titulo ?></h1>
    </div>

    <!-- Mensagens de execucao de crud -->
    <?php include __DIR__ . '/../mensagem-crud.php'; ?>

    <table id="lista" class="table table-sm">
        <thead class="thead-light">
            <tr> 
                <th class="pt-2 pb-2" scope="col">Descrição</th>
                <th class="pt-2 pb-2" scope="col">Valor</th>
                <th class="pt-2 pb-2" scope="col">Qtd parcelas</th>
                <th class="pt-2 pb-2" scope="col">Categoria</th>
                <th class="pt-2 pb-2" scope="col">Data</th>
                <th class="pt-2 pb-2" scope="col">Parcela nº</th>

                <th class="p-2" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $comprasDaFatura as $compra ): ?>
        <tr class="linha-tabela">
            <td class="align-middle"><?= $compra->getDescricao(); ?></td>
            <td class="align-middle">
                <?php
                    $preco = explode('.',$compra->getValor());
                    if (is_null($preco[1])) {
                        echo str_replace('.',',',$compra->getValor()) . ',00'; 
                    } elseif (strlen($preco[1]) == 1) {
                        echo str_replace('.',',',$compra->getValor()) . '0'; 
                    } else {
                        echo str_replace('.',',',$compra->getValor());
                    }
                ?>    
            </td>
            <td class="align-middle"><?= $compra->getNumeroParcelas();  ?></td>
            <td class="align-middle"><?= $compra->getCategoria()->getNome();?></td>
            <td class="align-middle"><?= $compra->getData();?></td>
            <td class="align-middle">
                <input class="form-control col-md-3" type="number" name="parcela" id="parcela"/>
            </td>

            <td class="controles-tabela">
                <span>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ExemploModalCentralizado"
                        onclick="setaDadosModal(<?= $compra->getId(); ?>, '<?= $compra->getDescricao(); ?>', '<?= $rotaExclusao ?>' , 'compra')">
                        <i class="fa fa-plus"></i>
                        Adicionar na fatura
                    </a>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
        
        </tbody>
    </table>

    <table id="lista" class="table table-sm">
        <thead class="thead-light">
            <tr> 
                <th class="pt-2 pb-2" scope="col">Descrição</th>
                <th class="pt-2 pb-2" scope="col">Valor</th>
                <th class="pt-2 pb-2" scope="col">Qtd parcelas</th>
                <th class="pt-2 pb-2" scope="col">Categoria</th>
                <th class="pt-2 pb-2" scope="col">Data</th>

                <th class="p-2" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $comprasDaFatura as $compra ): ?>
        <tr class="linha-tabela">
            <td class="align-middle"><?= $compra->getDescricao(); ?></td>
            <td class="align-middle">
                <?php
                    $preco = explode('.',$compra->getValor());
                    if (is_null($preco[1])) {
                        echo str_replace('.',',',$compra->getValor()) . ',00'; 
                    } elseif (strlen($preco[1]) == 1) {
                        echo str_replace('.',',',$compra->getValor()) . '0'; 
                    } else {
                        echo str_replace('.',',',$compra->getValor());
                    }
                ?>    
            </td>
            <td class="align-middle"><?= $compra->getNumeroParcelas();  ?></td>
            <td class="align-middle"><?= $compra->getCategoria()->getNome();?></td>
            <td class="align-middle"><?= $compra->getData();?></td>

            <td class="controles-tabela">
                <span>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ExemploModalCentralizado"
                        onclick="setaDadosModal(<?= $compra->getId(); ?>, '<?= $compra->getDescricao(); ?>', '<?= $rotaExclusao ?>' , 'compra')">
                        <i class="fa fa-times"></i>
                        Remover da fatura
                    </a>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
        
        </tbody>
    </table>

    <div class="form-row">
        <div class="col-md-4" > 
            <a href="/listar-faturas" class="btn btn-secondary">
                <i class="fa fa-chevron-left"></i>
                Voltar
            </a>
        </div>
    </div>
<?php
require __DIR__ . '/../modal-excluir.php'; 
require __DIR__ . '/../fim-html.php';