<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MoviesRepository")
 */
class Movies
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
    private $genre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poster;

    /**
     * @ORM\Column(type="date", name="relase_date")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $duration;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text", name="url_trailer")
     */
    private $urlTrailer;

    /**
     * @ORM\Column(type="string", name="week_number",  length=2)
     */
    private $weekNumber;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\genres", mappedBy="movies", cascade={"persist", "remove"})
     */
    private $genres_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\weeks", mappedBy="movies")
     */
    private $week_number_id;

    public function __construct()
    {
        $this->genres_id = new ArrayCollection();
        $this->week_number_id = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

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

    public function getUrlTrailer(): ?string
    {
        return $this->urlTrailer;
    }

    public function setUrlTrailer(string $urlTrailer): self
    {
        $this->urlTrailer = $urlTrailer;

        return $this;
    }

    public function getWeekNumber(): ?string
    {
        return $this->weekNumber;
    }

    public function setWeekNumber(string $weekNumber): self
    {
        $this->weekNumber = $weekNumber;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|genres[]
     */
    public function getGenresId(): Collection
    {
        return $this->genres_id;
    }

    public function addGenresId(genres $genresId): self
    {
        if (!$this->genres_id->contains($genresId)) {
            $this->genres_id[] = $genresId;
            $genresId->setMovies($this);
        }

        return $this;
    }

    public function removeGenresId(genres $genresId): self
    {
        if ($this->genres_id->contains($genresId)) {
            $this->genres_id->removeElement($genresId);
            // set the owning side to null (unless already changed)
            if ($genresId->getMovies() === $this) {
                $genresId->setMovies(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|weeks[]
     */
    public function getWeekNumberId(): Collection
    {
        return $this->week_number_id;
    }

    public function addWeekNumberId(weeks $weekNumberId): self
    {
        if (!$this->week_number_id->contains($weekNumberId)) {
            $this->week_number_id[] = $weekNumberId;
            $weekNumberId->setMovies($this);
        }

        return $this;
    }

    public function removeWeekNumberId(weeks $weekNumberId): self
    {
        if ($this->week_number_id->contains($weekNumberId)) {
            $this->week_number_id->removeElement($weekNumberId);
            // set the owning side to null (unless already changed)
            if ($weekNumberId->getMovies() === $this) {
                $weekNumberId->setMovies(null);
            }
        }

        return $this;
    }

}
