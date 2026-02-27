<?php
namespace Book\Models;

/** Class UserManager **/
class TypeManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    //obtien les catègorie d'un livre
    public function GetCategoryOf($ID)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM eval_livre.booktype LEFT JOIN eval_livre.type ON eval_livre.booktype.type_id = eval_livre.type.id WHERE eval_livre.booktype.book_id = ?');
        $stmt->execute(array(strip_tags($ID)));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Book\Models\Type");
    }

    //récupère tout les catègorie
    public function GetAllCategory()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM eval_livre.type');
        $stmt->execute(array());
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Book\Models\Type");
    }

    //ajoute une catègorie a un livre
    public function AddCategory($bookID, $typeID)
    {
        $stmt = $this->bdd->prepare('INSERT INTO eval_livre.booktype (book_id, type_id) VALUES (?, ?)');
        return $stmt->execute(array(strip_tags($bookID), strip_tags($typeID)));
    }

    //surpime une catègorie a un livre
    public function RemoveCategory($bookID)
    {
        $stmt = $this->bdd->prepare('DELETE FROM eval_livre.booktype WHERE book_id = ?');
        return $stmt->execute(array(strip_tags($bookID)));
    }

    //obtien un les id des livre
    public function GetOneID($bookID)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM eval_livre.booktype WHERE book_id = ?');
        $stmt->execute(array(strip_tags($bookID)));
        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Book\Models\Type");
    }

    //test
    public function TestGetOneCategory($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM eval_livre.type WHERE id = ?');
        $stmt->execute(array(strip_tags($id)));
        while ($data  = $stmt->fetch()) {
            return $data["id"];
        }
    }
}
