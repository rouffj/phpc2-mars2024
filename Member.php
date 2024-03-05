<?php

require_once __DIR__.'/AuthInterface.php';
require_once __DIR__.'/UserAbstract.php';
require_once __DIR__.'/DatetimeTrait.php';

class Member extends UserAbstract implements AuthInterface
{
    use DatetimeTrait;

    public function __construct(private string $login, private string $password, private string $age)
    {
        $this->createdAt = new \DateTime();
        
        parent::__construct('Joseph');
    }

    public function auth(string $login, string $password): bool
    //public function auth(string $login, string $password, OutlookMailer $outlookMailer): bool
    //public function auth(string $login, string $password, MailerInterface $mailer): bool
    {
        //$outlookManager->sendEmail();
        return $this->login === $login && $this->password === $password;
    }

    public function __toString()
    {
        return parent::getName(). '|login: '.$this->login.'|age: '.$this->age;
    }
}