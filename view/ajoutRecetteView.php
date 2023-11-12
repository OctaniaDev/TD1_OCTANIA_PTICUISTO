<?php ob_start(); ?>
	<h1>Ajout d'une recette</h1>

	<form enctype="multipart/form-data" method="post" action="/index.php?action=ajout_recette">
		<div>
			<label for="titre-recette">Titre : </label></p>
			<input id="titre-recette" type="text" name="titre_recette" required pattern="^[a-zA-Z'\s]{1,32}$">
		</div>
		<div>
			<p><label for="contenu-recette">Contenu : </label></p>
			<textarea id="contenu-recette" name="contenu_recette"></textarea>
		</div>
		<div>
			<p><label for="resume-recette">Résumé : </label></p>
			<textarea id="resume-recette" name="resume_recette"></textarea>
		</div>
		<fieldset>
			<legend>choisissez une categorie</legend>
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

		<div><?php
			if(!empty($ingredients)) {
				foreach($ingredients as $ingredient) {
					echo '<div><label for="'.$ingredient['ING_INTITULE'].'-recette-recette">'.$ingredient['ING_INTITULE'].'</label>';
					echo '<input id="'.$ingredient['ING_INTITULE'].'-recette" value="'.$ingredient['ING_ID'].'" type="checkbox" name="ingredients_recette[]"></div>';
				}
			}
		?></div>
		<div>
			<input placeholder="choisir une image" type="file" id="image-recette" name="image_recette" accept="image/*">
		</div>
		<input type="submit" value="Publier">
	</form>

<?php
$content = ob_get_clean();
$titre = 'Ajout Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
