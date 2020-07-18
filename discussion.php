<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Discussion</title>
    </head>


    <body>

        <!-- Afficher le contenu d'un document CSV sous forme de discussion interactive et sécurisée. -->

        
        <!-- Ouvrir le document CSV (lecture). -->
        <?php $file = fopen('discussion.csv', 'r'); 

        // Pour chaque ligne (si la ligne n'est pas vide) 
        //fgetcsv() retourne NULL si un paramètre handle invalide est fourni 
        //ou FALSE en cas d'autres erreurs, y compris la fin du fichier.
         while ($data = fgetcsv($file)) { 

            // Définir des variables aux nom précis.
            $message = array(
                'author' => $data[0],
                'theme' => $data[1],
                'group' => $data[2],
                'text' => $data[3],
            );
            ?> 
            
            <!-- Vérifier les données reçues. -->
            <?php if (isset($message['author']) && isset($message['theme']) && isset($message['group']) && isset($message['text'])) { ?>
            
            <!-- Selon le groupe private ou public la couleur du cadre change. -->
                <div class=<?php echo '"' . strtolower(strip_tags($message['group'])) . '"'; ?> >
                    <p>
                        <!-- Afficher le contenu : ! htmlspecialchars() ; nl2br()
                        Discussion créée par Auteur (strong) -->
                        Discussion créée par <strong><?php echo nl2br(htmlspecialchars($message['author'])); ?></strong><br/>

                        <!-- (Sur le thème : Thème(strong)) -->
                        (Sur le thème : <strong><?php echo nl2br(htmlspecialchars($message['theme'])); ?></strong>)<br/>

                        <!-- Dans le groupe Groupe -->
                        Dans le groupe <?php echo nl2br(htmlspecialchars($message['group'])); ?>

                    </p>

                    <p>
                        <!-- Texte (max 300) -->
                        <em>" <?php echo nl2br(htmlspecialchars($message['text'])); ?> "</em>
                    </p>
                </div><!-- class="GROUP" -->
                
            <?php }
        } ?>
        
        <!-- Fermer le document CSV. -->
        <?php fclose($file); ?>

        <?php if (isset($_GET['sent'])) { ?>
            <!-- Le message est affiché quelque soit la valeur de $_GET['envoi']. -->
            
            <p id=fail>
                Un ou plusieurs champs sont vides. L'envoi a échoué.
            </p>
            
        <?php } ?>

            
        <!-- Ajouter un commentaire. -->
        <div id="formulaire">
            <p>
                Ajouter un commentaire
            </p>
        
            <!-- Formulaire : -->
            <form action="post_discussion.php" method="POST">
                <p>
                    <!-- Nom d'utilisateur (texte court) -->
                    <label>Nom d'utilisateur<input type="text" name="author"></label>

                    <!-- Thème (menu déroulant) --> 
                    <select id="theme" name="theme">
                    <option value="Activité Physique">Activité Physique</option>
                    <option value="Nutrition">Nutrition</option>
                    <option value="Hygiène de vie">Hygiène de vie</option>
                    </select> 

                    <!-- Groupe (radiobutton) -->
                    <input type="radio" id="public" name="group" value="Public">
                    <label for="public">Public</label>
                    <input type="radio" id="private" name="group" value="Private">
                    <label for="private">Private</label>
                </p>

                <p>
                    <!-- Message (Texte long) -->
                    <label>Message<br/></label>
                    <textarea name="text" maxlength="300"></textarea>
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