<?php ob_start(); ?>


<div class="flex items-center justify-center min-h-screen mb-20">
    <div class="text-center border rounded-md p-8 bg-blanc md:p-16">
        <h1 class="text-2xl md:text-5xl font-titre mb-4 md:mb-8 text-bleu">Modification<br/>d'une recette</h1>
<?php
if(isset($erreur))
	echo $erreur;
?>

	<?php echo '<form enctype="multipart/form-data" method="post" action="/index.php?action=modifier_recette&rec_id='.$recettesDetail[0]['REC_ID'].'" class="mb-4">'; ?>
		<div class="mb-4">
			<label for="titre-recette" class="block text-sm md:text-base font-medium text-gray-600">Titre :</label></p>
			<?php echo '<input id="titre-recette" type="text" pattern="^[a-zA-Z\'\s]{1,32}$" name="titre_recette" value="'.$recettesDetail[0]['REC_TITRE'].'" required
            class="mt-1 p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">'; ?>
		</div>

		<div class="mb-4">
			<label for="resume-recette" class="block text-sm md:text-base font-medium text-gray-600">Résumé :</label>
			<?php echo '<textarea id="resume-recette" name="resume_recette" placeholder="Entrez le résumé de la recette" required
            class="mt-1 p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">'.$recettesDetail[0]['REC_RESUME'].'</textarea>' ?>
		</div>

		<div class="mb-4">
			<label for="contenu-recette" class="block text-sm md:text-base font-medium text-gray-600">Contenu :</label>
			<?php echo '<textarea id="contenu-recette" name="contenu_recette" placeholder="Entrez le contenu de la recette" required
            class="mt-1 p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">'.$recettesDetail[0]['REC_CONTENU'].'</textarea>'; ?>
		</div>

		<fieldset class="mb-4">
			<legend class="text-bleu text-sm md:text-base">choisissez une categorie</legend>
			<div class="flex gap-4">
				<div>
					<?php
					if($recettesDetail[0]['CAT_INTITULE'] == 'entree')
						echo '<input checked id="entree-recette" value="1" type="radio" name="categorie_recette">';
					else 
						echo '<input id="entree-recette" value="1" type="radio" name="categorie_recette">';
					?>
					<label for="entree-recette" class="text-sm md:text-base text-bleu">Entrée</label>
				</div>
				<div>
					<?php
					if($recettesDetail[0]['CAT_INTITULE'] == 'plat')
						echo '<input checked id="plat-recette" value="2" type="radio" name="categorie_recette">';
					else 
						echo '<input id="plat-recette" value="2" type="radio" name="categorie_recette">';
					?>
					<label for="plat-recette" class="text-sm md:text-base text-bleu">Plat</label>
					
				</div>
				<div>
					<?php
					if($recettesDetail[0]['CAT_INTITULE'] == 'dessert')
						echo '<input checked id="dessert-recette" value="3" type="radio" name="categorie_recette">';
					else 
						echo '<input id="dessert-recette" value="3" type="radio" name="categorie_recette">';
					?>
					<label for="dessert-recette" class="text-sm md:text-base text-bleu">Dessert</label>
				</div>
			</div>
		</fieldset>

		<div class="mb-4 overscroll-auto overflow-y-scroll h-96">
		<?php
			if(!empty($ingredients)) {
				foreach($ingredients as $ingredient) {
					echo '<div class="flex items-center mb-2">';
					$contient = false;
					foreach($ingredientsRecette as $ingredientRecette) {
						if($ingredient['ING_ID'] == $ingredientRecette['ING_ID']) {
							$contient = true;
							echo '<input checked id="'.$ingredient['ING_INTITULE'].'-recette" value="'.$ingredient['ING_ID'].'" type="checkbox" name="ingredients_recette[]">';
						}
					}
					if(!$contient)
						echo '<input id="'.$ingredient['ING_INTITULE'].'-recette" value="'.$ingredient['ING_ID'].'" type="checkbox" name="ingredients_recette[]">';
					
					echo '<label for="'.$ingredient['ING_INTITULE'].'-recette" class="ml-2 text-sm md:text-base">'.$ingredient['ING_INTITULE'].' </label></div>';
				}
			}
		?></div>
		<div class="mb-4">
			<input type="hidden" name="MAX_FILE_SIZE" value="50000000">
			<input placeholder="choisir une image" value="" type="file" id="image-recette" name="image_recette" accept="image/*" class="p-2 md:p-4 w-full border rounded-md focus:outline-none focus:border-bleu focus:ring focus:ring-bleu focus:ring-opacity-50">
		</div>
		<input type="submit" value="Publier" class="bg-bleu text-blanc p-2 md:p-4 rounded-md hover:bg-bleu-clair focus:outline-none focus:ring focus:border-bleu focus:ring-bleu focus:ring-opacity-50">
	</form>
	<div class="mt-8">
        <a href="javascript:history.go(-1)"
            class="bg-gray-500 text-white hover:bg-gray-400 px-4 py-2 rounded">Retour</a>
    </div>
	</div>
</div>
<?php
$content = ob_get_clean();
$titre = 'Modification Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
