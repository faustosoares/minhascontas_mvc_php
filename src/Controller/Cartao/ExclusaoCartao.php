<?php

namespace FBMS\Contas\Controller\Cartao;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Cartao;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExclusaoCartao implements RequestHandlerInterface
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

        $resposta = new Response(302, ['Location' => 'listar-cartoes']);

        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Cartão inexistente');
            return $resposta;
        }

        $cartao = $this->entityManager->getReference(
            Cartao::class,
            $id
        );

        $this->entityManager->remove($cartao);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Cartão excluído com sucesso');
        
        return $resposta;
    }
}