<?php

namespace FBMS\Contas\Controller\Categoria;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Categoria;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;

class FormularioEdicao implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    use FlashMessageTrait;
    
    private $repositorioCategorias;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioCategorias = $entityManager->getRepository(Categoria::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Caso id inválido
        $resposta = new Response(302, ['Location' => '/listar-categorias']);
        if (is_null($id) || $id === false) {
            $this->defineMenssagem('danger','ID de categoria inválido');
            return $resposta;
        }

        $categoria = $this->repositorioCategorias->find($id);

        $html = $this->renderizaHtml('categorias/formulario.php',[
            'categoria' => $categoria,
            'titulo' => 'Alterar categoria' . $categoria->getNome()
        ]);

        return new Response(200, [], $html);

    }
}