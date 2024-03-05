<?php

//require_once __DIR__.'/Member.php';
require_once __DIR__.'/Admin.php';

echo "\nExo 1\n";
$member = new Member('joseph', 'pass', 34);
var_dump($member);
var_dump($member->auth('joseph', 'pass'));

echo "\nExo 2\n";
$admin = new Admin('joseph', 'pass', 34, Level::SUPER_ADMIN);
echo Admin::VIEW_MODE;

var_dump($admin->auth('jo', 'wrongpass'));

echo "\nExo 3\n";
$admin2 = new Admin('admin2', 'pass', 34, Level::SUPER_ADMIN);
echo $admin->count();
unset($admin2);
echo Admin::countInstances();

echo "\nExo 3b\n";

class UserRegistration
{
    public function __invoke()
    {
        echo 'Salut la formation';
    }
}

$userRegistration = new UserRegistration();
$userRegistration();

echo "\nExo 4\n";

echo $admin."\n";
echo $member;