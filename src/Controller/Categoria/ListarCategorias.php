<?php

namespace FBMS\Contas\Controller\Categoria;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Categoria;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;


class ListarCategorias implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    
    private $repositorioDeCategorias;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCategorias = $entityManager
            ->getRepository(Categoria::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('categorias/listar-categorias.php', [
            'categorias' => $this->repositorioDeCategorias->findAll(),
            'titulo' => 'Lista de categorias',
            'tituloEntidade' => 'categoria'
        ]);

        return new Response(200, [], $html);
    }

}