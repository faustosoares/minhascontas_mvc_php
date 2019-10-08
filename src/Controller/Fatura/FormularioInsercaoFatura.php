<?php

namespace FBMS\Contas\Controller\Fatura;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Cartao;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;

class FormularioInsercaoFatura implements RequestHandlerInterface
{

    use RenderizadorDeHtmlTrait;

    private $cartoes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->cartoes = $entityManager->getRepository(Cartao::class)->findAll();
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('faturas/formulario.php', [
            'titulo' => 'Nova fatura',
            'cartoes' => $this->cartoes
        ]);
        return new Response(200, [], $html);
    }
}