<?php
ob_start();
?>

    <form action="/book/new/sub" method="post">
        <p>Crée un Livre</p>
        <input type="text" name="Titre" placeholder="Votre titre">
        <p>Auteur : </p>
        <input type="text" name="auteur" placeholder="Votre auteur">
        <p>Votre description : </p>
        <textarea name="description" placeholder="Votre description"></textarea>
        <p>Votre URL : </p>
        <input type="text" name="Link" placeholder="Votre URL">
        <p>Sortie le : </p>
        <input type="date" name="date">
        <p>Catégorie :</p>
        <select name="type[]" multiple>
            <?php
            foreach ($typeDataAll as $data) {
                ?>
                    <option value="<?=$data->getid()?>"><?=$data->getcategories()?></option>

                <?php
            }
            ?>
        </select>
        <button>Send</button>
    </form>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';