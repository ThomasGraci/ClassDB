<?php // charge les données du client connecté
$infos_cli = new clientDB($db);
$infos_cli ->getInfosClient($_SESSION["id_client"]);
?>

<?php //mise à jour des infos (après vérification)
$erreur = 0;
$messageErreur = "";
if ($_POST) {
    if (empty($_POST["lbnom"])) {
        $erreur++;
        //$messageErreur .= "- Le champ nom est vide<br />";
        $_POST["lbnom"] = $infos_cli->get_nom();
    }
    if (empty($_POST["lbprenom"])) {
        $erreur++;
        //$messageErreur .= "- Le champ prenom est vide<br />";
        $_POST["lbprenom"] = $infos_cli->get_prenom();
    }
    if (empty($_POST["lbcp"])) {
        $erreur++;
        //$messageErreur .= "- Le champ code postal est vide<br />";
        $_POST["lbcp"] = $infos_cli->get_cp();
    }
    if (empty($_POST["lblocalite"])) {
        $erreur++;
        //$messageErreur .= "- Le champ localite est vide<br />";
        $_POST["lblocalite"] = $infos_cli->get_localite();
    }
    if (empty($_POST["lbrue"])) {
        $erreur++;
        //$messageErreur .= "- Le champ rue est vide<br />";
        $_POST["lbrue"] = $infos_cli->get_rue();
    }
    if (empty($_POST["lbnum"])) {
        $erreur++;
        //$messageErreur .= "- Le champ numero est vide<br />";
        $_POST["lbnum"] = $infos_cli->get_num();
    }
    if (empty($_POST["lbtel"])) {
        $erreur++;
        //$messageErreur .= "- Le champ telephone est vide<br />";
        $_POST["lbtel"] = $infos_cli->get_tel();
    }
    if ($erreur < 7) {
        //update dans la db
        //mise à jour de l'objet client
        $clientToRegister = new clientDB($db);
        $clientToRegister->setAllData($_POST["lbnom"], $_POST["lbprenom"], $_POST["lbcp"], $_POST["lblocalite"], $_POST["lbrue"], $_POST["lbnum"], $_POST["lbtel"]);
        $retour = $clientToRegister->update();
        if (empty($retour)) {
            echo '<div class="alert alert-success" role="alert">Mise à jour réussis</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">' . $retour . '</div>';
        }
    }else{
        $messageErreur .= "- Aucune mise à jour car aucun des champs n'a été modifié <br />";
        echo '<div class="alert alert-danger" role="alert">' . $messageErreur . '</div>';
    }
}
?>

<h2 id="titre_page" class="page-header">Profil</h2>

<form class="form-horizontal" action="#" method="post">
    <div class="form-group">
        <label for="lbnom" class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-10">
            <input type="nom" class="form-control" name="lbnom" id="lbnom" placeholder="<?php echo $infos_cli->get_nom(); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lbprenom" class="col-sm-2 control-label">Prénom</label>
        <div class="col-sm-10">
            <input type="prenom" class="form-control" name="lbprenom" id="lbprenom" placeholder="<?php echo $infos_cli->get_prenom(); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lbcp" class="col-sm-2 control-label">Code Postal</label>
        <div class="col-sm-10">
            <input type="code postal" class="form-control" name="lbcp" id="lbcp" placeholder="<?php echo $infos_cli->get_cp(); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lblocalite" class="col-sm-2 control-label">Localité</label>
        <div class="col-sm-10">
            <input type="localite" class="form-control" id="lblocalite" name="lblocalite" placeholder="<?php echo $infos_cli->get_localite(); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lbrue" class="col-sm-2 control-label">Rue</label>
        <div class="col-sm-10">
            <input type="rue" class="form-control" id="lbrue" name="lbrue" placeholder="<?php echo $infos_cli->get_rue(); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lbnum" class="col-sm-2 control-label">Numéro</label>
        <div class="col-sm-10">
            <input type="numero" class="form-control" id="lbnum" name="lbnum" placeholder="<?php echo $infos_cli->get_num(); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lbtel" class="col-sm-2 control-label">Téléphone</label>
        <div class="col-sm-10">
            <input type="telephone" class="form-control" id="lbtel" name="lbtel" placeholder="<?php echo $infos_cli->get_tel(); ?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" id="modifier_info">Modifier</button>
        </div>
    </div>
</form>