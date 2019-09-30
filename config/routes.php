<?php


use FBMS\Contas\Controller\Categoria\Exclusao;
use FBMS\Contas\Controller\Pessoa\ListarPessoas;
use FBMS\Contas\Controller\Pessoa\ExclusaoPessoa;
use FBMS\Contas\Controller\Categoria\Persistencia;
use FBMS\Contas\Controller\Pessoa\PersistenciaPessoa;

use FBMS\Contas\Controller\Categoria\FormularioEdicao;
use FBMS\Contas\Controller\Categoria\ListarCategorias;
use FBMS\Contas\Controller\Categoria\FormularioInsercao;
use FBMS\Contas\Controller\Pessoa\FormularioEdicaoPessoa;
use FBMS\Contas\Controller\Pessoa\FormularioInsercaoPessoa;

return [
    '/listar-categorias' => ListarCategorias::class,
    '/nova-categoria' => FormularioInsercao::class,
    '/salvar-categoria' => Persistencia::class,
    '/excluir-categoria' => Exclusao::class,
    '/alterar-categoria' => FormularioEdicao::class,

    '/listar-pessoas' => ListarPessoas::class,
    '/nova-pessoa' => FormularioInsercaoPessoa::class,
    '/alterar-pessoa' => FormularioEdicaoPessoa::class,
    '/salvar-pessoa' => PersistenciaPessoa::class,
    '/excluir-pessoa' => ExclusaoPessoa::class
    
    
];