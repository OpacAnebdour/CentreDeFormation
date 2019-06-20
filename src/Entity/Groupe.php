<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupeRepository")
 */
class Groupe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroGroupe;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbEtudiant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroGroupe(): ?string
    {
        return $this->numeroGroupe;
    }

    public function setNumeroGroupe(string $numeroGroupe): self
    {
        $this->numeroGroupe = $numeroGroupe;

        return $this;
    }

    public function getNbEtudiant(): ?int
    {
        return $this->nbEtudiant;
    }

    public function setNbEtudiant(int $nbEtudiant): self
    {
        $this->nbEtudiant = $nbEtudiant;

        return $this;
    }
}
