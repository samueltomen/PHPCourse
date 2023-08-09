<?php

// Définition de la classe User
class User
{
    // Propriété private : elle est uniquement accessible de l'intérieur de cette classe (User).
    // Cela signifie que vous ne pouvez pas y accéder ou la modifier depuis une instance de la classe ou d'une sous-classe.
    private $secret = '12345601510';

    // Propriété protected : elle est accessible de l'intérieur de cette classe (User) et de toutes ses sous-classes (comme Admin).
    // Vous ne pouvez pas y accéder depuis une instance de la classe.
    protected $secretP = '12345601510';

    // Propriété public : elle est accessible partout, à la fois à l'intérieur et à l'extérieur de la classe.
    // Vous pouvez y accéder ou la modifier depuis une instance de la classe.
    public $secretPublic = "publicMDP";

    // Constructeur public de la classe : il est accessible de l'extérieur, ce qui permet de créer une instance de la classe.
    public function __construct(public $name)
    {
    }

    // Méthode public : elle est accessible à l'extérieur de la classe.
    function createMdp()
    {
        // Accès à la propriété private de la classe à partir de sa méthode.
        echo $this->secret;
    }
}

// Définition de la classe Admin qui hérite de User
class Admin extends User
{
    // Méthode public : elle est accessible à l'extérieur de la classe.
    function test()
    {
        // Accès à la propriété protected de la classe parente (User) à partir d'une méthode de sa sous-classe (Admin).
        echo $this->secretP;
    }
}

// Création d'une instance de la classe User
$user = new User('Jean');
// Création d'une instance de la classe Admin
$admin = new Admin('Lili');

// Accès à la propriété public de la classe User à partir d'une instance de cette classe.
echo $user->name;
// Appel de la méthode createMdp() de la classe User à partir d'une instance de cette classe.
echo $user->createMdp();
// Appel de la méthode test() de la classe Admin à partir d'une instance de cette classe.
echo $admin->test();

// Affichage des détails des objets $user et $admin
var_dump($user);
var_dump($admin);
