<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WeeksRepository")
 */
class Weeks
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $movies_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_week;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Movies", inversedBy="week_number_id")
     */
    private $movies;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMoviesId(): ?int
    {
        return $this->movies_id;
    }

    public function setMoviesId(int $movies_id): self
    {
        $this->movies_id = $movies_id;

        return $this;
    }

    public function getNumberWeek(): ?int
    {
        return $this->number_week;
    }

    public function setNumberWeek(int $number_week): self
    {
        $this->number_week = $number_week;

        return $this;
    }

    public function getMovies(): ?Movies
    {
        return $this->movies;
    }

    public function setMovies(?Movies $movies): self
    {
        $this->movies = $movies;

        return $this;
    }
}
