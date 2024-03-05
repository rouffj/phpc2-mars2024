<?php

abstract class UserAbstract
{
    public function __construct(private string $name)
    {
        echo self::class."::__construct() called \n";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }
}