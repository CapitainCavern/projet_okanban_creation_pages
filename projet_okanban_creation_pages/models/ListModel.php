<?php

// 1 classe correspondant au modèle pour la table lists
// M de MVC = Model
// 1 table = 1 Model = 1 Classe

class ListModel {
    // 1 champ/colonne => 1 propriété publique
    public $id;
    public $name;
    
    public function create() {
        
    }
    
    public function read($id) {
        $sql = "
            SELECT *
            FROM lists
            WHERE id = {$id}
        ";
        // Database::getPDO() est une méthode statique de la classe Database fournie dans "inc/Database.php"
        $pdoStatement = Database::getPDO()->query($sql);
        // Définie la classe que je veux comme résultat
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, 'ListModel');
        // Retourne tous les résultats sous forme d'array d'objets ListModel
        return $pdoStatement->fetch(PDO::FETCH_CLASS);
    }
    
    public function update() {
        
    }
    
    public function delete() {
        
    }