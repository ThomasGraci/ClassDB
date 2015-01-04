<h2 id="titre_page" class="page-header">Bienvenue sur CinemaWeb</h2>
<?php
    $accueilDB = new AccueilDB($db);
    $texte = $accueilDB->getTexteAccueil();
?>
<br />
    <img src="../admin/images/pellicule.jpg" alt="Cinema disco-cinema" id="pellicule_img" class="img-circle"/>&nbsp;
    <div id="texte_accueil" class="up">
        <br /><br />
        <?php print $texte[0]->texte_accueil;          
        ?>
    </div>

<section id="avertisst" class=" txtRed">    
    <br />Attention : Pour réserver sur notre site vous devez d'abord vous inscrire et/ou vous connectez!   
</section>
  
 <section id="no-js" class="txtRed txtGras">
     Pour plus de confort d'utilisation, veuillez activer javascript!
 </section>