<?php

namespace FBMS\Contas\Controller\Cartao;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Cartao;
use FBMS\Contas\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;

class FormularioEdicaoCartao implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    use FlashMessageTrait;
    
    private $repositorioCartoes;
    private $pessoas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioCartoes = $entityManager->getRepository(Cartao::class);
        $this->pessoas = $entityManager->getRepository(Pessoa::class)->findAll();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Caso id inválido
        $resposta = new Response(302, ['Location' => '/listar-cartoes']);
        if (is_null($id) || $id === false) {
            $this->defineMenssagem('danger','ID de cartão inválido');
            return $resposta;
        }

        $cartao = $this->repositorioCartoes->find($id);

        $html = $this->renderizaHtml('cartoes/formulario.php',[
            'cartao' => $cartao,
            'titulo' => 'Alterar cartao: ' . $cartao->getBandeira() . ' - ' . $cartao->getTitular()->getNome(),
            'pessoas' => $this->pessoas,
            'titularAtual' => $cartao->getTitular()->getId()
        ]);

        return new Response(200, [], $html);

    }
}