<?php

require __DIR__ . '/../inicio-html.php'; ?>
    
    <a href="/novo-curso" class="btn btn-primary mb-2">
        Nova categoria
    </a>
    <ul class="list-group">
        <?php foreach ( $categorias as $categoria ): ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $categoria->getDescricao(); ?>

                <span>
                    <a href="/alterar-curso?id=<?= $categoria->getId(); ?>" class="btn btn-info btn-sm">
                        Alterar
                    </a>
                    <a href="/excluir-curso?id=<?= $categoria->getId(); ?>" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php

require __DIR__ . '/../fim-html.php';