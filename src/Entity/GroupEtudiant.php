<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GroupEtudiantRepository")
 */
class GroupEtudiant
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
    private $idGroup;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idEtd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGroup(): ?string
    {
        return $this->idGroup;
    }

    public function setIdGroup(string $idGroup): self
    {
        $this->idGroup = $idGroup;

        return $this;
    }

    public function getIdEtd(): ?string
    {
        return $this->idEtd;
    }

    public function setIdEtd(string $idEtd): self
    {
        $this->idEtd = $idEtd;

        return $this;
    }
}
