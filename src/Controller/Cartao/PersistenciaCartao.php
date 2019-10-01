<?php

namespace FBMS\Contas\Controller\Cartao;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Cartao;
use FBMS\Contas\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistenciaCartao implements RequestHandlerInterface
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
            return '/alterar-cartao?id=' . $id;
        } else {
            return '/novo-cartao';
        }  
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $bandeira = filter_var(
            $request->getParsedBody()['bandeira'],
            FILTER_SANITIZE_STRING
        );

        $instituicao = filter_var(
            $request->getParsedBody()['instituicao'],
            FILTER_SANITIZE_STRING
        );

        $vencimento = filter_var(
            $request->getParsedBody()['vencimento'],
            FILTER_SANITIZE_NUMBER_INT
        );

        $titular_id = filter_var(
            $request->getParsedBody()['titular'],
            FILTER_SANITIZE_NUMBER_INT
        );

        $cartao = new Cartao();
        $cartao->setBandeira($bandeira);
        $cartao->setInstituicaoFinanceira($instituicao);
        $cartao->setVencimento($vencimento);

        $titularCartao = new Pessoa();
        $titularCartao = $this->entityManager->find(Pessoa::class, $titular_id);
        //$titularCartao = $this->entityManager->getReference(Pessoa::class, $titular_id);

        $cartao->setTitular($titularCartao);
        
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Validação Campos Formulário
        $rotaRedirecionamentoValidacao = $this->definirRota($id);
        
        // if (!$this->campoEstaValido($nome, 'Nome')) {
        //     return new Response(302, ['Location' => $rotaRedirecionamentoValidacao]);
        // };

        // if (!$this->campoEstaValido($email, 'E-mail')) {
        //     return new Response(302, ['Location' => $rotaRedirecionamentoValidacao]);
        // };

        // if (!$this->campoEstaValido($nomeUsuario, 'Usuário')) {
        //     return new Response(302, ['Location' => $rotaRedirecionamentoValidacao]);
        // };

        // if (!$this->campoEstaValido($senhaUsuario, 'Senha')) {
        //     return new Response(302, ['Location' => $rotaRedirecionamentoValidacao]);
        // };

        //Tipo mensagem do Trait (Mensagem execucao crud)
        $tipo = 'success';

        if (!is_null($id) && $id !== false) {
            $cartao->setId($id);
            $this->entityManager->merge($cartao);
            $this->defineMensagem($tipo, 'Cartão atualizado com sucesso');
        } else {
            $this->entityManager->persist($cartao);
            $this->defineMensagem($tipo, 'Cartão inserido com sucesso');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-cartoes']);
    }


}