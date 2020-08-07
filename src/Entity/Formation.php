<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository", repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce message ne peut pas être vide.")
     */
    private $name = null;

    /**
     * @var string|null
     * @ORM\Column
     * @Assert\NotBlank(message="Ce message ne peut pas être vide.")
     */
    private $school = null;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Ce message ne peut pas être vide.")
     */
    private $gradeLevel = null;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Ce message ne peut pas être vide.")
     */
    private $description = null;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Assert\NotBlank(message="Ce message ne peut pas être vide.")
     */
    private $startedAt = null;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $endedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSchool(): ?string
    {
        return $this->school;
    }

    /**
     * @param string|null $school
     */
    public function setSchool(?string $school): void
    {
        $this->school = $school;
    }

    public function getGradeLevel(): ?int
    {
        return $this->gradeLevel;
    }

    public function setGradeLevel(int $gradeLevel): self
    {
        $this->gradeLevel = $gradeLevel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeInterface
    {
        return $this->endedAt;
    }

    public function setEndedAt(\DateTimeInterface $endedAt): self
    {
        $this->endedAt = $endedAt;

        return $this;
    }
}
