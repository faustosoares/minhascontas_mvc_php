<?php

namespace FBMS\Contas\Controller\Fatura;

use DateTime;
use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Cartao;

use FBMS\Contas\Entity\Fatura;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistenciaFatura implements RequestHandlerInterface
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
            return '/alterar-fatura?id=' . $id;
        } else {
            return  '/nova-fatura';
        }  
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $mes = filter_var(
            $request->getParsedBody()['mes'],
            FILTER_VALIDATE_INT
        );

        $ano = filter_var(
            $request->getParsedBody()['ano'],
            FILTER_VALIDATE_INT
        );

        $diaFechamento = filter_var(
            $request->getParsedBody()['diaFechamento'],
            FILTER_VALIDATE_INT
        );

        $diaVencimento = filter_var(
            $request->getParsedBody()['diaVencimento'],
            FILTER_VALIDATE_INT
        );

        $cartao_id = filter_var(
            $request->getParsedBody()['cartao'],
            FILTER_VALIDATE_INT
        );

        //Dados básicos da compra
        $fatura = new Fatura();
        $fatura->setMes($mes);
        $fatura->setAno($ano);
        $fatura->setDiavencimento($diaVencimento);
        $fatura->setDiaFechamento($diaFechamento);

        //Cartão da compra
        $cartaoFatura = new Cartao();
        $cartaoFatura = $this->entityManager->find(Cartao::class, $cartao_id);
        $fatura->setCartao($cartaoFatura);

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Validação Campos Formulário
        $rotaRedirecionamentoValidacao = $this->definirRota($id);

        
        //Tipo mensagem do Trait (Mensagem execucao crud)
        $tipo = 'success';

        if (!is_null($id) && $id !== false) {
            $fatura->setId($id);
            $this->entityManager->merge($fatura);
            $this->defineMensagem($tipo, 'Fatura atualizada com sucesso');
        } else {
            $this->entityManager->persist($fatura);
            $this->defineMensagem($tipo, 'Fatura inserida com sucesso');
        }

        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-faturas']);
    }


}