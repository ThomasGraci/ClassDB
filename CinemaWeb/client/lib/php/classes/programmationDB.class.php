<?php

class ProgrammationDB extends programmation {

    private $_db;
    private $_progArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getArrayProg() {
        $dataOut = array();
        $i = 0;
        try {
            $query = "select p.pfilm, p.psalle, p.pseance, f.duree, f.description, f.affiche from programmation p, film f where p.pfilm = f.titre order by p.pfilm;";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (Exception $ex) {
            $erreurRetour = $ex->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $dataOut[$i]["pfilm"] = $data["pfilm"];
            $dataOut[$i]["psalle"] = $data["psalle"];
            $dataOut[$i]["pseance"] = $data["pseance"];
            $dataOut[$i]["duree"] = $data["duree"];
            $dataOut[$i]["description"] = $data["description"];
            $dataOut[$i]["affiche"] = $data["affiche"];
            $i++;
        }
        return $dataOut;
    }

    public function verifProg($pfilm, $psalle, $pseance, $client) {
        try {
            $query = "insert into achat(id_ticket, id_client, date_achat)"
                    . "select t.id_ticket, c.id_client, current_date from programmation p, ticket t, client c"
                    . "where (p.pfilm = '" . $pfilm . "' and p.psalle = " . $psalle . " and p.pseance = '" . $pseance . "' and c.id_client = " . $client . ")"
                    . "and (p.id_prog = t.id_prog);";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0);
            print_r($retour);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
