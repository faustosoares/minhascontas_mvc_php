<?php

namespace FBMS\Contas\Controller\Fatura;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Fatura;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExclusaoFatura implements RequestHandlerInterface
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

        $resposta = new Response(302, ['Location' => 'listar-faturas']);

        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Fatura inexistente');
            return $resposta;
        }

        $fatura = $this->entityManager->getReference(
            Fatura::class,
            $id
        );

        $this->entityManager->remove($fatura);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Fatura excluída com sucesso');
        
        return $resposta;
    }
}