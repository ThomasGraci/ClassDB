<?php
$erreur = 0;
$messageErreur = "";
if ($_POST) {
    if (empty($_POST["inputName"])) {
        $erreur++;
        $messageErreur .= "- Le champ nom est vide<br />";
    }
    if (empty($_POST["inputTel2"])) {
        $erreur++;
        $messageErreur .= "- Le champ téléphone est vide<br />";
    }
    if ($erreur == 0) {
        //vérifier dans la db si infos de connexion sont valides        
        $clientToRegister = new clientDB($db);
        $clientToRegister->logon($_POST["inputName"], $_POST["inputTel2"]);
        
        if ($clientToRegister->get_id_client() != -1) {
            echo '<div class="alert alert-success" role="alert">Bonjour '.$clientToRegister->get_prenom().', vous êtes maintenant connecté</div>';
            $_SESSION["id_client"] = $clientToRegister->get_id_client();
            echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=http://127.0.0.1/projects/Websites/CinemaWeb/client/index.php">';
        } else {
            echo '<div class="alert alert-danger" role="alert">Connexion refusée</div>';
        }
    }
}
?>
<?php
if ($erreur > 0) {
    echo '<div class="alert alert-danger" role="alert">' . $messageErreur . '</div>';
}
?>
<h2 id="titre_page" class="page-header">Connexion</h2>

<form class="form-horizontal" action="#" method="post">
    <div class="form-group">
        <label for="inputName" class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-10">
            <input type="nom" class="form-control" name="inputName" id="inputName" placeholder="Nom">
        </div>
    </div>
    <div class="form-group">
        <label for="inputTel2" class="col-sm-2 control-label">Téléphone</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="inputTel2" id="inputTel2" placeholder="Téléphone">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" id="seconnecter">Connexion</button>
        </div>
    </div>
</form>
