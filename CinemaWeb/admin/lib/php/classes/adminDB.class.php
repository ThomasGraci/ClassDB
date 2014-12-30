<?php

class adminDB extends admin{
    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function logAdmin($nom_admin,$password){
        $erreurRetour = "";
        $i = 0;
        try {
            $query = "select * from admin where nom_admin= '" . $nom_admin . "' and password= '" . $password . "';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (Exception $ex) {
            $erreurRetour = $ex->getMessage();
        }
        $this->_id_admin = -1;
        while($data = $resultset->fetch())
        {
            $this->_id_admin = $data["id_admin"];
            $this->_nom_admin = $data["nom_admin"];
            $this->_password = $data["password"];
            
        }
    }
}
