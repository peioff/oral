# Bienvenue

Bienvenue sur mon repository Git.  
Ce repository contient le code necessaire à l'éxécution de l'application web crée lors de mon cursus de formation et nommée ECF-Arcadia.  
Ce fichier README.md contient aussi les instructions à suivre afin d'être en mesure de déployer l'application web en local.  

LE CLONAGE OU LE TELECHARGEMENT DU CODE POUR UNE EXECUTION LOCALE DOIT SE FAIRE DEPUIS LA BRANCHE DEV  

LE CLONAGE OU LE TELECHARGEMENT DU CODE POUR UNE EXECUTION LOCALE DOIT SE FAIRE DEPUIS LA BRANCHE DEV

# Instructions de déploiement en local

## 1-Télécharger et installer XAMPP
[XAMPP-Download](https://www.apachefriends.org/fr/index.html)
## 2 - Télécharger et installer MySQL
[MySQL-Download](https://dev.mysql.com/downloads/mysql/)

## 3-Configurer les variables d'environement
Si vous êtes sur un environement Windows, assurer vous que les variables d'environement PHP, PostgreSQL et MySQL server sont ajoutées.

### Pour vérifier :
Dans parametres, rechercher : "Modifier les variables d'environnement pour votre compte"  
Dans la section "Variables utilisateur pour "Nom d'utilisateur", selectionner "Path" et cliquer sur "Modifier..."  
Vérifier que les chemins "C:\xampp\php" , "C:\xampp\mysql\bin", "C:\Program Files\MySQL\MySQL Server 8.0\bin" et "C:\Program Files\PostgreSQL\16\bin" sont bien présents sinon, ajouter manuellement en cliquant sur "Nouveau"

## 4 - Télécharger ou cloner le repository git

Choisir une méthode afin de récupérer le code source.

<<<<<<< HEAD
  ## 5 - Déplacer le dosssier récupéré dans : " C:\\...\XAMPP\htdocs "  

  ## 6 - Modifier le fichier __config.php à la racine du dossier  
=======
## 5 - Déplacer le dosssier récupéré dans : " C:\\...\XAMPP\htdocs "
>>>>>>> Home-OnClickAnimal

## 6 - Modifier le fichier __config.php à la racine du dossier

Il faut modifier dans ce fichier les deux variables HOST et ROOT.

```
//Remplacer
        define('HOST', 'http://'.$host.'/ecf/');
        define('ROOT', $root.'/ecf/');
//Par (ne pas oublier le / à la fin!)
        define('HOST', 'http://'.$host.'/[nom_du_dossier_cloné_ou_téléchargé]/');
        define('ROOT', $root.'/[nom_du_dossier_cloné_ou_téléchargé]/');
```

## 7 - Lancer XAMPP Control Panel

Une fois lancé, activer le module Apache en cliquand sur "Start"  
activer le module MySQL en cliquant sur "Start"

## 8 - Importer database.sql dans PhpMyAdmin

Il est maintenant necessaire d'importer la base de donnée fournie.  
Le fichier "database.sql" se trouve à la racine du dossier.  
Dans XAMPP, dans le module MySQL, cliquer sur "Admin"  
Dans la fenêtre principale, cliquer sur "Importer"  
Selectionner "database.sql" et cliquer sur "Importer"

## 9 - Naviguer

L'application web est maintenant déployée, elle est accessible via l'URL :
"http://localhost/nom-du_dossier_cloné_ou_téléchargé/"


  

  

  

  

  
  
  




