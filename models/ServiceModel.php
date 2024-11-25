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
    public function getImageId() : int
    {
        return $this->image_id;
    }

    /**
     * @param mixed $image
     */
    public function setImageId($image_id): void
    {
        $this->image_id = $image_id;
    }





}
