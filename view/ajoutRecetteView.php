<!DOCTYPE html>
<html>
<head>
    <title>Ajout d'une recette</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Ajout d'une recette</h1>

	<form enctype="multipart/form-data" method="post" action="/index.php?action=ajout_recette">
		<div>
			<label for="titre-recette">Titre : </label></p>
			<input id="titre-recette" type="text" name="titre_recette">
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
				<label for="entree-recette">entree</label></p>
				<input id="entree-recette" value="1" type="radio" name="categorie_recette">
			</div>
			<div>
				<label for="plat-recette">plat</label></p>
				<input id="plat-recette" value="2" type="radio" name="categorie_recette">
			</div>
			<div>
				<label for="dessert-recette">dessert</label></p>
				<input id="dessert-recette" value="3" type="radio" name="categorie_recette">
			</div>
		</fieldset>
		<div>
			<input placeholder="choisir une image" type="file" id="image-recette" name="image_recette" accept="image/*">
		</div>
		<input type="submit" value="Publier">
	</form>

</body>
</html>
