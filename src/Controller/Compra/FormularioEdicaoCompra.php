<?php

namespace FBMS\Contas\Controller\Compra;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Cartao;
use FBMS\Contas\Entity\Compra;
use FBMS\Contas\Entity\Fatura;
use FBMS\Contas\Entity\Pessoa;

use FBMS\Contas\Entity\Categoria;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;

class FormularioEdicaoCompra implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    use FlashMessageTrait;
    
    private $repositorioCompras;
    private $pessoas;
    private $cartoes;
    private $categorias;
    private $faturas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioCompras = $entityManager->getRepository(Compra::class);
        $this->pessoas = $entityManager->getRepository(Pessoa::class)->findAll();
        $this->cartoes = $entityManager->getRepository(Cartao::class)->findAll();
        $this->categorias = $entityManager->getRepository(Categoria::class)->findAll();
        $this->faturas = $entityManager->getRepository(Fatura::class)->findAll();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Caso id inválido
        $resposta = new Response(302, ['Location' => '/listar-compras']);
        if (is_null($id) || $id === false) {
            $this->defineMenssagem('danger','ID de compra inválido');
            return $resposta;
        }

        $compra = $this->repositorioCompras->find($id);

        $html = $this->renderizaHtml('compras/formulario.php',[
            'compra' => $compra,
            'titulo' => 'Alterar compra: ' . $compra->getDescricao(),
            'pessoas' => $this->pessoas,
            'cartoes' => $this->cartoes,
            'categorias' => $this->categorias,
            'compradorAtual' => $compra->getPessoa()->getId(),
            'categoriaAtual' => $compra->getCategoria()->getId(),
            'cartaoAtual' => $compra->getCartao()->getId()

        ]);

        return new Response(200, [], $html);

    }
}