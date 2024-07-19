<?php
declare(strict_types=1);

class ContactModel {
    private int $id;
    private DateTime $date;
    private string $nickname;
    private string $title;
    private string $email;
    private string $content;
    private int $answered;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getDate(): DateTime
    {
        return $this->date;
    }
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
    public function getNickname(): string
    {
        return $this->nickname;
    }
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getContent(): string
    {
        return $this->content;
    }
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
    public function getAnswered(): int
    {
        return $this->answered;
    }
    public function setAnswered(int $answered): void
    {
        $this->answered = $answered;
    }



}
