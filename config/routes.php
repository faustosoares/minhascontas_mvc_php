<?php


use FBMS\Contas\Controller\Deslogar;
use FBMS\Contas\Controller\RealizarLogin;
use FBMS\Contas\Controller\FormularioLogin;
use FBMS\Contas\Controller\Categoria\Exclusao;
use FBMS\Contas\Controller\Fatura\ListarFatura;
use FBMS\Contas\Controller\Cartao\ListarCartoes;
use FBMS\Contas\Controller\Compra\ListarCompras;
use FBMS\Contas\Controller\Pessoa\ListarPessoas;
use FBMS\Contas\Controller\Cartao\ExclusaoCartao;
use FBMS\Contas\Controller\Compra\ExclusaoCompra;
use FBMS\Contas\Controller\Fatura\ExclusaoFatura;
use FBMS\Contas\Controller\Pessoa\ExclusaoPessoa;
use FBMS\Contas\Controller\Categoria\Persistencia;
use FBMS\Contas\Controller\Cartao\PersistenciaCartao;
use FBMS\Contas\Controller\Compra\PersistenciaCompra;
use FBMS\Contas\Controller\Fatura\PersistenciaFatura;
use FBMS\Contas\Controller\Pessoa\PersistenciaPessoa;
use FBMS\Contas\Controller\Categoria\FormularioEdicao;
use FBMS\Contas\Controller\Categoria\ListarCategorias;
use FBMS\Contas\Controller\Categoria\FormularioInsercao;
use FBMS\Contas\Controller\Cartao\FormularioEdicaoCartao;
use FBMS\Contas\Controller\Compra\FormularioEdicaoCompra;
use FBMS\Contas\Controller\Fatura\FormularioEdicaoFatura;
use FBMS\Contas\Controller\Pessoa\FormularioEdicaoPessoa;
use FBMS\Contas\Controller\Cartao\FormularioInsercaoCartao;
use FBMS\Contas\Controller\Compra\FormularioInsercaoCompra;
use FBMS\Contas\Controller\Fatura\FormularioInsercaoFatura;
use FBMS\Contas\Controller\Pessoa\FormularioInsercaoPessoa;
use FBMS\Contas\Controller\ComprasFatura\ListarComprasFatura;

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
    '/excluir-pessoa' => ExclusaoPessoa::class,

    '/listar-cartoes' => ListarCartoes::class,
    '/novo-cartao' => FormularioInsercaoCartao::class,
    '/salvar-cartao' => PersistenciaCartao::class,
    '/excluir-cartao' => ExclusaoCartao::class,
    '/alterar-cartao' => FormularioEdicaoCartao::class,

    '/listar-compras' => ListarCompras::class,
    '/nova-compra' => FormularioInsercaoCompra::class,
    '/salvar-compra' => PersistenciaCompra::class,
    '/alterar-compra' => FormularioEdicaoCompra::class,
    '/excluir-compra' => ExclusaoCompra::class,

    '/listar-faturas' => ListarFatura::class,
    '/nova-fatura' => FormularioInsercaoFatura::class,
    '/salvar-fatura' => PersistenciaFatura::class,
    '/excluir-fatura' => ExclusaoFatura::class,
    '/alterar-fatura' => FormularioEdicaoFatura::class,

    '/login' => FormularioLogin::class,
    '/realiza-login' => RealizarLogin::class,
    '/logout' => Deslogar::class,

    '/listar-faturas/listar-compras-fatura' => ListarComprasFatura::class
    
    
    
]; 