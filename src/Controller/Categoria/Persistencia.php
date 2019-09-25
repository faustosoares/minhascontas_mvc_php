<?php

namespace FBMS\Contas\Controller\Categoria;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Categoria;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Persistencia implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $nome = filter_var(
            $request->getParsedBody()['nome'],
            FILTER_SANITIZE_STRING
        );

        $descricao = filter_var(
            $request->getParsedBody()['descricao'],
            FILTER_SANITIZE_STRING
        );

        $categoria = new Categoria();
        $categoria->setNome($nome);
        $categoria->setDescricao($descricao);
        
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Tipo mensagem do Trait
        $tipo = 'success';

        if (!is_null($id) && $id !== false) {
            $categoria->setId($id);
            $this->entityManager->merge($categoria);
            $this->defineMensagem($tipo, 'Categoria atualizada com sucesso');
        } else {
            $this->entityManager->persist($categoria);
            $this->defineMensagem($tipo, 'Categoria inserida com sucesso');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-categorias']);
    }


}