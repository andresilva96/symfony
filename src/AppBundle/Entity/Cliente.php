<?php

declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cliente")
 */
class Cliente
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nome;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome(): ?String
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): Cliente
    {
        $this->nome = $nome;
        return $this;
    }

    public function hidrator(array $data): void
    {
        $data['nome'] ? $this->setNome($data['nome']) : null;
    }
}