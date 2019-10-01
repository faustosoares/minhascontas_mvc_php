<?php

require __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="cartao"/>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 id="entidade" class="h3 mb-0 text-gray-800">Cartão</h1>
       <a href="/novo-cartao" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i>
            Novo cartão
       </a>
    </div>

    <!-- Mensagens de execucao de crud -->
    <?php include __DIR__ . '/../mensagem-crud.php'; ?>

    <table id="lista" class="table table-sm">
        <thead class="thead-light">
            <tr> 
                <th class="pt-2 pb-2" scope="col">Bandeira</th>
                <th class="pt-2 pb-2" scope="col">Titular</th>
                <th class="pt-2 pb-2" scope="col">Instituição</th>
                <th class="pt-2 pb-2" scope="col">Vencimento</th>
                <th class="p-2" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $cartoes as $cartao ): ?>
        <tr class="linha-tabela">
            <td class="align-middle"><?= $cartao->getBandeira();?></td>
            <td class="align-middle"><?= $cartao->getTitular()->getNome();?></td>
            <td class="align-middle"><?= $cartao->getInstituicaoFinanceira();?></td>
            <td class="align-middle"><?= $cartao->getVencimento();?></td>
            <td class="controles-tabela">
                <span>
                    <a href="/alterar-cartao?id=<?= $cartao->getId(); ?>" class="btn btn-info btn-sm">
                        <i class="fa fa-pen"></i>
                        Alterar
                    </a>
            
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ExemploModalCentralizado"
                        onclick="setaDadosModal(<?= $cartao->getId(); ?>, '<?= $cartao->getBandeira(); ?>',
                                 '<?= $rotaExclusao ?>' , 'cartao')">
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