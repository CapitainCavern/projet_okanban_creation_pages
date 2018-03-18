<?php

class ListController {
    public function list($params) {
        // Je récupère l'id de l'URL
        $currentListId = $params['id'];

        // Je récupére l'objet ListModel correspondant à l'id
        $model = new ListModel();
        $currentListModel = $model->read($currentListId);

        // Appel la méthode s'occupant de la partie views
        $this->show('list', [
            'listId' => $currentListModel->id,
            'listName' => $currentListModel->name,
        
        ]);
    }

    // Méthode permettant de factoriser le code appelant les views
    private function show($viewName, $viewVars=array()) {
        // $viewVars est disponible dans chaque fichier de vue
        // Inclusion des views
        include(__DIR__.'/../views/header.php');
        include(__DIR__.'/../views/'.$viewName.'.php');
        include(__DIR__.'/../views/footer.php');
        include(__DIR__.'/../views/about.php');
        include(__DIR__.'/../views/legacy.php');



    }
}