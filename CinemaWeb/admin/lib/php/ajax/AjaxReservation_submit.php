<?php
header('Content-Type: application/json');
//indique que le retour doit $etre traité en json
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/reservation.class.php';
require '../classes/reservationManager.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);

try{
    $mg = new ReservationManager($db);
    if(!isset($_GET['regime'])) {
        $_GET['regime']=FALSE;
    }
    $retour=$mg->addReservation($_GET);
    print json_encode(array('retour' => $retour)); 
}
catch(PDOException $e){}
?>
