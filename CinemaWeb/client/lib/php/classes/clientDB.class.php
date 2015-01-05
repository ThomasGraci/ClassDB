<?php

class clientDB extends Client {
    
    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }

    public function create() {//création d'un client vers la base de donnée
        $erreutRetour = "";
        try {
            $query = "INSERT INTO client(nom, prenom, cp, localite, rue, num, tel) "
                    . "VALUES('" . $this->get_nom() . "', '" . $this->get_prenom() . "', '" . $this->get_cp() . "', '" . $this->get_localite() . "', "
                    . "'" . $this->get_rue() . "', '" . $this->get_num() . "', '" . $this->get_tel() . "');";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (Exception $ex) {
            $erreutRetour = $ex->getMessage();
        }
        return $erreutRetour;
    }
    
    public function update(){
        $erreutRetour = "";
        try {
            $query = "UPDATE client SET nom = '" . $this->get_nom() . "', prenom ='" . $this->get_prenom()."', cp =  '" . $this->get_cp() . "', "
                    ."localite ='" . $this->get_localite() . "', rue ='" . $this->get_rue() . "', num ='" . $this->get_num() . "', tel ='" . $this->get_tel() . "' "
                    . "WHERE id_client = ".$_SESSION["id_client"].";";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (Exception $ex) {
            $erreutRetour = $ex->getMessage();
        }
        return $erreutRetour;
    }

    public function logon($nom, $tel) {
        $erreurRetour = "";
        $i = 0;
        try {
            $query = "select * from client where nom= '" . $nom . "' and tel= '" . $tel . "';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (Exception $ex) {
            $erreurRetour = $ex->getMessage();
        }
        $this->_id_client = -1;
        while($data = $resultset->fetch())
        {
            $this->_id_client = $data["id_client"];
            $this->_nom = $data["nom"];
            $this->_prenom = $data["prenom"];
            $this->_cp = $data["cp"];
            $this->_localite = $data["localite"];
            $this->_rue = $data["rue"];
            $this->_num = $data["num"];
            $this->_tel = $data["tel"];
        }
    }
    
    public function getInfosClient($idcli){
        $erreurRetour = "";
        $i = 0;
        try {
            $query = "select * from client where id_client = ".$idcli.";";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (Exception $ex) {
            $erreurRetour = $ex->getMessage();
        }
        $this->_id_client = -1;
        while($data = $resultset->fetch())
        {
            $this->_id_client = $data["id_client"];
            $this->_nom = $data["nom"];
            $this->_prenom = $data["prenom"];
            $this->_cp = $data["cp"];
            $this->_localite = $data["localite"];
            $this->_rue = $data["rue"];
            $this->_num = $data["num"];
            $this->_tel = $data["tel"];
        }
    }

}

?>