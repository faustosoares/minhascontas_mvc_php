<?php

namespace FBMS\Contas\Entity;

use FBMS\Contas\Entity\Pessoa;

/**
 * @Entity
 */
class Cartao
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    
    /**
     * @Column(type="string")
     */
    private $bandeira;

    /**
     * @Column(type="string")
     */
    private $instituicaoFinanceira;

    /**
     * @Column(type="string")
     */
    private $vencimento;

    /**
     * @ManyToOne(targetEntity="Pessoa", inversedBy="cartoes")   
     * @JoinColumn(name="titular_id", referencedColumnName="id")
     */
    private $titular;
  
    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getBandeira(): string
    {
        return $this->bandeira;
    }

   
    public function setBandeira(string $bandeira): self
    {
        $this->bandeira = $bandeira;

        return $this;
    }

    public function getInstituicaoFinanceira(): string
    {
        return $this->instituicaoFinanceira;
    }

    public function setInstituicaoFinanceira(string $instituicaoFinanceira): self
    {
        $this->instituicaoFinanceira = $instituicaoFinanceira;

        return $this;
    }

    public function getVencimento(): int
    {
        return $this->vencimento;
    }

    public function setVencimento(int $vencimento): self
    {
        $this->vencimento = $vencimento;

        return $this;
    }

    public function getTitular(): Pessoa
    {
        return $this->titular;
    }

    public function setTitular(Pessoa $titular): self
    {
        $this->titular = $titular;

        return $this;
    }

    public function getNomeTitular(): string
    {
        return $this->getTitular()->getNome();
    }
}
