<?php

namespace Book\Controllers;

use Book\Models\BookManager;
use Book\Validator;

/** Class UserController **/
class BookController {
    private $manager;
    private $Type;

    public function __construct() {
        $this->manager = new BookManager();
        $this->Type = new TypeController();
    }

    //jute q=une fonction pour affciher la page 1 livre
    public function ShowOneBook($slug) {
        $data = $this->manager->getOneBook($slug);
        $typeData = [];
        // permet de crée un tabalaux avec $typeData qui va avoir tout les type de chaque livre
        foreach ($data as $newdata) {
            $typeData[] = $this->Type->GetType($newdata->getid());
        }
        require VIEWS . 'Book/ShowOneBook.php';
    }

    //permet d'aficher la page tout les livre
    public function ShowBook() {
        $data = $this->manager->getAll();
        $typeData = [];
        // permet de crée un tabalaux avec $typeData qui va avoir tout les type de chaque livre
        foreach ($data as $newdata) {
            $typeData[] = $this->Type->GetType($newdata->getid());
        }
        require VIEWS . 'Book/ShowAllBook.php';
    }

    // permet de suprimer un livre
    public function RemoveOneBook($slug) {

        $this->Type->RemoveCategory($slug);
        $this->manager->RemoveBook($slug);
        header("Location: /book");
    }

    public function addBook() {
        $typeDataAll = $this->Type->GetAll();
        require VIEWS . 'Book/Addbook.php';
    }

    //Permet de modifer le livre
    public function Editook($slug) {

        $data = $this->manager->getOneBook($slug);
        $typeDataAll = $this->Type->GetAll();
        $typeData = $this->Type->GetOneID($slug);
        require VIEWS . 'Book/Editbook.php';
    }

    //eidter un livre
    public function PostEditook($slug)
    {
        if ($_POST["Titre"] != "" and $_POST["auteur"] != "" and $_POST["description"] != "" and $_POST["Link"] != "" and $_POST["date"] != "") {
            $this->manager->edit($_POST["Titre"], $_POST["auteur"], $_POST["description"], $_POST["Link"], $_POST["date"], $slug);
            //surpimer tout les catégorie du livre
            $this->Type->RemoveCategory($slug);
            //fait une boucle sur le post type pour ajouter 1 élément par 1 élément
            foreach ($_POST["type"] as $data) {
                $this->Type->AddOneCategory($slug, $data);
            }
    }
        header("Location: /book");
    }

    //ajouter un livre
    public function PostAddBook() {
        if ($_POST["Titre"] != "" and $_POST["auteur"] != "" and $_POST["description"] != "" and $_POST["Link"] != "" and $_POST["date"] != "" and $_POST["date"] != "") {
            $this->manager->add($_POST["Titre"], $_POST["auteur"], $_POST["description"], $_POST["Link"], $_POST["date"]);
            $max = $this->manager->getLast();
            //fait une boucle sur le post type pour ajouter 1 élément par 1 élément
            foreach ($_POST["type"] as $data) {
                $this->Type->AddOneCategory($max[0], $data);
            }
        }
        header("Location: /book");
    }

    public function ShowHome()
    {
        require VIEWS . 'Book/home.php';
    }
}
