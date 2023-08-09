<?php
// Déclaration d'une classe User2
class User2
{
    // Propriété publique indiquant si l'utilisateur est un administrateur ou non
    public $isAdmin = false;

    // Constructeur de la classe User2 qui initialise le nom de l'utilisateur
    function __construct(public $name)
    {
        // Affiche un message lors de la création d'une instance de User2
        echo 'Called construct';
    }

    // Méthode pour saluer l'utilisateur. Cette méthode est finale, donc elle ne peut pas être surchargée dans une sous-classe
    final function greeting()
    {
        echo 'Hello you';
    }
}

// Déclaration d'une classe Admin qui hérite de la classe User2
class Admin extends User2
{
    // Redéfinition de la propriété $isAdmin pour les instances de la classe Admin
    public $isAdmin = true;

    // Constructeur de la classe Admin
    function __construct($name)
    {
        // Appelle le constructeur de la classe parente (User2)
        parent::__construct($name);
    }
}

// Crée une nouvelle instance de la classe User2 avec le nom "Jean"
$user = new User2('Jean');
// Crée une nouvelle instance de la classe Admin avec le nom "Paul"
$admin = new Admin('Paul');

// Affiche les détails des objets $user et $admin
var_dump($user);
var_dump($admin);
