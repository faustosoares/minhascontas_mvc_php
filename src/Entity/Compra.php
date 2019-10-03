<?php

namespace FBMS\Contas\Entity;

use DateTime;
use FBMS\Contas\Entity\Cartao;
use FBMS\Contas\Entity\Pessoa;
use FBMS\Contas\Entity\Categoria;

/**
 * @Entity
 */
class Compra
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
    private $descricao;
    /**
     * @Column(type="float")
     */
    private $valor;
    /**
     * @Column(type="integer")
     */
    private $numeroParcelas;
    /**
     * @Column(type="integer")
     */
    private $numeroParcelasEmFaturas;
    /**
     * @Column(type="date")
     */
    private $data;
    /**
     * @ManyToOne(targetEntity="Categoria")
     * @JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;
    /**
     * @ManyToOne(targetEntity="Cartao")
     * @JoinColumn(name="cartao_id", referencedColumnName="id")
     */
    private $cartao;
    /**
     * @ManyToOne(targetEntity="Pessoa")
     * @JoinColumn(name="pessoa_id", referencedColumnName="id")
     */
    private $pessoa;

    public function __construct()
    {
        $this->data = new DateTime();
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

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getNumeroParcelas(): int
    {
        return $this->numeroParcelas;
    }

    public function setNumeroParcelas(int $numeroParcelas)
    {
        $this->numeroParcelas = $numeroParcelas;

        return $this;
    }

    public function getNumeroParcelasEmFaturas(): int
    {
        return $this->numeroParcelasEmFaturas;
    }

    public function setNumeroParcelasEmFaturas(int $numeroParcelasEmFaturas): self
    {
        $this->numeroParcelasEmFaturas = $numeroParcelasEmFaturas;

        return $this;
    }

    public function getData(): string
    {
        return $this->data->format('d/m/Y');
    }

    public function getDataFormulario(): string
    {
        return $this->data->format('Y-m-d');
    }

    public function setData(DateTime $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria): self
    {
        $this->categoria = $categoria;

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

    public function getPessoa(): Pessoa
    {
        return $this->pessoa;
    }

    public function setPessoa(Pessoa $pessoa): self
    {
        $this->pessoa = $pessoa;

        return $this;
    }
}