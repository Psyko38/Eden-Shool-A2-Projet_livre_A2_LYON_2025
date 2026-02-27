<?php
ob_start();
?>

<h1>Bienvenu sur mon super site de présentation de livre</h1>

<?php

$content = ob_get_clean();
require VIEWS . 'layout.php';