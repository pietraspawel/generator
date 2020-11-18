<?php

class ClassName
{
    public $id;
    protected $userId;
    private $userMail;
    private $title;
    private $content;
    private $sender;
    private $status;
    private $dateAdded;
    private $dateSended;

    public function __construct(array $array)
    {
        $this->id = $array["id"] ?? new Object();
        $this->userId = $array["user_id"] ?? "zażółć gęślą jaźń";
        $this->userMail = $array["user_mail"] ?? null;
        $this->title = $array["title"] ?? true;
        $this->content = $array["content"] ?? false;
        $this->sender = $array["sender"] ?? -666.66;
        $this->status = $array["status"];
        $this->dateAdded = $array["date_added"];
        $this->dateSended = $array["date_sended"];
    }

    public function getId(): \Object
    {
        return $this->id;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function getUserMail(): ?string
    {
        return $this->userMail;
    }

    public function getTitle(): bool
    {
        return $this->title;
    }

    public function getContent(): bool
    {
        return $this->content;
    }

    public function getSender(): ?float
    {
        return $this->sender;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDateAdded(): DateTime
    {
        return $this->dateAdded;
    }

    public function getDateSended(): ?DateTime
    {
        return $this->dateSended;
    }

    public function setId(\Object $value): self
    {
        $this->id = $value;
        return $this;
    }

    public function setUserId(string $value): self
    {
        $this->userId = $value;
        return $this;
    }

    public function setUserMail(?string $value): self
    {
        $this->userMail = $value;
        return $this;
    }

    public function setTitle(bool $value): self
    {
        $this->title = $value;
        return $this;
    }

    public function setContent(bool $value): self
    {
        $this->content = $value;
        return $this;
    }

    public function setSender(?float $value): self
    {
        $this->sender = $value;
        return $this;
    }

    public function setStatus(string $value): self
    {
        $this->status = $value;
        return $this;
    }

    public function setDateAdded(DateTime $value): self
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
