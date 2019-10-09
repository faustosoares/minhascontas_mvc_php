<?php

namespace FBMS\Contas\Entity;

use FBMS\Contas\Entity\Cartao;
use FBMS\Contas\Entity\Compra;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Fatura
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="integer")
     */
    private $mes;
    /**
     * @Column(type="integer")
     */
    private $ano;
    /**
     * @Column(type="integer")
     */
    private $diaFechamento;

    /**
     * @Column(type="integer")
     */
    private $diaVencimento;
        
    //private $total;

    /**
     * @ManyToOne(targetEntity="Cartao")
     * @JoinColumn(name="cartao_id", referencedColumnName="id")
     */
    private $cartao;

    /**
     * @ManyToMany(targetEntity="Compra", inversedBy="faturas")
     * @JoinTable(name="faturas_compras")
     */
    private $compras;

    public function __construct()
    {
        $this->compras = new ArrayCollection();
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getMes(): int
    {
        return $this->mes;
    }

    public function setMes(int $mes): self
    {
        $this->mes = $mes;

        return $this;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getDiaFechamento(): int
    {
        return $this->diaFechamento;
    }

    public function setDiaFechamento(int $diaFechamento): self
    {
        $this->diaFechamento = $diaFechamento;

        return $this;
    }

    public function getCartao(): Cartao
    {
        return $this->cartao;
    }

    public function setCartao(Cartao $cartao): self
    {
        $this->cartao = $cartao;

        return $this;
    }

    public function getDiaVencimento(): int
    {
        return $this->diaVencimento;
    }

    public function setDiaVencimento(int $diaVencimento): self
    {
        $this->diaVencimento = $diaVencimento;

        return $this;
    }

    public function getIdentificacao(): string
    {
        return $this->getMes() . '/' . $this->getAno() . '-' .
             $this->getCartao()->getBandeira() . ' (' . $this->getCartao()->getNomeTitular() . ')';
    }

    public function getCompras(): Collection
    {
        return $this->compras;
    }

    public function setCompras(Compra $compra): self
    {
        //$this->compras = $compras;

        $this->compras->add($compra);

        return $this;
    }
}