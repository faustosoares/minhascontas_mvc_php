<?php

namespace FBMS\Contas\Controller;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarLogin implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositorioDePessoas;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDePessoas = $entityManager
            ->getRepository(Pessoa::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $nomeUsuario = filter_var(
            $request->getParsedBody()['nomeUsuario'],
            FILTER_SANITIZE_SPECIAL_CHARS
        );

        $redirecionamentoLogin = new Response(302, ['Location' => '/login']);
        if (is_null($nomeUsuario) || $nomeUsuario === false) {
            $this->defineMensagemValidacao(
                'danger',
                'O usuário digitado não é um usuário válido.'
            );

            return $redirecionamentoLogin;
        }

        $senhaUsuario = filter_input(
            INPUT_POST,
            'senhaUsuario',
            FILTER_SANITIZE_STRING
        );

        $pessoa = $this->repositorioDePessoas
            ->findOneBy(['nomeUsuario' => $nomeUsuario]);

        if (is_null($pessoa) || !$pessoa->senhaEstaCorreta($senhaUsuario)) {
            $this->defineMensagemValidacao('danger', 'Usuário ou senha inválidos');

            return $redirecionamentoLogin;
        }

        $_SESSION['logado'] = true;

        return new Response(302, ['Location' => '/listar-categorias']);
    }
}
