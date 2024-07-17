<?php
declare(strict_types=1);

class FeedingModel {
    private int $feeding_id;
    private DateTime $feeding_date;
    private string $food;
    private int $quantity;
    private int $animal_id;
    public function getId(): int
    {
        return $this->feeding_id;
    }

    public function setId(int $feeding_id): void
    {
        $this->feeding_id = $feeding_id;
    }

    public function getDate(): DateTime
    {
        return $this->feeding_date;
    }

    public function setDate(DateTime $feeding_date): void
    {
        $this->feeding_date = $feeding_date;
    }

    public function getFood(): string
    {
        return $this->food;
    }

    public function setFood(string $food): void
    {
        $this->food = $food;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getAnimalId(): int
    {
        return $this->animal_id;
    }

    public function setAnimalId(int $animal_id): void
    {
        $this->animal_id = $animal_id;
    }

}

