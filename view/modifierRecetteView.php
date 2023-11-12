<?php ob_start(); ?>
<?php
if(isset($erreur)) {
	echo '<p style="color : red;">erreur lors de la modification de la recette</p>';
}
?>
	<h1>Modification d'une recette</h1>

	<?php echo '<form enctype="multipart/form-data" method="post" action="/index.php?action=modifier_recette&rec_id='.$recettesDetail[0]['REC_ID'].'">'; ?>
		<div>
			<label for="titre-recette">Titre : </label></p>
			<?php echo '<input id="titre-recette" type="text" pattern="^[a-zA-Z\'\s]{1,32}$" name="titre_recette" value="'.$recettesDetail[0]['REC_TITRE'].'">'; ?>
		</div>
		<div>
			<p><label for="resume-recette">Résumé : </label></p>
			<?php echo '<textarea id="resume-recette" name="resume_recette" name="resume_recette">'.$recettesDetail[0]['REC_CONTENU'].'</textarea>' ?>
		</div>
		<div>
			<p><label for="contenu-recette">Contenu : </label></p>
			<?php echo '<textarea id="contenu-recette" name="contenu_recette">'.$recettesDetail[0]['REC_RESUME'].'</textarea>'; ?>
		</div>
		<fieldset>
			<legend>choisissez une categorie</legend>
			<div>
				<label for="entree-recette">entree</label>
				<?php
				if($recettesDetail[0]['CAT_INTITULE'] == 'entree')
					echo '<input checked id="entree-recette" value="1" type="radio" name="categorie_recette">';
				else 
					echo '<input id="entree-recette" value="1" type="radio" name="categorie_recette">';
				?>
			</div>
			<div>
				<label for="plat-recette">plat</label>
				<?php
				if($recettesDetail[0]['CAT_INTITULE'] == 'plat')
					echo '<input checked id="plat-recette" value="2" type="radio" name="categorie_recette">';
				else 
					echo '<input id="plat-recette" value="2" type="radio" name="categorie_recette">';
				?>
				
			</div>
			<div>
				<label for="dessert-recette">dessert</label>
				<?php
				if($recettesDetail[0]['CAT_INTITULE'] == 'dessert')
					echo '<input checked id="dessert-recette" value="3" type="radio" name="categorie_recette">';
				else 
					echo '<input id="dessert-recette" value="3" type="radio" name="categorie_recette">';
				?>
			</div>
		</fieldset>

		<div><?php
			if(!empty($ingredients)) {
				foreach($ingredients as $ingredient) {
					echo '<div><label for="'.$ingredient['ING_INTITULE'].'-recette-recette">'.$ingredient['ING_INTITULE'].' </label>';
					$contient = false;
					foreach($ingredientsRecette as $ingredientRecette) {
						if($ingredient['ING_ID'] == $ingredientRecette['ING_ID']) {
							$contient = true;
							echo '<input checked id="'.$ingredient['ING_INTITULE'].'-recette" value="'.$ingredient['ING_ID'].'" type="checkbox" name="ingredients_recette[]"></div>';
						}
					}
					if(!$contient)
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
$titre = 'Modification Recette';
require $GLOBALS['root'] . 'view/template.php';
?>
