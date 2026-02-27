<?php

namespace Book\Controllers;

use Book\Models\BookManager;
use Book\Models\TypeManager;
use Book\Validator;

/** Class UserController **/
class TypeController {
    private $manager;

    public function __construct() {
        $this->manager = new TypeManager();
    }

    //récupère le type
    public function GetType($ID) {
        return $this->manager->GetCategoryOf($ID);
    }

    //récupère tout les catègorie
    public function GetAll()
    {
        return $this->manager->GetAllCategory();
    }

    //ajoute une catégorie a un livre
    public function AddOneCategory($bookID, $typeID)
    {
        return $this->manager->AddCategory($bookID, $typeID);
    }

    //surprime tout les catégorie dun livre
    public function RemoveCategory($bookID)
    {
        return $this->manager->RemoveCategory($bookID);
    }

    // récupère les type d'un livre
    public function GetOneID($bookID)
    {
        return $this->manager->GetOneID($bookID);
    }

}
