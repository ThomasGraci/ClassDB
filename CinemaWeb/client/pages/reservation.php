<?php
/*$mg = new filmDB($db);
$liste_film = $mg->getArrayFilm();
$nbr = count($liste_film);*/

$erreur = 0;
$messageErreur = "";
if ($_POST) {
    if (empty($_POST["inputTitre"])) {
        $erreur++;
        $messageErreur .= "- Le champ titre est vide<br />";
    }
    if (empty($_POST["inputSalle"])) {
        $erreur++;
        $messageErreur .= "- Le champ salle est vide<br />";
    }
    if (empty($_POST["inputSeance"])) {
        $erreur++;
        $messageErreur .= "- Le champ seance est vide<br />";
    }
    if ($erreur == 0) {
        //vérifier dans la db si infos de connexion sont valides        
        $progtoverify = new ProgrammationDB($db);
        if ($progtoverify->verifProg($_POST["inputTitre"], $_POST["inputSalle"], $_POST["inputSeance"],$_SESSION["id_client"])) {
            echo '<div class="alert alert-success" role="alert">Achat effectué</div>';            
                        
        } else {
           echo '<div class="alert alert-danger" role="alert">Impossible de trouver la programmation souhaitée dans la base de donnée</div>'; 
        }
    }
}
?>
<?php
if ($erreur > 0) {
    echo '<div class="alert alert-danger" role="alert">' . $messageErreur . '</div>';
}
?>
<h2 id="titre_page" class="page-header">Acheter un ticket</h2>

<form class="form-horizontal" action="#" method="post">
    <div class="form-group">
        <label for="inputTitre" class="col-sm-2 control-label">Titre du film</label>
        <div class="col-sm-10">
            <input type="titre" class="form-control" name="inputTitre" id="inputTitre" placeholder="Titre du film">
        </div>
    </div>
    <div class="form-group">
        <label for="inputSalle" class="col-sm-2 control-label">Salle</label>
        <div class="col-sm-10">
            <input type="salle" class="form-control" name="inputSalle" id="inputSalle" placeholder="Salle">
        </div>
    </div>
    <div class="form-group">
        <label for="inputSeance" class="col-sm-2 control-label">Séance</label>
        <div class="col-sm-10">
            <input type="seance" class="form-control" name="inputSeance" id="inputSeance" placeholder="Séance">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" id="seconnecter">Réserver</button>
        </div>
    </div>
</form>
