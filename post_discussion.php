<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
	</head>


	<body>

		<?php

		// Vérifier la validité (aucun champs vides) :
		if (empty($_POST['nom']) || empty($_POST['theme']) || empty($_POST['groupe']) || empty($_POST['message']))
		{
			// Envoi statut erreur
			header('Location: discussion.php?envoi=False');
		}

		else
		{
			// Ouvrir le document CSV (écriture);
			$file = fopen("discussion.csv","a+");
			// Enregistrer;
			$void_line = array('', ''); // Les deux lignes que je souhaite améliorer ici
			fputcsv($file, $void_line); // et ici.
			fputcsv($file, $_POST);
		
			// Fermer le document CSV;
			fclose($file);

			// Message confirmation;
			header('Location: discussion.php');
		}

		?>
	</body>
</html>





