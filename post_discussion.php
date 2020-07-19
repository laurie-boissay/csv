<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
    </head>

    <body>

        <?php

        // Vérifier la validité (aucun champs vides) :
        if (empty($_POST['author']) || empty($_POST['theme']) || empty($_POST['group']) || empty($_POST['text'])) {
            // Envoi statut erreur.
            header('Location: discussion.php?sent=false');
        }

        else {
            // Le fichier CSV doit être écrit sous Linux pour que ce code fonctionne sur un serveur Linux.

            // Ouvrir le document CSV (écriture);
            $file = fopen('discussion.csv','a');
          
            // Enregistrer;
            fputcsv($file, $_POST);
        
            // Fermer le document CSV;
            fclose($file);

            // Message confirmation;
            header('Location: discussion.php');
        }
        ?>
    </body>
</html>





