<?php
$erreur = 0;
$messageErreur = "";
if ($_POST) {
    if (empty($_POST["inputNom"])) {
        $erreur++;
        $messageErreur .= "- Le champ nom est vide<br />";
    }
    if (empty($_POST["inputPrenom"])) {
        $erreur++;
        $messageErreur .= "- Le champ prenom est vide<br />";
    }
    if (empty($_POST["inputCode"])) {
        $erreur++;
        $messageErreur .= "- Le champ code postal est vide<br />";
    }
    if (empty($_POST["inputLocalite"])) {
        $erreur++;
        $messageErreur .= "- Le champ localite est vide<br />";
    }
    if (empty($_POST["inputRue"])) {
        $erreur++;
        $messageErreur .= "- Le champ rue est vide<br />";
    }
    if (empty($_POST["inputNum"])) {
        $erreur++;
        $messageErreur .= "- Le champ numero est vide<br />";
    }
    if (empty($_POST["inputTel"])) {
        $erreur++;
        $messageErreur .= "- Le champ telephone est vide<br />";
    }
    if ($erreur == 0) {
        //insertion dans la db
        //création de l'objet client
        $clientToRegister = new clientDB($db);
        $clientToRegister->setAllData($_POST["inputNom"], $_POST["inputPrenom"], $_POST["inputCode"], $_POST["inputLocalite"], $_POST["inputRue"], $_POST["inputNum"], $_POST["inputTel"]);
        $retour = $clientToRegister->create();
        if (empty($retour)) {
            echo '<div class="alert alert-success" role="alert">Inscription réussis</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">' . $retour . '</div>';
        }
    }
}
?>
<?php
if ($erreur > 0) {
    echo '<div class="alert alert-danger" role="alert">' . $messageErreur . '</div>';
}
?>
<h2 id="titre_page" class="page-header">Inscription</h2>

<form class="form-horizontal" action="#" method="post">
    <div class="form-group">
        <label for="inputNom" class="col-sm-2 control-label">Nom</label>
        <div class="col-sm-10">
            <input type="" class="form-control" id="inputNom" name="inputNom" placeholder="Nom">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPrenom" class="col-sm-2 control-label">Prénom</label>
        <div class="col-sm-10">
            <input type="" class="form-control" id="inputPrenom" name="inputPrenom" placeholder="Prénom">
        </div>
    </div>
    <div class="form-group">
        <label for="inputCode" class="col-sm-2 control-label">Code Postal</label>
        <div class="col-sm-10">
            <input type="" class="form-control" id="inputCode" name="inputCode" placeholder="Code Postal">
        </div>
    </div>
    <div class="form-group">
        <label for="inputLocalite" class="col-sm-2 control-label">Localité</label>
        <div class="col-sm-10">
            <input type="" class="form-control" id="inputLocalite" name="inputLocalite" placeholder="Localité">
        </div>
    </div>
    <div class="form-group">
        <label for="inputRue" class="col-sm-2 control-label">Rue</label>
        <div class="col-sm-10">
            <input type="" class="form-control" id="inputRue" name="inputRue" placeholder="Rue">
        </div>
    </div>
    <div class="form-group">
        <label for="inputNum" class="col-sm-2 control-label">Numéro</label>
        <div class="col-sm-10">
            <input type="" class="form-control" id="inputNum" name="inputNum" placeholder="Numéro">
        </div>
    </div>
    <div class="form-group">
        <label for="inputTel" class="col-sm-2 control-label">Téléphone</label>
        <div class="col-sm-10">
            <input type="" class="form-control" id="inputTel" name="inputTel" placeholder="Téléphone">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" id="s_inscrire">S'inscrire</button>
        </div>
    </div>
</form>