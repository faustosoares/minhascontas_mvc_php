<?php

namespace FBMS\Contas\Controller\Compra;

use DateTime;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Cartao;
use FBMS\Contas\Entity\Compra;
use FBMS\Contas\Entity\Fatura;
use FBMS\Contas\Entity\Pessoa;
use FBMS\Contas\Entity\Categoria;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use FBMS\Contas\Helper\FlashMessageTrait;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistenciaCompra implements RequestHandlerInterface
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
            return '/alterar-compra?id=' . $id;
        } else {
            return  '/nova-compra';
        }  
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $descricao = filter_var(
            $request->getParsedBody()['descricao'],
            FILTER_SANITIZE_STRING
        );

        $valor = filter_var(
            $request->getParsedBody()['valor'],
            FILTER_SANITIZE_STRING
        );

        $numeroParcelas = filter_var(
            $request->getParsedBody()['numeroParcelas'],
            FILTER_VALIDATE_INT
        );

        $data = filter_var(
            $request->getParsedBody()['data'],
            FILTER_SANITIZE_STRING
        );

        $comprador_id = filter_var(
            $request->getParsedBody()['comprador'],
            FILTER_VALIDATE_INT
        );

        $cartao_id = filter_var(
            $request->getParsedBody()['cartao'],
            FILTER_VALIDATE_INT
        );

        $categoria_id = filter_var(
            $request->getParsedBody()['categoria'],
            FILTER_VALIDATE_INT
        );

        $fatura_id = filter_var(
            $request->getParsedBody()['fatura'],
            FILTER_VALIDATE_INT
        );

        //Tratando valor vindo do formulario
        $valorSemPonto = str_replace('.','',$valor);
        $valorEmFloat = floatval(str_replace(',','.',$valorSemPonto));

        //Dados básicos da compra
        $compra = new Compra();
        $compra->setDescricao($descricao);
        $compra->setValor($valorEmFloat);
        $compra->setNumeroParcelas($numeroParcelas);
        $compra->setNumeroParcelasEmFaturas(0); //default por enquanto

        //Data da compra
        $partesData = explode("-", $data);
        $ano = $partesData[0];
        $mes = $partesData[1];
        $dia = $partesData[2];
        $dataCompra = new DateTime($data);
        $compra->setData($dataCompra);

        //Comprador
        $pessoaCompra = new Pessoa();
        $pessoaCompra = $this->entityManager->find(Pessoa::class, $comprador_id);
        $compra->setPessoa($pessoaCompra);

        //Cartão da compra
        $cartaoCompra = new Cartao();
        $cartaoCompra = $this->entityManager->find(Cartao::class, $cartao_id);
        $compra->setCartao($cartaoCompra);

        //Categoria da compra
        $categoriaCompra = new Categoria();
        $categoriaCompra = $this->entityManager->find(Categoria::class, $categoria_id);
        $compra->setCategoria($categoriaCompra);
        
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Validação Campos Formulário
        $rotaRedirecionamentoValidacao = $this->definirRota($id);
        
        
        //Tipo mensagem do Trait (Mensagem execucao crud)
        $tipo = 'success';

        if (!is_null($id) && $id !== false) {
            $compra->setId($id);
            $this->entityManager->merge($compra);
            $this->defineMensagem($tipo, 'Compra atualizada com sucesso');
        } else {
            $this->entityManager->persist($compra);
            $this->defineMensagem($tipo, 'Compra inserida com sucesso');
        }

        //Persistindo compra na fatura selecionada
        $faturaCompra = $this->entityManager->find(Fatura::class, $fatura_id);
        $faturaCompra->setCompras($compra);
        $this->entityManager->merge($faturaCompra);
        
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/listar-compras']);
    }


}