<?php
declare(strict_types=1);

/**
 * This class is an object based representation of a Service (Restaurant, visits ...)
 */
class ServiceModel {

    private int $id;
    private string $name;
    private string $schedule;
    private string $contact_info;
    private string $description;
    private $image;

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

    public function getSchedule(): string
    {
        return $this->schedule;
    }

    public function setSchedule(string $schedule): void
    {
        $this->schedule = $schedule;
    }

    public function getContactInfo(): string
    {
        return $this->contact_info;
    }

    public function setContactInfo(string $contact_info): void
    {
        $this->contact_info = $contact_info;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }





}
