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
            $query = "select f.titre, sa.numero, se.h_debut, f.duree, f.description, f.affiche from programmation2 p, film f, salle sa, seance se " 
                    ."where p.pfilm = f.id_film and p.psalle = sa.id_salle and p.pseance = se.id_seance order by p.pfilm;";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (Exception $ex) {
            $erreurRetour = $ex->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $dataOut[$i]["titre"] = $data["titre"];
            $dataOut[$i]["numero"] = $data["numero"];
            $dataOut[$i]["h_debut"] = $data["h_debut"];
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
                    . "select t.id_ticket, c.id_client, current_date from programmation2 p, ticket t, client c, film f, salle sa, seance se"
                    . "where (p.pfilm = '" . $pfilm . "' and p.psalle = " . $psalle . " and p.pseance = '" . $pseance . "' and c.id_client = " . $client . ")"
                    . "and (p.id_prog = t.id_prog and p.pfilm = f.id_film and p.psalle = sa.id_salle and p.pseance = se.id_seance);";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $retour = $resultset->fetchColumn(0);
            print_r($retour);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
