<?php

namespace FBMS\Contas\Controller\Pessoa;

use Nyholm\Psr7\Response;

use FBMS\Contas\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ExclusaoPessoa implements RequestHandlerInterface
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

        $resposta = new Response(302, ['Location' => 'listar-pessoas']);

        if (is_null($id) || $id === false) {
            $this->defineMensagem('danger', 'Pessoa inexistente');
            return $resposta;
        }

        $pessoa = $this->entityManager->getReference(
            Pessoa::class,
            $id
        );

        $this->entityManager->remove($pessoa);
        $this->entityManager->flush();
        $this->defineMensagem('success', 'Pessoa excluída com sucesso');
        
        return $resposta;
    }
}