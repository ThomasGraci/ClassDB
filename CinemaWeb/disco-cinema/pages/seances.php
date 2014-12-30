<?php
$mg = new ProgrammationDB($db);
$liste_prog = $mg->getArrayProg();
$nbr = count($liste_prog);
print_r($liste_prog);
?>

<h2 id="titre_page" class="page-header">A l'affiche cette semaine:</h2>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php
    for ($i = 0; $i < $nbr; $i++) {
        ?>
    
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?php print $liste_prog[$i]->pfilm;?> Salle: <?php print $liste_prog[$i]->psalle;?> S&eacute;ance: <?php print $liste_prog[$i]->pseance?>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <table style="width:100%;">
                        <tr>
                            <td style="width:20%">Ton image</td>
                            <td style="width:80%">Ton text</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> 
        <?php
    }
    ?>
</div>