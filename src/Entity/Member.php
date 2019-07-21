<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 */

/**
 * @ORM\Entity
 * @Vich\Uploadable
 */

class Member
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $datenaiss;

     /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=10)
     */
    private $genre;

    /**
     * @Vich\UploadableField(mapping="member_image", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_familiale", type="string", length=50)
     */
    private $situationFamiliale;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $autrephone;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $structure;


    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $anneeAdhesion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;
    
    public function __construct()
    {
        $this->image = new EmbeddedFile();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAnneeAdhesion(): ?\DateTimeInterface
    {
        return $this->anneeAdhesion;
    }

    public function setAnneeAdhesion(?\DateTimeInterface $anneeAdhesion): self
    {
        $this->anneeAdhesion = $anneeAdhesion;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getSituationFamiliale(): ?string
    {
        return $this->situationFamiliale;
    }

    public function setSituationFamiliale(string $situationFamiliale): self
    {
        $this->situationFamiliale = $situationFamiliale;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|UploadedFile $imageFile
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    
        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

public function setUpdatedAt(\DateTime $datetime)
{
    $this->updatedAt = $datetime;

    return $this;
}

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
    
    public function setImageName(?string $image)
    {
        $this->imageName = $image;
    
        return $this;
    }

    public function getFullName()
    {
        return $this->getFirstName().' '.$this->getLastName();
    }

    public function getDatenaiss(): ?\DateTimeInterface
    {
        return $this->datenaiss;
    }

    public function setDatenaiss(?\DateTimeInterface $datenaiss): self
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    public function getStructure(): ?string
    {
        return $this->structure;
    }

    public function setStructure(string $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getAutrephone(): ?string
    {
        return $this->autrephone;
    }

    public function setAutrephone(?string $autrephone): self
    {
        $this->autrephone = $autrephone;

        return $this;
    }
}
