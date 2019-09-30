<?php

namespace FBMS\Contas\Controller\Pessoa;

use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioInsercaoPessoa implements RequestHandlerInterface
{

    use RenderizadorDeHtmlTrait;
    
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('pessoas/formulario.php', [
            'titulo' => 'Nova pessoa'
        ]);
        return new Response(200, [], $html);
    }
}