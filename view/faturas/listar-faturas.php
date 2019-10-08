<?php

require __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="fatura"/>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 id="entidade" class="h3 mb-0 text-gray-800">Fatura</h1>
       <a href="/nova-fatura" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i>
            Nova Fatura
       </a>
    </div>

    <!-- Mensagens de execucao de crud -->
    <?php include __DIR__ . '/../mensagem-crud.php'; ?>

    <table id="lista" class="table table-sm">
        <thead class="thead-light">
            <tr> 
                <th class="pt-2 pb-2" scope="col">Mês/Ano</th>
                <th class="pt-2 pb-2" scope="col">Cartão</th>
                <th class="pt-2 pb-2" scope="col">Dia de fechamento</th>
                <th class="pt-2 pb-2" scope="col">Dia de vencimento</th>
                <th class="pt-2 pb-2" scope="col">Titular do Cartão</th>
                <th class="p-2" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $faturas as $fatura ): ?>
        <tr class="linha-tabela">
            <td class="align-middle"><?= $fatura->getMes() . '/' . $fatura->getAno();?></td>
            <td class="align-middle"><?= $fatura->getCartao()->getBandeira() . ' - ' . $fatura->getCartao()->getInstituicaoFinanceira() ;?></td>
            <td class="align-middle"><?= $fatura->getDiaFechamento();?></td>
            <td class="align-middle"><?= $fatura->getDiaVencimento();?></td>
            <td class="align-middle"><?= $fatura->getCartao()->getNomeTitular();?></td>
            <td class="controles-tabela">
                <span>
                    <a href="/alterar-fatura?id=<?= $fatura->getId(); ?>" class="btn btn-info btn-sm">
                        <i class="fa fa-pen"></i>
                        Alterar
                    </a>
            
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ExemploModalCentralizado"
                        onclick="setaDadosModal(<?= $fatura->getId(); ?>, '<?= $fatura->getCartao()->getBandeira(); ?>', '<?= $rotaExclusao ?>' , 'fatura')">
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