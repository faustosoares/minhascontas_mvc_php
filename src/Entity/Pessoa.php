<?php

namespace FBMS\Contas\Entity;

use FBMS\Contas\Entity\Cartao;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Pessoa
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
    private $nome;
    /**
     * @Column(type="string")
     */
    private $nomeUsuario;
    /**
     * @Column(type="string")
     */
    private $senhaUsuario;
    /**
     * @Column(type="string")
     */
    private $email;
    /**
     * @OneToMany(targetEntity="Cartao", mappedBy="titular")
     */    
    private $cartoes;

    public function __construct()
    {
        $this->cartoes = new ArrayCollection();
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getNomeUsuario(): string
    {
        return $this->nomeUsuario;
    }

    public function setNomeUsuario(string $nomeUsuario): self
    {
        $this->nomeUsuario = $nomeUsuario;

        return $this;
    }

    public function getSenhaUsuario(): string
    {
        return $this->senhaUsuario;
    }

    public function setSenhaUsuario(string $senhaUsuario): self
    {
        $this->senhaUsuario = $senhaUsuario;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCartoes(): Collection
    {
        return $this->cartoes;
    }

    public function addCartao(Cartao $cartoes): self
    {
        if ($this->cartoes->contains($cartao)) {
            return $this;
        }

        $this->cartoes->add($cartao);
       
        return $this;
    }
}