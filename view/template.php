<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo $titre ?>
  </title>

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


  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .flex-grow {
      flex: 1;
    }
  </style>

</head>

<body class="flex flex-col min-h-screen">
  <div class="flex-grow">
    <?php
    require_once $GLOBALS['root'] . 'view/navbarView.php';
    ?>
    
    <?= $content ?>
  </div>

  <?php require_once $GLOBALS['root'] . 'view/footerView.php'; ?>
</body>

</html>
