<?php

namespace App;

interface AuthInterface
{
    public function auth(string $login, string $password): bool;

    //public function getName(): string;
}