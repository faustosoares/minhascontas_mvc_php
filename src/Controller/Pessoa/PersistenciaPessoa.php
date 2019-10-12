<?php

namespace FBMS\Contas\Controller\Pessoa;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistenciaPessoa implements RequestHandlerInterface
{
    use FlashMessageTrait;

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function campoEstaValido(string $campo, string $nomeCampo): bool
    {         
        if (empty($campo)) {
            $this->defineMensagemValidacao('danger','Campo ' . $nomeCampo . ' deve ser preenchido');
            return false;
        }
        return true;
    }

    public function definirRota(int $id): string
    {
        if (!is_null($id) && $id !== false && $id !== 0) {
            return '/alterar-pessoa?id=' . $id;
        } else {
            return  '/nova-pessoa';
        }  
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $nome = filter_var(
            $request->getParsedBody()['nome'],
            FILTER_SANITIZE_STRING
        );

        $email = filter_var(
            $request->getParsedBody()['email'],
            FILTER_SANITIZE_STRING
        );

        $nomeUsuario = filter_var(
            $request->getParsedBody()['usuario'],
            FILTER_SANITIZE_STRING
        );

        $senhaUsuario = filter_var(
            $request->getParsedBody()['senha'],
            FILTER_SANITIZE_STRING
        );

        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setEmail($email);
        $pessoa->setNomeUsuario($nomeUsuario);
        //$pessoa->setSenhaUsuario($senhaUsuario);
        //$pessoa->setSenhaUsuario(password_hash($senhaUsuario,PASSWORD_ARGON2I));
        
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );
        
        if (!is_null($id) && $id !== false) {
            $pessoaExistente = $this->entityManager->find(Pessoa::class,$id);
            if ($pessoaExistente->getSenhaUsuario() == $senhaUsuario) {
                $pessoa->setSenhaUsuario($senhaUsuario);
            } else {
                $pessoa->setSenhaUsuario(password_hash($senhaUsuario,PASSWORD_ARGON2I));    
            }
        } else {
            $pessoa->setSenhaUsuario(password_hash($senhaUsuario,PASSWORD_ARGON2I));
        }

        //Validação Campos Formulário
        $rotaRedirecionamentoValidacao = $this->definirRota($id);
        
        if (!$this->campoEstaValido($nome, 'Nome')) {
            return new Response(302, ['Location' => $rotaRedirecionamentoValidacao]);
        };

        if (!$this->campoEstaValido($email, 'E-mail')) {
            return new Response(302, ['Location' => $rotaRedirecionamentoValidacao]);
        };

        if (!$this->campoEstaValido($nomeUsuario, 'Usuário')) {
            return new Response(302, ['Location' => $rotaRedirecionamentoValidacao]);
        };

        if (!$this->campoEstaValido($senhaUsuario, 'Senha')) {
            return new Response(302, ['Location' => $rotaRedirecionamentoValidacao]);
        };

        //Tipo mensagem do Trait (Mensagem execucao crud)
        $tipo = 'success';

        if (!is_null($id) && $id !== false) {
            $pessoa->setId($id);
            $this->entityManager->merge($pessoa);
            $this->defineMensagem($tipo, 'Pessoa atualizada com sucesso');
        } else {
            $this->entityManager->persist($pessoa);
            $this->defineMensagem($tipo, 'Pessoa inserida com sucesso');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-pessoas']);
    }


}