<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SecretaireRepository")
 */
class Secretaire
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
    private $sereNom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[a-zA-Z]{3,}$/",
     * message="s'il vous plait Entrez un correct prénom..."
     * )
     */
    private $secrPrenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[A-Za-z0-9._]{3,}@\w+\.(com|fr|da|ma|us)$/",
     * message=" s'il vous plait Entrez un e-mail correct ..."
     * )
     */
    private $emailSecr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresseSecr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[A-Z]{1,2}\d{6}$/",
     * message="s'il vous plait Entrez la forme correct du CIN..."
     * )
     */
    private $cinSecr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSereNom(): ?string
    {
        return $this->sereNom;
    }

    public function setSereNom(string $sereNom): self
    {
        $this->sereNom = $sereNom;

        return $this;
    }

    public function getSecrPrenom(): ?string
    {
        return $this->secrPrenom;
    }

    public function setSecrPrenom(string $secrPrenom): self
    {
        $this->secrPrenom = $secrPrenom;

        return $this;
    }

    public function getEmailSecr(): ?string
    {
        return $this->emailSecr;
    }

    public function setEmailSecr(string $emailSecr): self
    {
        $this->emailSecr = $emailSecr;

        return $this;
    }

    public function getAdresseSecr(): ?string
    {
        return $this->adresseSecr;
    }

    public function setAdresseSecr(string $adresseSecr): self
    {
        $this->adresseSecr = $adresseSecr;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getCinSecr(): ?string
    {
        return $this->cinSecr;
    }

    public function setCinSecr(string $cinSecr): self
    {
        $this->cinSecr = $cinSecr;

        return $this;
    }
}
