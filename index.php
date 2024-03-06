<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Member;
use App\Admin;
use App\Level;
use App\AuthenticationException;
use App\DbConnection;

//require_once __DIR__.'/Member.php';
//require_once __DIR__.'/Admin.php';

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

echo "\nExo 5\n";

try {
    $member = new Member('joseph', 'pass', 34);
    $member->auth('joseph', 'wrongPass');
} catch (AuthenticationException $e) {
    echo $e->getMessage();
}

echo "\nExo 5b\n";

$titi = 'Hello titi';
$myFunc = function(Member $member) use ($admin, $titi) {
    echo $member->getName();

    echo $admin->getName();
    echo $titi;
};
$myFunc($member);

echo "\nExo 5c\n";

$admin->sendNotifications(function() {
    echo "\n".'envoie aux ADMINS'."\n";

    return ['user1', 'user2'];
});
$admin->sendNotifications(function() {
    echo "\n".'envoie aux MODERATEURS'."\n";

    return ['user3', 'user4'];
});
$admin->sendNotifications(function() {
    echo "\n".'envoie aux UTILISATEURS'."\n";

    return ['user5', 'user6'];
});

echo "\nExo 5d\n";

//phpinfo();die;
var_dump(get_declared_traits());
var_dump(get_declared_interfaces());
var_dump(get_declared_classes());
var_dump(spl_classes());

//new Symfony_Component_File();

echo "\nExo 6\n";

$dbConnection = DbConnection::getInstance();
$dbConnection->query('Select * from User');
echo "DbConnection id: #".spl_object_id($dbConnection);
$dbConnection2 = DbConnection::getInstance();
$dbConnection2->query('Select * from Admin');
echo "DbConnection id: #".spl_object_id($dbConnection2);


/*
$dbConnection2 = new DbConnection();
$dbConnection2->query('Select * from User');
*/
