<?php

require __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="compra"/>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 id="entidade" class="h3 mb-0 text-gray-800"><?= $titulo ?></h1>
       <a href="/nova-compra" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i>
            Nova Compra
       </a>
    </div>

    <!-- Mensagens de execucao de crud -->
    <?php include __DIR__ . '/../mensagem-crud.php'; ?>

    <table id="lista" class="table table-sm">
        <thead class="thead-light">
            <tr> 
                <th class="pt-2 pb-2" scope="col">Descrição</th>
                <th class="pt-2 pb-2" scope="col">Valor</th>
                <th class="pt-2 pb-2" scope="col">Parcelas</th>
                <th class="pt-2 pb-2" scope="col">Data</th>
                <th class="pt-2 pb-2" scope="col">Cartão</th>
                <th class="p-2" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $compras as $compra ): ?>
        <tr class="linha-tabela">
            <td class="align-middle"><?= $compra->getDescricao();?></td>
            <td class="align-middle"><?= $compra->getValor();?></td>
            <td class="align-middle"><?= $compra->getNumeroParcelas();?></td>
            <td class="align-middle"><?= $compra->getData();?></td>
            <td class="align-middle"><?= $compra->getCartao()->getBandeira() . ' - ' . $compra->getCartao()->getInstituicaoFinanceira();?></td>

            <td class="controles-tabela">
                <span>
                    <a href="/alterar-pessoa?id=<?= $compra->getId(); ?>" class="btn btn-info btn-sm">
                        <i class="fa fa-pen"></i>
                        Alterar
                    </a>
            
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ExemploModalCentralizado"
                        onclick="setaDadosModal(<?= $compra->getId(); ?>, '<?= $compra->getDescricao(); ?>', '<?= $rotaExclusao ?>' , 'compra')">
                        <i class="fa fa-times"></i>
                        Excluir
                    </a>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
        
        </tbody>
    </table>
<?php
require __DIR__ . '/../modal-excluir.php'; 
require __DIR__ . '/../fim-html.php';