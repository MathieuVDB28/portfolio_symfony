<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 */
class Media
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id = null;

    /**
     * @var UploadedFile|null
     * @Assert\Image
     */
    private $file = null;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path = null;

    /**
     * @var Reference|null
     * @ORM\ManyToOne(targetEntity="reference", inversedBy="medias")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $reference;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * @param UploadedFile|null $file
     */
    public function setFile(?UploadedFile $file): void
    {
        $this->file = $file;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return Reference|null
     */
    public function getReference(): ?Reference
    {
        return $this->reference;
    }

    /**
     * @param Reference|null $reference
     */
    public function setReference(?Reference $reference): void
    {
        $this->reference = $reference;
    }
}
