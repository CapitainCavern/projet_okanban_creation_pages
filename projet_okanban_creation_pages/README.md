# Projet oKanban

## MVC

On va préparer notre projet pour qu'il suive l'architecture MVC :

- créer le répertoire `controllers`
- créer le répertoire `models`
- créer le répertoire `views`

On peut aussi commencer à créer certains fichiers :

- `controllers/MainController.php`
- `views/header.php`
- `views/home.php`
- `views/footer.php`

## Database

- copier-coller la classe `inc/Database.php` utilisée dans le projet _coffee shop_

## FrontController

- copier-coller notre fichier `.htaccess` utilisé dans le projet _coffee shop_
- créer le fichier `index.php` à la racine du projet => le FrontController

## Routes

On va mettre en place un système de routage + dynamique que des if et des elseif :

- stocker nos routes dans un `array`
- parcourir chaque élément du `array`
  - si l'URL correspond, alors
    - instancier le controller donné
    - appeler la méthode donnée
  - sinon, passer à l'éléménent suivant du `array`
- si aucun élément ne correspond à l'URL => `404`
