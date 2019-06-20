<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EtudiantsRepository")
 */
class Etudiants
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[a-zA-Z]{3,}$/",
     * message="s'il vous plait Entrez un correct nom..."
     * )
     */
    private $nomEtudiant;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[a-zA-Z]{3,}$/",
     * message="s'il vous plait Entrez un correct prénom..."
     * )
     */
    private $prenomEtudiant;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissanceEtudiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieuNaissanceEtudiant;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[A-Z]{1,2}\d{6}$/",
     * message="s'il vous plait Entrez la forme correct du CIN..."
     * )
     */
    private $cinEtudiant;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[+]212\s?6\s?\d{8}$/",
     * message="Votre numéro doit être sous le forme +212 6 ******** ou +2126********"
     * )
     */
    private $numTeleEtudiant;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[+]212\s?6\s?\d{8}$/",
     * message="Votre numéro doit être sous le forme +212 6 ******** ou +2126********"
     * )
     */
    private $numTeleParent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseEtudiant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveauEtudiant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtudiant(): ?string
    {
        return $this->nomEtudiant;
    }

    public function setNomEtudiant(string $nomEtudiant): self
    {
        $this->nomEtudiant = $nomEtudiant;

        return $this;
    }

    public function getPrenomEtudiant(): ?string
    {
        return $this->prenomEtudiant;
    }

    public function setPrenomEtudiant(string $prenomEtudiant): self
    {
        $this->prenomEtudiant = $prenomEtudiant;

        return $this;
    }

    public function getDateNaissanceEtudiant(): ?\DateTimeInterface
    {
        return $this->dateNaissanceEtudiant;
    }

    public function setDateNaissanceEtudiant(\DateTimeInterface $dateNaissanceEtudiant): self
    {
        $this->dateNaissanceEtudiant = $dateNaissanceEtudiant;

        return $this;
    }

    public function getLieuNaissanceEtudiant(): ?string
    {
        return $this->lieuNaissanceEtudiant;
    }

    public function setLieuNaissanceEtudiant(string $lieuNaissanceEtudiant): self
    {
        $this->lieuNaissanceEtudiant = $lieuNaissanceEtudiant;

        return $this;
    }

    public function getCinEtudiant(): ?string
    {
        return $this->cinEtudiant;
    }

    public function setCinEtudiant(string $cinEtudiant): self
    {
        $this->cinEtudiant = $cinEtudiant;

        return $this;
    }

    public function getNumTeleEtudiant(): ?string
    {
        return $this->numTeleEtudiant;
    }

    public function setNumTeleEtudiant(string $numTeleEtudiant): self
    {
        $this->numTeleEtudiant = $numTeleEtudiant;

        return $this;
    }

    public function getNumTeleParent(): ?string
    {
        return $this->numTeleParent;
    }

    public function setNumTeleParent(string $numTeleParent): self
    {
        $this->numTeleParent = $numTeleParent;

        return $this;
    }

    public function getAdresseEtudiant(): ?string
    {
        return $this->adresseEtudiant;
    }

    public function setAdresseEtudiant(string $adresseEtudiant): self
    {
        $this->adresseEtudiant = $adresseEtudiant;

        return $this;
    }

    public function getNiveauEtudiant(): ?string
    {
        return $this->niveauEtudiant;
    }

    public function setNiveauEtudiant(string $niveauEtudiant): self
    {
        $this->niveauEtudiant = $niveauEtudiant;

        return $this;
    }
}
