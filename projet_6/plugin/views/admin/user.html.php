<?php foreach ( $vars['js'] as $js ){echo $js;} ?>
<?php foreach ( $vars['link'] as $link ){echo $link;} ?>
<?= $vars['customStyle'] ?>

<div class="wrap">
	<h1 class="wp-heading-inline">Utilisateur</h1>
    <h2>Fiche de <?= $vars['person']->nom ?></span></h2>

    <h3>Adresse</h3>
    <div id="mapid" style="width: 50%;"></div>
    <p><?= $vars['person']->adresse ?></p>

    <h3>Description</h3>
    <p><?= $vars['person']->description ?></p>

    <h3>Prix</h3>
    <p><?= $vars['person']->price ?>.00€/h</p>

    <h3>Nombre maximum d'enfants accéptés</h3>
    <p>Le nombre maximum d'enfants accepté par <?= $vars['person']->nom ?> est de <?= $vars['person']->nbrChildren ?>.</p>

    <h3>Jours ouvrés</h3>
    <div id="rangePicker" style="width: 50%; "></div>

    <h3>Prochaine date de disponibilité</h3>
    <p><?= date_format(new DateTime($vars['person']->nextDateAvailable), 'd M Y')  ?></p>

    <h3>Dernière actualisation</h3>
    <p><?= date_format(new DateTime($vars['person']->available), 'd M Y') ?></p>

    <h3>état du dossier</h3>
    <p><?php

        if ($vars['person']->accepted){
            echo 'Le dossier a été accepté';
        }else{
            echo 'Le dossier est en attente ou a été refusé';
        }

        ?></p>

    <hr>

</div>
<script>
    let person = <?= json_encode($vars['person']) ?>;
</script>
<?= $vars['customScript'] ?>
