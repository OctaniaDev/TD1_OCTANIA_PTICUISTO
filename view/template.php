<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $titre ?> </title>
    <link rel="stylesheet" href="./dist/output.css">
</head>
<body>
<?php

require_once $GLOBALS['root'] . 'view/navbarView.php';

if(isset($_SESSION['type_utilisateur'])) {
    echo '<p>'.$_SESSION['type_utilisateur'].'</p>';
}

?>

  <?= $content ?>

</body>
</html>