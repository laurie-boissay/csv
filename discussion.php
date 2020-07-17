<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Discussion</title>
	</head>


	<body>

		<!-- Afficher le contenu d'un document CSV sous forme de discussion interactive et sécurisée. -->

		<?php
		// Ouvrir le document CSV (lecture).
		$file = fopen("discussion.csv","r");

		// Pour chaque ligne :
		while(!feof($file))
		{
			// Ligne en cours.
			$data = fgetcsv($file);

			// Définir des variables aux nom précis.
			//$message = array(
				//'author' => $data[0],
				//'theme' => $data[1],
				//'group' => $data[2],
				//'text' => $data[3],
			//);

			//echo $message['author']; 
			// Notice: Trying to access array offset on value of type bool 
			// in /opt/lampp/htdocs/test_t/discussion.php on line 24, 25, 26, 27
			
			// Vérifier les données reçues.
			if (isset($data[0]) && isset($data[1]) && isset($data[2]) && isset($data[3]))
			{
		?>		<!-- Selon le groupe Private ou Public la couleur du cadre change. -->
				<div class=<?php echo '"' . strip_tags($data[2]) . '"'; ?> >
					<p>
						<!-- Afficher le contenu : ! htmlspecialchars() ; nl2br()
						Discussion créée par Auteur (gras) -->
						Discussion créée par <strong><?php echo htmlspecialchars($data[0]); ?></strong><br/>

						<!-- (Sur le thème : Thème(gras)) -->
						(Sur le thème : <strong><?php echo htmlspecialchars($data[1]); ?></strong>)<br/>

						<!-- Dans le groupe Groupe -->
						Dans le groupe <?php echo htmlspecialchars($data[2]); ?>
					</p>

					<p>
						<!-- Texte (max 300) -->
						<em>" <?php echo nl2br(htmlspecialchars($data[3])); ?> "</em>
					</p>
				</div><!-- class="GROUP" -->
				<?php
			}
		}
		
		// Fermer le document CSV.
		fclose($file);

		if (isset($_GET['envoi'])) 
		//Le message est affiché quelque soit la valeur de $_GET['envoi'].
		{
			?>
			<p id=echec>
				Un ou plusieurs champs sont vides. L'envoi a échoué.
			</p>
			<?php
		}

			?>
		<!-- Ajouter un commentaire. -->
		<div id="formulaire">
			<p>
				Ajouter un commentaire
			</p>
		
			<!-- Formulaire : -->
			<form action="post_discussion.php" method="POST">
				<p>
					<!-- Nom d'utilisateur (texte court) -->
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

				<p>
					<!-- Message (Texte long) -->
					<label>Message<br/></label>
					<textarea name="message" maxlength="300"></textarea>
				</p>

				<!-- Compteur de carractères -->

				<p>
					<!-- Submit post_discussion.php (valider) -->
					<input type="submit">
				</p>
			</form>
		</div><!-- id="formulaire" -->
	</body>
</html>