<!DOCTYPE html>
<html lang="fr">

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

    .flex-grow {
      flex: 1;
    }

    .carrousel {
      overflow: hidden;
      position: relative;
      text-align: center;
      padding: 1em 0;
      max-width: 1050px;
      margin: auto;
    }

    .carrousel .items {
      width: 1000%;
      margin-bottom: 20px;
      list-style: none;
      position: relative;
      -webkit-transition: transform 0.5s;
      -moz-transition: transform 0.5s;
      -o-transition: transform 0.5s;
      transition: transform 0.5s;
    }

    .carrousel .items li {
      width: 25%;
      position: relative;
      float: left;
    }

    .carrousel li div {
      margin: auto;
      color: #666666;
      font-size: 1.3em;
      font-weight: bold;
    }

    .carrousel li img {
      max-width: 50%;
      object-fit: cover;
      vertical-align: middle;
    }

    .carrousel li div.item {
      color: #777777;
      display: block;
      max-width: 100%;
      max-height: 500px;
      text-align: center;
      margin-bottom: 20px;
    }

    .name {
      font-weight: bold;
    }

    .description {
      font-weight: 100;
    }

    .carrousel .itemsNavigation {
      margin-top: 20px;
      display: block;
      list-style: none;
      text-align: center;
      bottom: 1em;
      position: relative;
      width: 104px;
      left: 50%;
      margin-left: -52px;
    }

    .carrousel input {
      display: none;
    }

    .carrousel .itemsNavigation label {
      float: left;
      margin: 6px;
      display: block;
      height: 10px;
      width: 10px;
      -webkit-border-radius: 50%;
      border-radius: 50%;
      border: solid 2px #2980b9;
      font-size: 0;
    }

    #radio-1:checked~.items {
      transform: translateX(0%);
    }

    #radio-2:checked~.items {
      transform: translateX(-25%);
    }

    #radio-3:checked~.items {
      transform: translateX(-50%);
    }

    #radio-4:checked~.items {
      transform: translateX(-75%);
    }

    .carrousel .itemsNavigation label:hover {
      cursor: pointer;
    }

    .carrousel #radio-1:checked~.itemsNavigation label#dotForRadio-1,
    .carrousel #radio-2:checked~.itemsNavigation label#dotForRadio-2,
    .carrousel #radio-3:checked~.itemsNavigation label#dotForRadio-3,
    .carrousel #radio-4:checked~.itemsNavigation label#dotForRadio-4 {
      background: #2980b9;
    }

    .carrousel .arrow {
      position: absolute;
      top: 40%;
      font-size: 100px;
      cursor: pointer;
      color: #2980b9;
      user-select: none;
    }

    .carrousel .left-arrow {
      left: 10px;
    }

    .carrousel .right-arrow {
      right: 10px;
    }


    @media (max-width: 768px) {
      .carrousel li div.item {
        margin-left: 50px;
        width: 60%;
      }

      .carrousel .arrow {
        top: 10%;
      }

      @media (max-width: 480px) {
        .carrousel li div.item {
          margin-left: 50px;
          width: 60%;
        }
      }
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