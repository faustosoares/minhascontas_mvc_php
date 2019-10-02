<?php

namespace FBMS\Contas\Controller\Pessoa;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;

class FormularioEdicaoPessoa implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    use FlashMessageTrait;
    
    private $repositorioPessoas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioPessoas = $entityManager->getRepository(Pessoa::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Caso id inválido
        $resposta = new Response(302, ['Location' => '/listar-pessoas']);
        if (is_null($id) || $id === false) {
            $this->defineMenssagem('danger','ID de pessoa inválido');
            return $resposta;
        }

        $pessoa = $this->repositorioPessoas->find($id);

        $html = $this->renderizaHtml('pessoas/formulario.php',[
            'pessoa' => $pessoa,
            'titulo' => 'Alterar pessoa: ' . $pessoa->getNome()
        ]);

        return new Response(200, [], $html);

    }
}