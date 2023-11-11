<?php ob_start(); ?>
		<h1>Ajout d'une recette</h1>
	<form
	class="grid grid-cols-3 gap-4 w-96 md:w-auto place-content-center"
	enctype="multipart/form-data"
	method="post"
	action="/index.php?action=ajout_recette">
		<input
		id="titre-recette"
		type="text"
		name="titre_recette"
		class="w-full h-24 resize-none p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
		placeholder="titre">
		<textarea
		id="resume-recette"
		name="resume_recette"
		class="col-span-2 w-full h-24 resize-none p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "
		placeholder="résumé"></textarea>

		<textarea
		id="contenu-recette"
		name="contenu_recette"
		class="col-span-3 w-full h-24 resize-none p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
		placeholder="contenu"></textarea>
		
		<fieldset class="w-full md:w-12">
			<div>
				<label for="entree-recette">entree</label>
				<input id="entree-recette" value="1" type="radio" name="categorie_recette">
			</div>
			<div>
				<label for="plat-recette">plat</label>
				<input id="plat-recette" value="2" type="radio" name="categorie_recette">
			</div>
			<div>
				<label for="dessert-recette">dessert</label>
				<input id="dessert-recette" value="3" type="radio" name="categorie_recette">
			</div>
		</fieldset>

		<div
		class="w-full col-span-2 overscroll-auto overflow-y-scroll h-24 md:w-24">
			<?php
			if(!empty($ingredients)) {
				foreach($ingredients as $ingredient) {
					echo '<div><label for="'.$ingredient['ING_INTITULE'].'-recette-recette">'.$ingredient['ING_INTITULE'].' </label>';
					echo '<input id="'.$ingredient['ING_INTITULE'].'-recette" value="'.$ingredient['ING_ID'].'" type="checkbox" name="ingredients_recette[]"></div>';
				}
			}
			?>
		</div>

		<input
		class="w-full col-span-3 sm:col-span-2 mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
		id="image-recette"
		accept="image/*"
		name="image_recette"
		type="file"
		placeholder="image">

		<input
		type="submit"
		value="Publier"
		class="w-full bg-bleu hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
	</form>
<?php
$content = ob_get_clean();
$titre = 'Ajout Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
