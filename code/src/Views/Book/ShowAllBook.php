<?php
ob_start();
?>

<?php
$id = 0;
foreach ($data as $key => $value) {
    ?>
    <div>
        <h2><?=$value->gettitle()?> - by <?=$value->getauthor()?></h2>
        <p><?=$value->getdescription()?></p>
        <a href="<?=$value->getslug()?>">Page de l'éditeur</a>
        <p>Date de création : <?=$value->getdate()?></p>
        <?php
        if (isset($typeData[$id])) {
            ?>
            <p>Catégorie : </p>
            <?php
            foreach ($typeData[$id] as $key2 => $value2) {
                ?>
                <p class="cat"><?= $value2->getcategories() ?></p>
                <?php
            }
        }
        ?>
        <a href="../book/id/<?=$value->getid()?>">Voir le livre</a>
    </div>
    <?php
    $id++;
}
?>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

?>