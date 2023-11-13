<?php ob_start(); ?>

<div class="carrousel">

    <input type="radio" name="items" id="radio-1" checked>
    <input type="radio" name="items" id="radio-2">
    <input type="radio" name="items" id="radio-3">
    <input type="radio" name="items" id="radio-4">
    <ul class="items">
        <li>
            <div class="item">
                <img src="./img/img_attente.jpg" alt="image du carousel">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente2.jpg" alt="image du carousel">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente3.jpg" alt="image du carousel">
            </div>
        </li>
        <li>
            <div class="item">
                <img src="./img/img_attente4.jpg" alt="image du carousel">
            </div>
        </li>
    </ul>
    <div class="itemsNavigation">
        <label for="radio-1" id="dotForRadio-1"></label>
        <label for="radio-2" id="dotForRadio-2"></label>
        <label for="radio-3" id="dotForRadio-3"></label>
        <label for="radio-4" id="dotForRadio-4"></label>
    </div>

    <div class="arrow left-arrow" onclick="changeSlide(-1)">&#8249;</div>
    <div class="arrow right-arrow" onclick="changeSlide(1)">&#8250;</div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var radioButtons = document.querySelectorAll('.carrousel input[type="radio"]');
        var currentRadio = 0;

        var interval = setInterval(function() {
            radioButtons[currentRadio].checked = false;
            currentRadio = (currentRadio + 1) % radioButtons.length;
            radioButtons[currentRadio].checked = true;

            var event = new Event('change');
            radioButtons[currentRadio].dispatchEvent(event);
        }, 5000);


        var interval = setInterval(function() {
            changeSlide(1);
        }, 5000);

        window.changeSlide = function(increment) {
            radioButtons[currentRadio].checked = false;
            currentRadio = (currentRadio + increment + radioButtons.length) % radioButtons.length;
            radioButtons[currentRadio].checked = true;

            var event = new Event('change');
            radioButtons[currentRadio].dispatchEvent(event);
        };
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var radioButtons = document.querySelectorAll('.carrousel input[type="radio"]');
        var currentRadio = 0;

        var interval = setInterval(function () {
            radioButtons[currentRadio].checked = false;
            currentRadio = (currentRadio + 1) % radioButtons.length;
            radioButtons[currentRadio].checked = true;

            var event = new Event('change');
            radioButtons[currentRadio].dispatchEvent(event);
        }, 5000);


        var interval = setInterval(function () {
            changeSlide(1);
        }, 5000);

        window.changeSlide = function (increment) {
            radioButtons[currentRadio].checked = false;
            currentRadio = (currentRadio + increment + radioButtons.length) % radioButtons.length;
            radioButtons[currentRadio].checked = true;

            var event = new Event('change');
            radioButtons[currentRadio].dispatchEvent(event);
        };
    });
</script>




<div class="flex flex-col md:flex-row container mt-5 justify-center mx-auto mb-20">
    <div class="">
        <div class="md:col-md-6 md:mr-10 mx-auto ml-10">
            <div class="border-4 p-4 mr-10 mt-5 md:mx-auto">
                <h2 class="text-2xl font-titre text-center mb-6 text-bleu">Les dernières recettes</h2>
                <?php
                if (!empty($recettes)) {
                    echo '<div id="list-recette" class="bg-white">'; ?>
                    <?php for ($i = 0; $i < 3; $i++) : ?>
                        <?php if ($i < count($recettes)) : ?>
                            <div class="mb-2 font-texte flex flex-col md:flex-row mt-12 rounded p-4 md:h-56 bg-bleu-clair">
                                <a class="mr-2" href="./index.php?action=voir_recettes&rec_id=<?= $recettes[$i]['REC_ID'] ?>"><img src="<?= $GLOBALS['root'] ?>img/<?= $recettes[$i]['REC_IMAGE'] ?>" alt="image de la recette" class="float-left mr-4 w-64 h-64 mr-2 md:w-48 md:h-48"></a>
                                <div class="flex flex-col md:mb-20">
                                    <h2 class="text-2xl underline  underline-offset-1"><a href="./index.php?action=voir_recettes&rec_id=<?= $recettes[$i]['REC_ID'] ?>"><?= $recettes[$i]['REC_TITRE'] ?></a></h2>
                                    <p class="mt-4 mb-4 bg-yellow-500 text-white px-2 py-1 rounded w-16 text-center"><?= $recettes[$i]['CAT_INTITULE'] ?></p>
                                    <p class=""><?= $recettes[$i]['REC_RESUME'] ?></p>
                                    <div class="flex flex-wrap gap-2 mt-2">
                                        <?php $j = 0; ?>
                                        <?php while (count($tags) > $j) : ?>
                                            <?php if ($recettes[$i]['REC_ID'] == $tags[$j]['REC_ID']) : ?>
                                                <form action="./index.php?action=voir_recettes_par_tag&tag_id=" method="post">
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
                <?php echo '</div>';
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