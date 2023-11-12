<?php ob_start(); ?>

<style>
    body {
        @apply bg-cover bg-center;
        background-image: url('./img/clown.png');
        color: #ffffff;
    }

    h1 {
        @apply text-3xl mb-4;
    }

    p {
        @apply text-lg;
    }
</style>

<div class="flex flex-col items-center justify-center h-screen">
    <h1>ERREUR 404</h1>
    <p class="mb-8">La page que vous recherchez semble introuvable.</p>
</div>

<?php
$content = ob_get_clean();
$titre = '404';
require $GLOBALS['root'] . 'view/template.php';
?>
