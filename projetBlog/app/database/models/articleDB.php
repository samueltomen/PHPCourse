<?php



// Classe définissant les opérations de base de données pour les articles.
class ArticleDB
{
    // Déclarations des propriétés pour stocker les requêtes préparées.
    private PDOStatement $statementCreateOne;
    private PDOStatement $statementUpdateOne;
    private PDOStatement $statementDeleteOne;
    private PDOStatement $statementReadOne;
    private PDOStatement $statementReadAll;
    private PDOStatement $statementReadUserAll;

    // Constructeur de la classe.
    function __construct(private PDO $pdo)
    {
        // Préparation des requêtes SQL pour chaque opération de base de données.
        $this->statementCreateOne = $pdo->prepare('INSERT INTO article (title,category,content,image,author) VALUES (:title,:category,:content,:image,:author)');
        $this->statementUpdateOne = $pdo->prepare('UPDATE article SET title=:title,category=:category,content=:content,image=:image,author=:author WHERE id=:id');
        $this->statementReadOne = $pdo->prepare('SELECT article.*, user.firstname, user.lastname FROM article  LEFT JOIN user ON article.author = user.id WHERE article.id=:id');
        $this->statementReadAll = $pdo->prepare('SELECT article.*, user.firstname, user.lastname FROM article LEFT JOIN user ON article.author = user.id');
        $this->statementDeleteOne = $pdo->prepare('DELETE FROM article WHERE id=:id ');
        $this->statementReadUserAll = $pdo->prepare('SELECT * FROM article WHERE author=:authorId');
    }

    // Méthode pour récupérer tous les articles.
    public function fetchAll(): array
    {
        $this->statementReadAll->execute();
        return $this->statementReadAll->fetchAll();
    }

    // Méthode pour récupérer un article par son identifiant.
    public function fetchOne(int $id): array
    {
        $this->statementReadOne->bindValue(":id", $id);
        $this->statementReadOne->execute();
        return $this->statementReadOne->fetch();
    }

    // Méthode pour supprimer un article par son identifiant.
    public function deleteOne(int $id): string
    {
        $this->statementDeleteOne->bindValue(':id', $id);
        $this->statementDeleteOne->execute();
        return $id;
    }

    // Méthode pour créer un nouvel article.
    public function createOne($article): array
    {
        $this->statementCreateOne->bindValue(':title', $article['title']);
        $this->statementCreateOne->bindValue(':content', $article['content']);
        $this->statementCreateOne->bindValue(':category', $article['category']);
        $this->statementCreateOne->bindValue(':image', $article['image']);
        $this->statementCreateOne->bindValue(':author', $article['author']);
        $this->statementCreateOne->execute();
        return $this->fetchOne($this->pdo->lastInsertId());
    }

    // Méthode pour mettre à jour un article existant.
    public function updateOne($article): array
    {
        $this->statementUpdateOne->bindValue(':title', $article['title']);
        $this->statementUpdateOne->bindValue(':content', $article['content']);
        $this->statementUpdateOne->bindValue(':category', $article['category']);
        $this->statementUpdateOne->bindValue(':image', $article['image']);
        $this->statementUpdateOne->bindValue(':author', $article['author']);
        $this->statementUpdateOne->bindValue(':id', $article['id']);
        $this->statementUpdateOne->execute();
        return $article;
    }

    public function fetchUserArticle(string $authorId): array
    {
        $this->statementReadUserAll->bindValue(':authorId', $authorId);
        $this->statementReadUserAll->execute();
        return $this->statementReadUserAll->fetchAll();
    }
}

// Retourne une nouvelle instance de la classe ArticleDB avec la connexion PDO.
return new ArticleDB($pdo);
