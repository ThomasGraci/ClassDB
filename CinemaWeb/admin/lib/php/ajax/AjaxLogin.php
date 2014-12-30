<?php
session_start();
header('Content-Type: application/json');
//indique que le retour doit $etre traité en json
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/login.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);

try{    
    $mg = new Login($db);
    $retour=$mg->isAdmin($_POST['login'],$_POST['password']);
    if($retour==1) {
        $_SESSION['admin']=1;
        $_SESSION['page']="accueil";
               //print "session : ".$_SESSION['admin'];
    }
    print json_encode(array('retour' => $retour)); 
}
catch(PDOException $e){}

?>