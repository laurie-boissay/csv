# csv
Lire et écrire dans un CSV en PHP.

Après une folle expérience ou j'ai du apprendre le PHP en 5 jours et quelques notions de SQL. Je ne maîtrise pas ce langage, je veux bien des critiques. Merci.

18/07/20 : 

- Ajout d'un fichier CSV enregistré sous Linux. Mon fichier de test précédent provoquait des erreurs incompréhensibles duês à priori au format des fins de lignes.

Sur les conseils de plusieurs personnes : 

- Suppression des deux lignes de code qui ajoutaient un ligne vide au CSV. Manipulation non nécessaire après le changement de fichier CSV.

- Diminution de la taille du code PHP dans le code HTML ;

- Suppression des guillements simples dans le PHP pour le différencier du HTML ;

- Donner des noms plus claires aux valeurs des tableau (en cours) : data[0] doit devenir message['author'] ;

- AND devient && et OR devient || pour plus de lisibilité ;

- Suppression de la ligne isset() redondante avec la ligne empty() ;

- Il n'y a plus besoin de cliquer sur un bouton pour revenir à la discussion après avoir ajouté un message ;

- L'affichage des erreurs d'envoi de messages se fait sur la page discussion ;

- Correction du code pour validation W3C ;

- Modification du code (en cours) pour correspondre aux standards PSR 0, 1 et 2 ;

- Axe d'amélioration : ajouter une option requiered pour ne pas perdre les données envoyées par l'utilisateur quand des champs sont vides.

       
   
  
