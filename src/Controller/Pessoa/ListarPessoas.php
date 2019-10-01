<?php

namespace FBMS\Contas\Controller\Pessoa;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Collection;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;


class ListarPessoas implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    
    private $repositorioDePessoas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDePessoas = $entityManager
            ->getRepository(Pessoa::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizaHtml('pessoas/listar-pessoas.php', [
            'pessoas' => $this->repositorioDePessoas->findAll(),
            'titulo' => 'Lista de pessoas',
            'tituloEntidade' => 'pessoa',
            'rotaExclusao' => '/excluir-pessoa?id='
        
        ]);

        return new Response(200, [], $html);
    }

}