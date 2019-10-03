<?php

namespace FBMS\Contas\Controller\Compra;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Compra;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExclusaoCompra implements RequestHandlerInterface
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

        $resposta = new Response(302, ['Location' => 'listar-compras']);

        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Compra inexistente');
            return $resposta;
        }

        $compra = $this->entityManager->getReference(
            Compra::class,
            $id
        );

        $this->entityManager->remove($compra);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Compra excluída com sucesso');
        
        return $resposta;
    }
}