<?php

namespace FBMS\Contas\Controller\Cartao;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;

class FormularioInsercaoCartao implements RequestHandlerInterface
{

    use RenderizadorDeHtmlTrait;

    private $pessoas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->pessoas = $entityManager->getRepository(Pessoa::class)->findAll();
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('cartoes/formulario.php', [
            'titulo' => 'Novo cartão',
            'pessoas' => $this->pessoas
            
        ]);
        return new Response(200, [], $html);
    }
}