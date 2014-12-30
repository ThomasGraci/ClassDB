<?php

class ProgrammationDB extends programmation {

    private $_db;
    private $_progArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getArrayProg() {

        try {
            $query = "select pfilm, psalle, pseance from programmation order by pfilm;";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (Exception $ex) {
            $erreurRetour = $ex->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_progArray[] = new ProgrammationDB($data);
            } catch (PDOException $e) {

                print $e->getMessage();
            }
        }
        return $_progArray;
    }

    public function verifProg($pfilm, $psalle, $pseance, $client) {
        $erreurRetour = "";
        $query = "select verifProgrammation(:pfilm,:psalle,:pseance,:client) as retour";
        try {
            $id = null;
            $statement = $this->_db->prepare($query);
            $statement->bindValue(1, $pfilm, PDO::PARAM_STR);
            $statement->bindValue(2, $psalle, PDO::PARAM_INT);
            $statement->bindValue(3, $pseance, PDO::PARAM_STR);
            $statement->bindValue(4, $client, PDO::PARAM_INT);
            $statement->execute();
            $retour = $statement->fetchColumn(0);
            return $retour;
        } catch (PDOException $e) {
            $retour = 0;
            return $retour;
        }
    }

}
