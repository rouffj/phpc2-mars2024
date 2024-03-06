<?php

class BankAccount
{
    public function __construct(private float $amountAvailable = 100.0)
    {

    }

/*
    //private float $amountAvailable = 0.0;
    private float $amountAvailable;

    public function __construct($amountAvailable)
    {
        $this->amountAvailable = $amountAvailable;
    }
*/

    public function withdraw($amount)
    {
        $this->amountAvailable = $this->amountAvailable - $amount;
    }

    public function deposit($amount)
    {
        $this->amountAvailable = $this->amountAvailable + $amount;
    }
}

$account = new BankAccount(100.00);
$account->deposit(10.0);
var_dump($account);

class Article
{
    private $title;
}

//$articleData = ['title' => 'Mon article'];
//$article = (Article) $articleData;
//var_dump($article);die;

class Category
{
    private $label;
}

class Author
{
    private $firstName;
}


//---

class Human
{
    private Arm $leftArm;
    private ?Arm $rightArmB;
    private Arm|null $rightArm;
    private $rightFoot;
    private $leftFoot;

    public function setLeftArm(Arm $arm)
    {
        $this->leftArm = $arm;
    }
}

class Arm
{
    private $position;

    /**
     * $position (up, down)
     */ 
    public function setPosition($position)
    {
        $this->position = $position;
    }
}

class Person
{
    private $firstName;
    private $lastName;
}

class User extends Person
{
    // respecte l'encapsulation
    private $email;

    // Ne respecte pas l'encapsulation
    public $password;

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($newEmail)
    {
        // Verifier si email est valide, pas d'espace...
        $newEmail = trim($newEmail);
        $this->email = $newEmail;
    }
}

$user1 = new User();
$user1->setEmail('joseph@test.fr');

$user2 = new User();
$user2->setEmail('yannick@test.fr');

var_dump($user1, $user2);
var_dump(spl_object_id($user1), spl_object_id($user2));

$human1 = new Human();

$arm = new Arm();
$arm->setPosition('up');

$human1->setLeftArm($arm);
$human1->setLeftArm($arm);
var_dump($human1);

try {
    $human1->setLeftArm('up');
} catch(\Exception $e) {

} catch(\Error $e) {
    var_dump($e);
}
//$human1->setRightArm($rightArm);

//---
/*
// One-To-One
$image = $user->getImage();
$image->getPath();
$image->getDescription();

// One-To-Many
$product->getCategory();
$category->getProducts();

// Many-To-Many
$article->getTags() // politique, economie
$tag->getArticles() // article1, article2...
*/

//----

interface MailerInterface
{
    public function send($tos, $from, $message);
}

class OutlookMailer implements MailerInterface
{
}

class GmailMailer implements MailerInterface
{
}

class YahooMailer implements MailerInterface
{
}

class OneEmailApp
{
    public function main(OutlookMailer $outlookMailer, GmailMailer $gmailMailer)
    {
        $outlookMailer->getEmailsFromOutlook();
        $gmailMailer->getEmailsFromGmail();

        // display emails
    }

    public function mainV2(MailerInterface $mailer)
    {
        $mailer->getEmails();

        // display emails
    }

    public function mainV2(array $mailers)
    {
        $emails = [];
        foreach ($mailers as $mailer) {
            $emails[] = $mailer->getEmails();
        }

        // display emails
    }
}


new OneEmailApp([
    new OutlookMailer(),
    new GmailMailer(),
    new YahooMailer(),
]);

//----

class UserController
{
    public function edit(Request $request)
    {
        $userId = $request->query->get('user_id');

        // logic métier (requêtes à la DB / API, calculs...)

        return $this->render('user/edit.html.twig', [
            'user' => $user,
        ]);
        //return new Response('<h1>Hello Joseph</h1>', 200);
    }
}