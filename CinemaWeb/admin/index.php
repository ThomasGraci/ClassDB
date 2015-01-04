<!doctype html>
<?php
//INDEX ADMIN CINEMAWEB
include ('./lib/php/liste_includeAdmin.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();
$scripts = array(); //stocker tous les fichiers d'inlinemod pour les lier plus loin
$i = 0;
?>

<html>
    <head>
        <title>CinemaWeb</title>
        <meta charset='UTF-8'/>
        <link rel="stylesheet" type="text/css" href="./lib/css/style_pc.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/style_jquery.css"/>
        <link rel="stylesheet" type="text/css" href="./lib/css/mediaqueries.css"/>
        <!-- Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">
        <!-- Optional theme -->
        <!-- <link rel="stylesheet" href="../Bootstrap/css/bootstrap-theme.min.css">-->

        <script src="../jquery/jquery-1.11.js"></script>        
        <script type="text/javascript" src="./lib/js/fonctionsJqueryAdmin.js"></script> 
        
        
    </head>

    <body>    
        <section id="page">              
            <header id="header">
                <img src="./images/banniere-cine-bande.png" alt="Banniere" id="image_header"/><br />	
                <section id="deconnexion">
                    <?php
                    if (isset($_SESSION['admin'])) {
                        ?><a href="./lib/php/disconnect.php">Déconnexion</a>
                        <?php
                    }
                    ?>
                </section>

            </header>

            <?php if (!isset($_SESSION['admin'])) {
                ?>
                <section id="login_form">
                    <?php
                    require './pages/authentification.php';
                    ?> </section><?php
            } else {
                ?>
                <section id="colGauche">
                    <nav>
                        <ul id="menu"> 
                            <?php
                            if (file_exists('./lib/php/menuAdmin.php')) {
                                include ('./lib/php/menuAdmin.php');
                            }
                            ?>

                        </ul>
                    </nav>
                </section>

                <section id="contenu">



                    <div id="main">
                        <?php
                        if (!isset($_SESSION['page'])) {
                            $_SESSION['page'] = "accueil";
                        }
                        if (isset($_GET['page'])) {
                            $_SESSION['page'] = $_GET['page'];
                        }
                        $chemin = './pages/' . $_SESSION['page'] . '.php';
                        if (file_exists($chemin)) {

                            include ($chemin);
                        }
                        ?>                      
                    </div>

                </section>		

                <footer>Editeur responsable Thomas.Graci@CinemaWeb.com</footer>
                <?php
            }
            ?>
    </body>
</html>