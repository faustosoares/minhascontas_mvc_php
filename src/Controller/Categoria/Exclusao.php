<?php

namespace FBMS\Contas\Controller\Categoria;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Categoria;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Exclusao implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $resposta = new Response(302, ['Location' => 'listar-categorias']);

        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Categoria inexistente');
            return $resposta;
        }

        $categoria = $this->entityManager->getReference(
            Categoria::class,
            $id
        );

        $this->entityManager->remove($categoria);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Categoria excluída com sucesso');
        
        return $resposta;
    }
}