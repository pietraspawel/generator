<?php

namespace pietras;

class Mail
{
    public const NEW = "new";
    public const SENT = "sent";
    private $id;
    private $userId;
    private $userMail;
    private $title;
    private $content;
    private $sender;
    private $status;
    private $dateAdded;
    private $dateSended;

    public function __construct(array $array)
    {
        $this->id = $array["id"] ?? null;
        $this->userId = $array["user_id"] ?? null;
        $this->userMail = $array["user_mail"] ?? null;
        $this->title = $array["title"];
        $this->content = $array["content"];
        $this->sender = $array["sender"];
        $this->status = $array["status"] ?? self::NEW;
        $this->dateAdded = $array["date_added"] ?? null;
        $this->dateSended = $array["date_sended"] ?? null;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function getUserMail(): string
    {
        return $this->userMail;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDateAdded(): ?DateTime
    {
        return $this->dateAdded;
    }

    public function getDateSended(): ?DateTime
    {
        return $this->dateSended;
    }

    public function setId(int $value): self
    {
        $this->id = $value;
        return $this;
    }

    public function setUserId(?string $value): self
    {
        $this->userId = $value;
        return $this;
    }

    public function setUserMail(string $value): self
    {
        $this->userMail = $value;
        return $this;
    }

    public function setTitle(string $value): self
    {
        $this->title = $value;
        return $this;
    }

    public function setContent(string $value): self
    {
        $this->content = $value;
        return $this;
    }

    public function setSender(string $value): self
    {
        $this->sender = $value;
        return $this;
    }

    public function setStatus(string $value): self
    {
        $this->status = $value;
        return $this;
    }

    public function setDateAdded(?DateTime $value): self
    {
        $this->dateAdded = $value;
        return $this;
    }

    public function setDateSended(?DateTime $value): self
    {
        $this->dateSended = $value;
        return $this;
    }
}
