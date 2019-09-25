<?php

use FBMS\Contas\Controller\Categoria\Exclusao;
use FBMS\Contas\Controller\Categoria\Persistencia;
use FBMS\Contas\Controller\Categoria\FormularioEdicao;
use FBMS\Contas\Controller\Categoria\ListarCategorias;
use FBMS\Contas\Controller\Categoria\FormularioInsercao;

return [
    '/listar-categorias' => ListarCategorias::class,
    '/nova-categoria' => FormularioInsercao::class,
    '/salvar-categoria' => Persistencia::class,
    '/excluir-categoria' => Exclusao::class,
    '/alterar-categoria' => FormularioEdicao::class
    
    
];