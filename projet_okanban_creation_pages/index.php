<?php

// Règle en MVC
// pour créer/ajouter une page :
//   1. ajouter une route
//   2. je définis une méthode de controller
//   2b. Si besoin, créer la classe controller
//   3. je crée la vue

// Inclusion des classes nécessaires
require(__DIR__.'/controllers/MainController.php');
require(__DIR__.'/controllers/ListController.php');
require(__DIR__.'/controllers/PagesController.php');
require(__DIR__.'/inc/Database.php');
require(__DIR__.'/inc/altorouter/AltoRouter.php');
require(__DIR__.'/models/ListModel.php');



// Pour mettre en place le système de routage d'Altorouter,
// on crée une instance de la classe AltoRouter
$router = new AltoRouter();

// Mapper les Routes
// appel de la méthode "map" pour définir chaque route
// ->map(
//     méthode HTTP,
//     pattern d'URL,
//     Nom de controller#nom de méthode,
//     nom de la route (qui doit être unique)
// )
// Page d'accueil
$router->map('GET', '/', 'MainController#home', 'main_home');
// Page de contact
$router->map('GET', '/contact', 'MainController#contact', 'main_contact');
// Route pour une liste dooné (id dynamique)
$router->map('GET', '/list/[i:id]', 'ListController#list', 'list_list');
// Route pour un formulaire (soumis) de modification d'une liste
$router->map('POST', '/list/[i:id]/update', 'ListController#updateList', 'list_updatelist');
// Page de conditions générales
$router->map('GET', '/legacy', 'PagesController#legacy', 'main_legacy');
// Page about
$router->map('GET', '/about', 'PagesController#about', 'main_about');

// On définit le chemin dans lequel se trouve notre projet
$router->setBasePath($_SERVER['BASE_URI']);

// Essaie de trouver la route correspondant à l'URL courante
$match = $router->match();
//var_dump($match);exit; // debug

// On check chaque route pour savoir si elle correspond au pattern d'URL courant
if ($match !== false) {
    // On récupère la string 'Controller#Method'
    $matchingValue = $match['target'];

    // J'extraie le nom du controller et le nom de la méthode
    $infos = explode('#', $matchingValue);
    $controllerName = $infos[0];
    $methodName = $infos[1];

    // Alors, on instancie le controller (son nom est dynamique)
    $controller = new $controllerName();
    // Puis on appelle la méthode du controller (son nom est dynamique)
    // $match['params'] en argument de la méthode pour transmettre toutes les données dynamiques de l'URL
    $controller->$methodName($match['params']);
}
// Si on ne trouve pas de route correspondante
else {
    header('Location: ../HTML/error404.html');
  exit();
}
