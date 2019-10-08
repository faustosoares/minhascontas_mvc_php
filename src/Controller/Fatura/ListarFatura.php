<?php

namespace FBMS\Contas\Controller\Fatura;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Fatura;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Collection;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;


class ListarFatura implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    
    private $repositorioDeFaturas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeFaturas = $entityManager
            ->getRepository(Fatura::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('faturas/listar-faturas.php', [
            'faturas' => $this->repositorioDeFaturas->findAll(),
            'titulo' => 'Lista de faturas',
            'tituloEntidade' => 'fatura',
            'rotaExclusao' => '/excluir-fatura?id='
        
        ]);

        return new Response(200, [], $html);
    }

}