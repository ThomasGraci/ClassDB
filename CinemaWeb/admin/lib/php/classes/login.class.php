<?php

class Login {

    private $_db;
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    function isAdmin($login,$password) {
        $retour=array();
        try {
            $query="select verifier_connexion(:nom_admin,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':nom_admin',$_POST['login']);
            $sql->bindValue(':password',md5($_POST['password']));  
            $sql->execute();
            
            $retour = $sql->fetchColumn(0);                  
        } catch(PDOException $e) {
            print "Echec de la requ&ecirc;te.".$e;
        }
        
        return $retour;
    }
}
