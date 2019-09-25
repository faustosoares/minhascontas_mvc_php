<?php

require __DIR__ . '/../inicio-html.php'; ?>

    
    <a href="/nova-categoria" class="btn btn-primary mb-2">
        Nova categoria
    </a>

    <table id="lista" class="table table-sm">
        <thead class="thead-light">
            <tr> 
                <th class="pt-2 pb-2" scope="col">Nome</th>
                <th class="pt-2 pb-2" scope="col">Descrição</th>
                <th class="p-2" scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ( $categorias as $categoria ): ?>
        <tr class="linha-tabela">
            <td class="align-middle"><?= $categoria->getNome();?></td>
            <td class="align-middle"><?= $categoria->getDescricao();?></td>
            <td class="controles-tabela">
                <span>
                    <a href="/alterar-categoria?id=<?= $categoria->getId(); ?>" class="btn btn-info btn-sm">
                        Alterar
                    </a>
            
                    <!--
                    <a href="/excluir-categoria?id=<?= $categoria->getId(); ?>" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                    -->

                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ExemploModalCentralizado"
                        onclick="setaDadosModal(<?= $categoria->getId(); ?>, '<?= $categoria->getNome(); ?>', '<?= $rotaExclusao ?>' )">
                        Excluir
                    </a>
                </span>
            </td>
        </tr>
        <?php endforeach; ?>
        
        </tbody>
    </table>
<?php
require __DIR__ . '/modal-excluir-categorias.php'; 
require __DIR__ . '/../fim-html.php';