<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Discussion</title>
	</head>


	<body>
		<?php
		// ___________ Créer un chat à partir d'un document CSV. _______________


		// Ouvrir le document CSV (lecture)
		$file = fopen("discussion.csv","r");

		// Pour chaque ligne :
		while(!feof($file))
		{
			// Ligne en cours.
			$donnees = fgetcsv($file);

			if (isset($donnees[0]) AND isset($donnees[1]) AND isset($donnees[2]) AND isset($donnees[3]))
			{
				// Afficher le texte : ! htmlspecialchars() ; nl2br()
				// Discussion créée par Auteur (gras)
				echo '<div class="' . strip_tags($donnees[2]) . '"><p>Discussion créée par <strong>' . htmlspecialchars($donnees[0]) . '</strong><br/>';

				// (Sur le thème : Thème(gras))
				echo '(Sur le thème : <strong>' . htmlspecialchars($donnees[1]) . '</strong>)<br/>';

				// Dans le groupe Groupe
				echo 'Dans le groupe ' . htmlspecialchars($donnees[2]) . '</p>';

				// Texte (max 300)
				echo '<p><em>" ' . nl2br(htmlspecialchars($donnees[3])) . ' "</em></p></div>';
			}
		}
		
		// Fermer le document CSV
		fclose($file);


		// Ajouter un commentaire
		echo '<div id="formulaire"><p>Ajouter un commentaire</p>';
		?>
		<!-- Formulaire : -->
		<form action="post_discussion.php" method="POST">

		<!-- Nom d'utilisateur (texte court) -->
		<p>
			<label>Nom d'utilisateur<input action="text" name="nom"></label>

			<!-- Thème (menu déroulant) --> 
			<select id="theme" name="theme">
			<option value="Activité Physique">Activité Physique</option>
			<option value="Nutrition">Nutrition</option>
			<option value="Hygiène de vie">Hygiène de vie</option>
			</select> 

			<!-- Groupe (radiobutton) -->
			<input type="radio" id="public" name="groupe" value="Public">
			<label for="public">Public</label>
			<input type="radio" id="private" name="groupe" value="Private">
			<label for="private">Private</label>				
		</p>

		<!-- Message (Texte long) -->
		<p>
			<label>Message<br/></label>
			<textarea name="message" maxlength="300"></textarea>
		</p>

		<!-- Compteur de carractères -->


		<!-- Submit post_discussion.php (valider) -->
		<p><input type="submit"></p>

		<?php
		echo '</div>';

		?>

		</form>
	</body>
</html>