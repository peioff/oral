<?php
declare(strict_types=1);


/**
 * This class is an object based representation of a Living (where animals live)
 */
class LivingModel
{
    private int $id;
    private string $name;
    private string $description;
    private array $animals;
    private $image;

    public function getAnimals(): array
    {
        return $this->animals;
    }

    public function setAnimals(array $animals): void
    {
        $this->animals = $animals;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }



}