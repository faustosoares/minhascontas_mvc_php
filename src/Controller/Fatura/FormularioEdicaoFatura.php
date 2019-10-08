<?php

namespace FBMS\Contas\Controller\Fatura;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Cartao;
use FBMS\Contas\Entity\Fatura;

use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;

class FormularioEdicaoFatura implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    use FlashMessageTrait;
    
    private $repositorioFaturas;
    private $cartoes;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioFaturas = $entityManager->getRepository(Fatura::class);
        $this->cartoes = $entityManager->getRepository(Cartao::class)->findAll();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Caso id inválido
        $resposta = new Response(302, ['Location' => '/listar-faturas']);
        if (is_null($id) || $id === false) {
            $this->defineMenssagem('danger','ID de fatura inválido');
            return $resposta;
        }

        $fatura = $this->repositorioFaturas->find($id);

        $html = $this->renderizaHtml('faturas/formulario.php',[
            'fatura' => $fatura,
            'titulo' => 'Alterar fatura: ' . $fatura->getMes() . '/' . $fatura->getAno() . $fatura->getCartao()->getInstituicaoFinanceira(),
            'cartoes' => $this->cartoes,
            'cartaoAtual' => $fatura->getCartao()->getId()
        ]);

        return new Response(200, [], $html);

    }
}