<?php

namespace FBMS\Contas\Controller\Categoria;

use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercao implements RequestHandlerInterface
{

    use RenderizadorDeHtmlTrait;
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('categorias/formulario.php', [
            'titulo' => 'Nova categoria'
        ]);
        return new Response(200, [], $html);
    }
}