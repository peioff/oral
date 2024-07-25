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
    private int $image_id;
    private ImageModel $image;
    private int $score;

    public function getScore(): int
    {
        return $this->score;
    }

    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    public function getImage(): ImageModel
    {
        return $this->image;
    }

    public function setImage(ImageModel $image): void
    {
        $this->image = $image;
    }

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

    public function getImageId() : int
    {
        return $this->image_id;
    }

    public function setImageId($image_id): void
    {
        $this->image_id = $image_id;
    }
}