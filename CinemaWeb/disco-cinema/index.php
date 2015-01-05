<!doctype html>
<?php
include ('./lib/php/Cliste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
session_start();

$scripts = array();
$i = 0;
?>

<html>
    <head>
        <title>CinemaWeb</title>
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/style_pc.css"/>
        <link rel="stylesheet" type="text/css" href="../admin/lib/css/mediaqueries.css"/>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="../Bootstrap/css/bootstrap-theme.min.css">

        <script src="../jquery/jquery-1.11.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="../Bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../admin/lib/js/jquery/jquery-validation-1.13.1/dist/jquery.validate.js"></script>   
        <script type="text/javascript" src="../admin/lib/js/fonctionsJquery.js"></script>     
       
        <meta charset='UTF-8'/>
    </head>

    <body>
        <div id="page">
            <header>		
                <img src="../admin/images/banniere-cine-bande.png" alt="Banniere" class="img-thumbnail"/>			
            </header>
            <section id="colGauche">
                <nav>
                    <ul class="nav nav-pills nav-stacked" id="menu"> 
                        <?php
                        if (file_exists('./lib/php/Cmenu.php')) {
                            include ('./lib/php/Cmenu.php');
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
        </div>
        <footer>Editeur responsable Thomas.Graci@cinemaweb.be</footer>
    </body>
</html>