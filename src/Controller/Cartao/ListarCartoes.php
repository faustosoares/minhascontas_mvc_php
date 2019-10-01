<?php

namespace FBMS\Contas\Controller\Cartao;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Cartao;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;


class ListarCartoes implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    
    private $repositorioDeCartoes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeCartoes = $entityManager
            ->getRepository(Cartao::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('cartoes/listar-cartoes.php', [
            'cartoes' => $this->repositorioDeCartoes->findAll(),
            'titulo' => 'Lista de cartões',
            'tituloEntidade' => 'cartao',
            'rotaExclusao' => '/excluir-cartao?id='
        
        ]);

        return new Response(200, [], $html);
    }

}