<?php

namespace FBMS\Contas\Controller\ComprasFatura;

use Nyholm\Psr7\Response;
use FBMS\Contas\Entity\Compra;
use FBMS\Contas\Entity\Fatura;
use Doctrine\DBAL\Logging\DebugStack;
use Psr\Http\Message\ResponseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\Collection;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FBMS\Contas\Helper\RenderizadorDeHtmlTrait;


class ListarComprasFatura implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;
    
    private $repositorioDeFaturas;
    private $em;
    private $comprasDaFatura;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositorioDeFaturas = $entityManager
            ->getRepository(Fatura::class);

        $this->em = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $idFatura = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $dql = 'SELECT f FROM FBMS\\Contas\\Entity\\Fatura f WHERE f.id = :id';
        $query = $this->em->createQuery($dql);
        $query->setParameter('id',$idFatura);
        $fatura = $query->getResult();

        $this->comprasDaFatura = $fatura[0]->getCompras();

        foreach ($this->comprasDaFatura as $c) {
            echo $c->getDescricao();
        }

        //ATE ESTE PONTO ESTA TRAZENDO AS COMPRAS DESTA FATURA CORRETAMENTE


        $html = $this->renderizaHtml('comprasFatura/listar-compras-fatura.php', [
            'faturas' => $this->repositorioDeFaturas->findAll(),
            'titulo' => 'Lista de Compras na Fatura',
            'tituloEntidade' => 'comprasFatura',
            'comprasDaFatura' => $this->comprasDaFatura
        
        ]);

        return new Response(200, [], $html);
    }

}