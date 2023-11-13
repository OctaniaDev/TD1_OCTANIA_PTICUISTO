<?php ob_start(); ?>

<div class="carrousel">

    <input type="radio" name="items" id="radio-1" checked>
    <input type="radio" name="items" id="radio-2">
    <input type="radio" name="items" id="radio-3">
    <input type="radio" name="items" id="radio-4">
    <ul class="items">
        <li>
            <div class="item">
                <img src="./img/img_attente.jpg">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente2.jpg">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente3.jpg">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente4.jpg">
            </div>
        </li>
    </ul>
    <div class="itemsNavigation">
        <label for="radio-1" id="dotForRadio-1"></label>
        <label for="radio-2" id="dotForRadio-2"></label>
        <label for="radio-3" id="dotForRadio-3"></label>
        <label for="radio-4" id="dotForRadio-4"></label>
    </div>
</div>

<style>
    /*Carousel*/
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

    @media (max-width: 768px) {
    .carrousel li div.item {
        margin-left: 50px;
        width: 60%;
    }
    }

    @media (max-width: 480px) {
        .carrousel li div.item {
            margin-left: 50px;
            width: 60%;
        }
    }
</style>



<div class="flex flex-col md:flex-row container mt-5 justify-center mx-auto mb-20">
    <div class="">
        <div class="md:col-md-6 md:mr-10 mx-auto ml-10">
            <div class="border-4 p-4 mr-10 mt-5 md:mx-auto">
                <h2 class="text-2xl font-titre text-center mb-6 text-bleu">Les dernières recettes</h2>
                <?php
                if (!empty($recettes)) {
                    echo '<ul id="list-recette" class="bg-white">'; ?>
                    <?php for ($i = 0; $i < 3; $i++): ?>
                        <?php if ($i < count($recettes)): ?>
                            <div class="mb-2 font-texte flex flex-col md:flex-row mt-12 rounded p-4 md:h-72 bg-bleu-clair">
                                <img src="<?= $GLOBALS['root'] ?>img/<?= $recettes[$i]['REC_IMAGE'] ?>" alt="image de la recette" class="float-left mr-4 w-64 h-64 md:w-48 md:h-48">
                                <div class="flex flex-col md:mb-20">
                                    <h2><a href="./index.php?action=voir_recettes&rec_id=<?= $recettes[$i]['REC_ID'] ?>"><?= $recettes[$i]['REC_TITRE'] ?></a></h2>
                                    <p><?= $recettes[$i]['CAT_INTITULE'] ?></p>
                                    <p><?= $recettes[$i]['REC_RESUME'] ?></p>
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        <?php $j = 0; ?>
                                        <?php while (count($tags) > $j): ?>
                                            <?php if ($recettes[$i]['REC_ID'] == $tags[$j]['REC_ID']): ?>
                                                <form action="./index.php?action=voir_recettes_par_tag" method="post">
                                                    <button type="submit" name="tag" value="<?= $tags[$j]['TAG_ID'] ?>" class="bg-bleu text-white px-2 py-1 rounded"><?= $tags[$j]['TAG_LIBELLE'] ?></button>
                                                </form>
                                            <?php endif; ?>
                                            <?php $j++; ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php echo '</ul>';
                } else {
                    echo '<p class="text-center text-red-950">Aucune recette trouvée</p>';
                }
                ?>
            </div>
        </div>
    </div>



    <div class="mt-5 w-full md:w-1/2 bg-bleu p-6 mb-10">
        <div class="col-md-6 flex justify-center">
            <img src="./img/Pticuisto.png" alt="Image pticuisto" class="w-60">
        </div>
        <p class="flex justify-center mt-10 text-white text-2xl font-bold mb-10">Edito</p>
        <div class="col-md-6">
            <p class="text-white text-justify">
                <?= '"' . $edito[0]['EDI_CONTENU'] . '"'; ?>
            </p>
        </div>
    </div>

</div>

<?php
$content = ob_get_clean();
$titre = 'Accueil';
require $GLOBALS['root'] . 'view/template.php';
?>