<?php
ob_start();

$data = $data[0];
// crée un tablaux $typeData avec tout les ID des élément
$includID = [];
foreach ($typeData as $datas) {
    $includID[] = $datas->getTypeId();
}
?>

<form action="/book/id/<?=$data->getid()?>/edit/sub" method="post">
    <p>Modifer le livre</p>
    <input type="text" name="Titre" placeholder="Votre titre" value="<?=$data->gettitle()?>">
    <p>Auteur : </p>
    <input type="text" name="auteur" placeholder="Votre auteur" value="<?=$data->getauthor()?>">
    <p>Votre description : </p>
    <textarea name="description" placeholder="Votre description"><?=$data->getdescription()?></textarea>
    <p>Votre URL : </p>
    <input type="text" name="Link" placeholder="Votre URL" value="<?=$data->getslug()?>">
    <p>Sortie le : </p>
    <input type="date" name="date" value="<?=$data->getdate()?>">
    <p>Catégorie</p>
    <select name="type[]" multiple>
        <?php
        foreach ($typeDataAll as $data) {
            ?>
            <option value="<?=$data->getid()?>"<?php if (in_array($data->getId(), $includID)) {echo "selected"; } //chek is l'ID type du livre et le même et si c'est le cas allors on le séléctione ?>><?=$data->getcategories()?></option>

            <?php
        }
        ?>
    </select>
    <button>Send</button>
</form>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';