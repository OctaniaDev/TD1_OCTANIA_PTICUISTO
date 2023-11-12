<div class="w-full h-20 bg-bleu-clair">

    <nav class="border-gray-200">
        <div class="container mx-auto flex flex-wrap items-center justify-center gap-96">
            <a href="./index.php" class="flex">
                <img src="img/Logo.png" alt="Logo ptitCuisto" class="ml-4 w-36 mt-4">
            </a>

            <!-- BOUTON POUR LE MENU BURGER -->
            <button data-collapse-toggle="mobile-menu" type="button"
                class="md:hidden ml-3 text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>


            <div class="hidden md:block w-full md:w-auto" id="mobile-menu">
                <ul class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-xl md:font-medium">
                    <li>
                        <a href="./index.php"
                            class="bg-blue-700 md:bg-transparent text-white block pl-3 pr-4 py-2 md:text-white md:hover:text-blue-700 md:p-0 rounded focus:outline-none"
                            aria-current="page">Accueil</a>
                    </li>

                    <li>
                        <a href="./index.php?action=voir_recettes"
                            class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Nos
                            Recettes</a>
                    </li>

                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0 font-medium flex items-center justify-between w-full md:w-auto">Filtres
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44">
                            <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <button data-modal-target="modal-cat" data-modal-toggle="modal-cat"
                                        class="block text-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Filtrer par catégories
                                    </button>
                                </li>
                                <li>
                                    <button data-modal-target="modal-titre" data-modal-toggle="modal-titre"
                                        class="block text-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Filtrer par titres
                                    </button>
                                </li>
                                <li>
                                    <button data-modal-target="modal-ing" data-modal-toggle="modal-ing"
                                        class="block text-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Filtrer par ingrédients
                                    </button>
                                </li>
                                <li>
                                    <button data-modal-target="modal-tag" data-modal-toggle="modal-tag"
                                        class="block text-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Filtrer par tags
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <!-- DROPDOWN MENU COMPTE -->
                    <?php if ($_SESSION['connecter'] == 'oui'): ?>
                        <li>
                            <button id="dropdownNavbarLinkCompte" data-dropdown-toggle="dropdownNavbarCompte"
                                class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0 font-medium flex items-center justify-between w-full md:w-auto">
                                Mon compte
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbarCompte"
                                class="hidden bg-white text-base z-10 list-none divide-y divide-gray-100 rounded shadow my-4 w-44">
                                <ul class="py-1" aria-labelledby="dropdownLargeButton">
                                    <?php if (isset($_SESSION['type_utilisateur']) && ($_SESSION['type_utilisateur'] == 'editeur' || $_SESSION['type_utilisateur'] == 'admin')): ?>
                                        <li>
                                            <a href="./index.php?action=compte"
                                                class="block text-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-800">
                                                Mon Compte
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (isset($_SESSION['type_utilisateur']) && ($_SESSION['type_utilisateur'] == 'editeur' || $_SESSION['type_utilisateur'] == 'admin')): ?>
                                        <li>
                                            <a href="./index.php?action=deconnexion"
                                                class="block text-gray-700 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-800">
                                                Déconnexion
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </li>
                    <?php endif; ?>



                    <li>
                        <?php
                        if ($_SESSION['connecter'] != 'oui')
                            echo '<a href="./index.php?action=connexion" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Connexion</a>';
                        ?>
                    </li>
                    <?php
                    if (isset($_SESSION['type_utilisateur'])) {
                        if ($_SESSION['type_utilisateur'] == 'admin') {
                            echo '<li><a href="./index.php?action=admin" class="text-white hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Pannel admin</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>


            <!-- Main modal -->
            <!-- Main modal -->
            <div id="modal-cat" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 items-center justify-center z-50 hidden w-full overflow-x-hidden overflow-y-auto bg-gray-500 bg-opacity-75">
                <div class="relative w-full max-w-2xl">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Filtre par categorie
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="modal-cat">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <a href="./index.php?action=voir_recettes_par_entrer&type_categorie=1"
                                class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Recettes
                                par entrer</a>
                            <a href="./index.php?action=voir_recettes_par_entrer&type_categorie=2"
                                class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Recettes
                                par plat</a>
                            <a href="./index.php?action=voir_recettes_par_entrer&type_categorie=3"
                                class="text-gray-700 hover:bg-gray-50 border-b border-gray-100 md:hover:bg-transparent md:border-0 block pl-3 pr-4 py-2 md:hover:text-blue-700 md:p-0">Recettes
                                par dessert</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fin modal -->
            <!-- Main modal -->
            <div id="modal-titre" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 items-center justify-center z-50 hidden w-full overflow-x-hidden overflow-y-auto bg-gray-500 bg-opacity-75">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Filtre par titre
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="modal-titre">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form action="./index.php?action=voir_recettes_par_titre" method="post">
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Rechercher un
                                    titre</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" name="motCherche" id="default-search"
                                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Rechercher un titre de recette" required>
                                    <button type="submit"
                                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Rechercher</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin modal -->
            <!-- Main modal -->
            <div id="modal-ing" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 items-center justify-center z-50 hidden w-full overflow-x-hidden overflow-y-auto bg-gray-500 bg-opacity-75">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Filtre par ingrédients
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="modal-ing">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form action="./index.php?action=voir_recettes_par_ingredients" method="post">
                                <?php
                                foreach ($_SESSION['ingredients'] as $ingredient) {
                                    echo ('
                                        <div class="flex items-center">
                                        <input id="' . $ingredient['ING_ID'] . '" type="checkbox" name="ingredients_recette[]" value="' . $ingredient['ING_ID'] . '" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="' . $ingredient['ING_ID'] . '" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">' . $ingredient['ING_INTITULE'] . '</label>
                                        </div>
                                    ');
                                }
                                ?>
                                <button type="submit"
                                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Rechercher</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin modal -->
            <!-- Main modal -->
            <div id="modal-tag" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 items-center justify-center z-50 hidden w-full overflow-x-hidden overflow-y-auto bg-gray-500 bg-opacity-75">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Filtre par tags
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="modal-tag">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <form action="./index.php?action=voir_recettes_par_tags" method="post">
                                <?php
                                foreach ($_SESSION['tags'] as $tag) {
                                    echo ('
                                        <div class="flex items-center">
                                        <input id="' . $tag['TAG_ID'] . '" type="checkbox" name="tags[]" value="' . $tag['TAG_ID'] . '" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="' . $tag['TAG_ID'] . '" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">' . $tag['TAG_LIBELLE'] . '</label>
                                        </div>
                                    ');
                                }
                                ?>
                                <button type="submit"
                                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Rechercher</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin modal -->
        </div>
    </nav>
</div>

<script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>