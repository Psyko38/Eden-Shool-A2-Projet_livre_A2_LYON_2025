<?php
namespace Book\Models;


/** Class UserManager **/
class BookManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    // récupere tout les livre
    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM eval_livre.book');
        $stmt->execute(array());
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Book\Models\Book");
    }

    //récupère 1 livre
    public function getOneBook($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM eval_livre.book WHERE id = ?');
        $stmt->execute(array(strip_tags($id)));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Book\Models\Book");
    }

    // suprime 1 livre
    public function RemoveBook($id)
    {
        $stmt = $this->bdd->prepare('DELETE FROM eval_livre.book WHERE id = ?');
        return $stmt->execute(array(strip_tags($id)));
    }

    //ajoute 1 livre
    public function add($title, $author, $description, $Link, $date) {
        $stmt = $this->bdd->prepare('INSERT INTO eval_livre.book (title, author, slug, description, date) VALUES (?, ?, ?, ?, ?);');
        $stmt->execute(array(strip_tags($title), strip_tags($author), strip_tags($Link), strip_tags($description), strip_tags($date)));
    }

    //moodifie 1 livre
    public function edit($title, $author, $description, $Link, $date, $id) {
        $stmt = $this->bdd->prepare('UPDATE eval_livre.book t SET t.title = ?, t.author = ?, t.slug = ?, t.description = ?, t.date = ? WHERE t.id = ?');
        return $stmt->execute(array(strip_tags($title), strip_tags($author), strip_tags($Link), strip_tags($description), strip_tags($date), strip_tags($id)));
    }

    //obtient le dernier élément ajoutée
    public function getLast() {
        $stmt = $this->bdd->prepare('SELECT MAX(book.id) FROM eval_livre.book;');
        $stmt->execute(array());
        while ($ligne = $stmt->fetch()) {
            return $ligne;
        }
    }

    //test
    public function TestOneBookid($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM eval_livre.book WHERE id = ?');
        $stmt->execute(array(strip_tags($id)));
        while ($data  = $stmt->fetch()) {
            return $data["id"];
        }
    }

}
