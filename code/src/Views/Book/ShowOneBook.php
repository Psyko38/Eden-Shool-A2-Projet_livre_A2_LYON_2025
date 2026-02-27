<?php
ob_start();

$data = $data[0]
?>
    <div>
        <h2><?=$data->gettitle()?> - by <?=$data->getauthor()?></h2>
        <p><?=$data->getdescription()?></p>
        <a href="<?=$data->getslug()?>">Page de l'éditeur</a>
        <p>Date de création : <?=$data->getdate()?></p>
        <?php
        if (isset($typeData[0])) {
            ?>
            <p>Catégorie : </p>
            <?php
            foreach ($typeData[0] as $key2 => $data2) {
                ?>
                <p class="cat"><?= $data2->getcategories() ?></p>
                <?php
            }
        }
        ?>
        <a href="<?=$data->getid()?>/remove">Suprimer</a>
        <a href="<?=$data->getid()?>/edit">Modifer</a>
    </div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

?>