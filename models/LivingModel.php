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
//    private array $animals;
    private int $image_id;
    private ImageModel $image;

    public function getImage(): ImageModel
    {
        return $this->image;
    }

    public function setImage(ImageModel $image): void
    {
        $this->image = $image;
    }



//    public function getAnimals(): array
//    {
//        return $this->animals;
//    }
//
//    public function setAnimals(array $animals): void
//    {
//        $this->animals = $animals;
//    }

    public function getImageId(): int
    {
        return $this->image_id;
    }

    public function setImageId($image_id): void
    {
        $this->image_id = $image_id;
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