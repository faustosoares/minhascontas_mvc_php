<?php

require __DIR__ . '/../inicio-html.php'; ?>

    <input type="hidden" id="menu" name="menu" value="collapseTwo"/> 
    <input type="hidden" id="item" name="item" value="pessoa"/>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
       <h1 id="entidade" class="h3 mb-0 text-gray-800">Pessoa</h1>
       <a href="/nova-pessoa" class="btn btn-primary mb-2">
            <i class="fa fa-plus"></i>
            Nova pessoa
       </a>
    </div>

    <!-- Mensagens de execucao de crud -->
    <?php include __DIR__ . '/../mensagem-crud.php'; ?>

    <table id="lista" class="table table-sm">
        <thead class="thead-light">
            <tr> 
                <th class="pt-2 pb-2" scope="col">Nome</th>
                <th class="pt-2 pb-2" scope="col">E-mail</th>
                <th class="pt-2 pb-2" scope="col">Usuário</th>
                <th class="p-2" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $pessoas as $pessoa ): ?>
        <tr class="linha-tabela">
            <td class="align-middle"><?= $pessoa->getNome();?></td>
            <td class="align-middle"><?= $pessoa->getEmail();?></td>
            <td class="align-middle"><?= $pessoa->getNomeUsuario();?></td>
            <td class="controles-tabela">
                <span>
                    <a href="/alterar-pessoa?id=<?= $pessoa->getId(); ?>" class="btn btn-info btn-sm">
                        <i class="fa fa-pen"></i>
                        Alterar
                    </a>
            
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ExemploModalCentralizado"
                        onclick="setaDadosModal(<?= $pessoa->getId(); ?>, '<?= $pessoa->getNome(); ?>', '<?= $rotaExclusao ?>' , 'pessoa')">
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