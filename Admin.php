<?php

require_once __DIR__.'/Member.php';

enum Level
{
    case ADMIN;
    case SUPER_ADMIN; 
}

class Admin extends Member
{
    public const string VIEW_MODE = 'list';
    public static $nbInstances = 0;

    public function __construct(private string $login, private string $password, private string $age, private Level $level)
    {
        parent::__construct($login, $password, $age);

        self::$nbInstances++;
    }

    public function __destruct()
    {
        self::$nbInstances--;
    }

    public function auth(string $login, string $password): bool
    {
        if (Level::SUPER_ADMIN === $this->level) {
            return true;
        }

        return parent::auth($login, $password);
    }

    public function count(): int
    {
        return self::$nbInstances;
    }

    public static function countInstances(): int
    {
        return self::$nbInstances;
    }
}