<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfRepository")
 */
class Prof
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
    private $nomProf;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[a-zA-Z]{3,}$/",
     * message="s'il vous plait Entrez un correct prénom..."
     * )
     */
    private $prenomProf;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[A-Za-z0-9._]{3,}@\w+\.(com|fr|da|ma|us)$/",
     * message=" s'il vous plait Entrez un e-mail correct ..."
     * )
     */
    private $emailProf;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[A-Z]{1,2}\d{6}$/",
     * message="s'il vous plait Entrez la forme correct du CIN..."
     * )
     */
    private $cinProf;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[+]212\s?6\s?\d{8}$/",
     * message="Votre numéro doit être sous le forme +212 6 ******** ou +2126********"
     * )
     */
    private $numTeleProf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseProf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numCarteBankProf;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[1-9]{2,}([.][1-9]{2,})?$/",
     * message="s'il vous plait Entrez un chiffre correct..."
     * )
     */
    private $salaireProf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profMatiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProf(): ?string
    {
        return $this->nomProf;
    }

    public function setNomProf(string $nomProf): self
    {
        $this->nomProf = $nomProf;

        return $this;
    }

    public function getPrenomProf(): ?string
    {
        return $this->prenomProf;
    }

    public function setPrenomProf(string $prenomProf): self
    {
        $this->prenomProf = $prenomProf;

        return $this;
    }

    public function getEmailProf(): ?string
    {
        return $this->emailProf;
    }

    public function setEmailProf(string $emailProf): self
    {
        $this->emailProf = $emailProf;

        return $this;
    }

    public function getCinProf(): ?string
    {
        return $this->cinProf;
    }

    public function setCinProf(string $cinProf): self
    {
        $this->cinProf = $cinProf;

        return $this;
    }

    public function getNumTeleProf(): ?string
    {
        return $this->numTeleProf;
    }

    public function setNumTeleProf(string $numTeleProf): self
    {
        $this->numTeleProf = $numTeleProf;

        return $this;
    }

    public function getAdresseProf(): ?string
    {
        return $this->adresseProf;
    }

    public function setAdresseProf(string $adresseProf): self
    {
        $this->adresseProf = $adresseProf;

        return $this;
    }

    public function getNumCarteBankProf(): ?string
    {
        return $this->numCarteBankProf;
    }

    public function setNumCarteBankProf(string $numCarteBankProf): self
    {
        $this->numCarteBankProf = $numCarteBankProf;

        return $this;
    }

    public function getSalaireProf(): ?string
    {
        return $this->salaireProf;
    }

    public function setSalaireProf(string $salaireProf): self
    {
        $this->salaireProf = $salaireProf;

        return $this;
    }

    public function getProfMatiere(): ?string
    {
        return $this->profMatiere;
    }

    public function setProfMatiere(string $profMatiere): self
    {
        $this->profMatiere = $profMatiere;

        return $this;
    }
}
