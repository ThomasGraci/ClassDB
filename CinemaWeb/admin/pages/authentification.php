<?php
/*if(isset($_POST['submit_login'])) {
    $mg = new Login($db);
    $mg->isAdmin($_POST['login'],$_POST['password']);
    
    if(0==1) {
        $_SESSION['admin']=1;
        $message="Authentifié!";
        echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=http://127.0.0.1/projects/Websites/CinemaWeb/admin/index.php">';
    } 
    else {
        $message="Données incorrectes";
    }
}*/

$erreur = 0;
$messageErreur = "";
if ($_POST) {
    if (empty($_POST["inputLogin"])) {
        $erreur++;
        $messageErreur .= "- Le champ Login est vide<br />";
    }
    if (empty($_POST["inputPassword"])) {
        $erreur++;
        $messageErreur .= "- Le champ Password est vide<br />";
    }
    if ($erreur == 0) {
        //vérifier dans la db si infos de connexion sont valides        
        $adminToRegister = new adminDB($db);
        $adminToRegister->logAdmin($_POST["inputLogin"], $_POST["inputPassword"]);
        echo $adminToRegister->get_id_admin();
        if ($clientToRegister->get_id_admin() != -1) {
            echo '<div class="alert alert-success" role="alert">Bonjour '.$adminToRegister->get_nom_admin().', vous êtes maintenant online</div>';
            $_SESSION["id_admin"] = $adminToRegister->get_id_admin();
            echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=http://127.0.0.1/projects/Websites/CinemaWeb/admin/index.php">';
        } else {
            echo '<div class="alert alert-danger" role="alert">Connexion refusée</div>';
        }
    }
}
?>
<section id="message"><?php if(isset($message)) print $message;?></section>
<fieldset id="fieldset_login">
    <legend>Authentifiez-vous</legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth">
        <table>
            <tr>
                <td>Login<?php //print " session : ".$_SESSION['admin'];?></td>
                <td><input type="text" id="login" name="inputLogin" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="password" name="inputPassword" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit_login" id="submit_login" value="Login" />
                    <input type="reset" id="annuler" value="Annuler" />
                </td>	
            </tr>
        </table>	
    </form>
</fieldset>
<div id="shadow" class="popup"></div>

