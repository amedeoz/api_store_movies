<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("movies")
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("movies")
     */
    private $poster;

    /**
     * @ORM\Column(type="date", name="release_date", nullable=true)
     * @Groups("movies")
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Groups("movies")
     */
    private $duration;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups("movies")
     */
    private $description;

    /**
     * @ORM\Column(type="text", name="url_trailer", nullable=true)
     * @Groups("movies")
     */
    private $urlTrailer;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("movies")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups("movies")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Genres", mappedBy="movies", cascade={"persist", "remove"})
     */
    private $genres_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Weeks", mappedBy="movies")
     */
    private $weeks_id;

    public function __construct()
    {
        $this->genres_id = new ArrayCollection();
        $this->weeks_id = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
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
    public function getWeeksId(): Collection
    {
        return $this->weeks_id;
    }

    public function addWeeksId(weeks $weeksId): self
    {
        if (!$this->weeks_id->contains($weeksId)) {
            $this->weeks_id[] = $weeksId;
            $weeksId->setMovies($this);
        }

        return $this;
    }

    public function removeWeeksId(weeks $weeksId): self
    {
        if ($this->weeks_id->contains($weeksId)) {
            $this->weeks_id->removeElement($weeksId);
            // set the owning side to null (unless already changed)
            if ($weeksId->getMovies() === $this) {
                $weeksId->setMovies(null);
            }
        }

        return $this;
    }

}
