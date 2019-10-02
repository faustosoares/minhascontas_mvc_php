<?php

namespace FBMS\Contas\Controller\Compra;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Compra;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Collection;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;


class ListarCompras implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    
    private $repositorioDeCompras;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCompras = $entityManager
            ->getRepository(Compra::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('compras/listar-compras.php', [
            'compras' => $this->repositorioDeCompras->findAll(),
            'titulo' => 'Lista de compras',
            'tituloEntidade' => 'compra',
            'rotaExclusao' => '/excluir-compra?id='
        
        ]);

        return new Response(200, [], $html);
    }

}