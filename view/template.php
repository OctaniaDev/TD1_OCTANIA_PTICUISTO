<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $titre ?> </title>

    <!-- Police de titre -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- Police d'écriture -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">


    <!-- TAILWIND CSS -->
    <link rel="stylesheet" href="output.css">

</head>
<body>
<?php

require_once $GLOBALS['root'] . 'view/navbarView.php';
require_once $GLOBALS['root'] . 'view/footerView.php';


if(isset($_SESSION['type_utilisateur'])) {
    echo '<p>'.$_SESSION['type_utilisateur'].'</p>';
}

?>

  <?= $content ?>

</body>
</html>