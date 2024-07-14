<?php
declare(strict_types=1);

/**
 * This class is an object based representation of an Animal
 */
class AnimalModel {
    private int $id;
    private string $name;
    private string $species;
    private string $living;
    private  $image;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSpecies(): string
    {
        return $this->species;
    }

    public function setSpecies(string $species): void
    {
        $this->species = $species;
    }

    public function getLiving(): string
    {
        return $this->living;
    }

    public function setLiving(string $living): void
    {
        $this->living = $living;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }
}