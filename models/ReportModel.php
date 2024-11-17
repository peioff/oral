<?php
declare(strict_types=1);

class ReportModel {
    private int $reportId;
    private DateTime $date;
    private string $health;
    private string $food;
    private int $foodQuantity;
    private DateTime $feedingDate;
    private string $remark;
    private int $animalId;

    /**
     * @param int $reportId
     * @param DateTime $date
     * @param string $health
     * @param string $food
     * @param int $foodQuantity
     * @param DateTime $feedingDate
     * @param string $remark
     * @param int $animalId
     */
    public function __construct(int $reportId, DateTime $date, string $health, string $food, int $foodQuantity, DateTime $feedingDate, string $remark, int $animalId)
    {
        $this->reportId = $reportId;
        $this->date = $date;
        $this->health = $health;
        $this->food = $food;
        $this->foodQuantity = $foodQuantity;
        $this->feedingDate = $feedingDate;
        $this->remark = $remark;
        $this->animalId = $animalId;
    }

    public function getId(): int
    {
        return $this->reportId;
    }

    public function setId(int $reportId): void
    {
        $this->reportId = $reportId;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function getHealth(): string
    {
        return $this->health;
    }

    public function setHealth(string $health): void
    {
        $this->health = $health;
    }

    public function getFood(): string
    {
        return $this->food;
    }

    public function setFood(string $food): void
    {
        $this->food = $food;
    }

    public function getFoodQuantity(): int
    {
        return $this->foodQuantity;
    }

    public function setFoodQuantity(int $foodQuantity): void
    {
        $this->foodQuantity = $foodQuantity;
    }

    public function getFeedingDate(): DateTime
    {
        return $this->feedingDate;
    }

    public function setFeedingDate(DateTime $feedingDate): void
    {
        $this->feedingDate = $feedingDate;
    }

    public function getRemark(): string
    {
        return $this->remark;
    }

    public function setRemark(string $remark): void
    {
        $this->remark = $remark;
    }

    public function getAnimalId(): int
    {
        return $this->animalId;
    }

    public function setAnimalId(int $animalId): void
    {
        $this->animalId = $animalId;
    }
}
