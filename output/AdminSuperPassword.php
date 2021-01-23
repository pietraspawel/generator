<?php

namespace pietras;

class AdminSuperPassword
{
    private $hash;
    private $created;

    public function __construct(array $array)
    {
        $this->hash = $array["hash"] ?? null;
        $this->created = $array["created"] ?? null;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setHash(string $value): self
    {
        $this->hash = $value;
        return $this;
    }

    public function setCreated(DateTime $value): self
    {
        $this->created = $value;
        return $this;
    }
}
