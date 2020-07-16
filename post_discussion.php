<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Vérification données</title>
	</head>


	<body>

		<?php

		// Vérifier la validité (aucun champs vides) :
		if( (!isset($_POST['nom']) OR !isset($_POST['theme']) OR !isset($_POST['groupe']) OR !isset($_POST['message'])) 
			OR (empty($_POST['nom']) OR empty($_POST['theme']) OR empty($_POST['groupe']) OR empty($_POST['message'])))
		{
			echo '<p>Vous n\'avez pas rempli tous les champs.</p>';
		}

		else
		{
			// Ouvrir le document CSV (écriture);
			$file = fopen("discussion.csv","a+");
			// Enregistrer;
			$void_line = array('', '');
			fputcsv($file, $void_line);
			fputcsv($file, $_POST);
		
			// Fermer le document CSV;
			fclose($file);

			// Message confirmation;
			echo '<p>C\'est envoyé !</p>';
		}

		?>

		<p><a href="discussion.php">Retour à la discussion</a></p>

	</body>
</html>





