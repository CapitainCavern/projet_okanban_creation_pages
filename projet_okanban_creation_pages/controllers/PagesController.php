<?php

class PagesController {

    // Méthode gérant la home
    public function home() {
        // Appel la méthode s'occupant de la partie views
        $this->show('home');
    }

    // Méthode gérant la page de contact
    public function contact() {
        // Appel la méthode s'occupant de la partie views
        $this->show('contact');
    }

    public function about() {
        // Appel la méthode s'occupant de la partie views
        $this->show('about');
    }

    public function legacy() {
        // Appel la méthode s'occupant de la partie views
        $this->show('legacy');
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

 ?>