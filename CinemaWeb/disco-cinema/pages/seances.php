<?php
$mg = new ProgrammationDB($db);
$liste_prog = $mg->getArrayProg();
$nbr = count($liste_prog);
?>

<h2 id="titre_page" class="page-header">A l'affiche cette semaine:</h2>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php
    for ($i = 0; $i < $nbr; $i++) {
        ?>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                        <?php echo $liste_prog[$i]["titre"]; ?>
                    </a>
                </h4>
            </div>
            <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse <?php if ($i == 0) echo 'in'; ?>" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
                <div class="panel-body">
                    <table style="width:100%;">
                        <tr>
                            <td style="width: 33%;"><b>Salle : <?php echo $liste_prog[$i]["numero"]; ?></b></td>
                            <td style="width: 33%;"><b>Séance : <?php echo $liste_prog[$i]["h_debut"]; ?></b></td>
                            <td style="width: 33%;"><b>Durée : <?php echo $liste_prog[$i]["duree"]; ?> min</b></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table>
                                    <tr>
                                        <td style="width:20%"><?php echo '<img src="../admin/images/' . $liste_prog[$i]["affiche"] . '" style="width:100px;" />'; ?></td>
                                        <td style="width:80%"><?php echo $liste_prog[$i]["description"]; ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div> 
        <?php
    }
    ?>
</div>