<?php

namespace FBMS\Contas\Controller\Compra;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Cartao;
use FBMS\Contas\Entity\Pessoa;
use FBMS\Contas\Entity\Categoria;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;

class FormularioInsercaoCompra implements RequestHandlerInterface
{

    use RenderizadorDeHtmlTrait;

    private $pessoas;
    private $cartoes;
    private $categorias;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->pessoas = $entityManager->getRepository(Pessoa::class)->findAll();
        $this->cartoes = $entityManager->getRepository(Cartao::class)->findAll();
        $this->categorias = $entityManager->getRepository(Categoria::class)->findAll();
    }
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('compras/formulario.php', [
            'titulo' => 'Nova compra',
            'pessoas' => $this->pessoas,
            'cartoes' => $this->cartoes,
            'categorias' => $this->categorias
        ]);
        return new Response(200, [], $html);
    }
}