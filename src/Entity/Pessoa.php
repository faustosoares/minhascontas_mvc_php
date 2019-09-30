<?php

namespace FBMS\Contas\Entity;

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

    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getNomeUsuario(): string
    {
        return $this->nomeUsuario;
    }

    public function setNomeUsuario($nomeUsuario): self
    {
        $this->nomeUsuario = $nomeUsuario;

        return $this;
    }

    public function getSenhaUsuario(): string
    {
        return $this->senhaUsuario;
    }

    public function setSenhaUsuario($senhaUsuario): self
    {
        $this->senhaUsuario = $senhaUsuario;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }
}