<?php foreach ( $vars['js'] as $js ){echo $js;} ?>
<?php foreach ( $vars['link'] as $link ){echo $link;} ?>
<?= $vars['customStyle'] ?>

<h2>Profil de <?= $vars['person']->nom ?></h2>

<div id="mapid"></div>

<h3>Adresse</h3>
<p><?= $vars['person']->adresse ?></p>

<h3>horaires</h3>
<p>
    <?= $vars['person']->nom ?> accépte jusqu'à <strong><?= $vars['person']->nbrChildren ?></strong> enfant<?php if ($vars['person']->nbrChildren > 1){echo 's';}else{echo '';}  ?>
    et est généralement disponible les jours suivants:
</p>
<div id="rangePicker"></div>

<h3>Tarif</h3>
<p>
	<?= $vars['person']->price ?>.00€/h.
</p>

<h3>Disponibilités</h3>
<?php
$currentTS = (new DateTime())->getTimestamp();

$vars['person']->available !== null ?
    $availableTS = (new DateTime($vars['person']->available))->getTimestamp():
	null;

$vars['person']->nextDateAvailable !== null ?
    $nextDateAvailableTS = (new DateTime($vars['person']->nextDateAvailable))->getTimestamp():
    null;

if ($nextDateAvailableTS && $currentTS < $nextDateAvailableTS){
    echo $vars['person']->nom.' sera disponible à partir du <strong>'.date_format(new DateTime($vars['person']->nextDateAvailable), 'd M Y').'</strong>';
}else if ($availableTS && $currentTS >= $availableTS){
    echo 'la personne est actuellement disponible';
}else if (!$availableTS){
    echo 'la personne n\'est actuellement pas disponible sur la plateforme';
}
?>

<h3>Description</h3>
<p><?= stripslashes_from_strings_only($vars['person']->description) ?></p>

<?php if ((int) wp_get_current_user()->ID !== (int) $vars['id'] && wp_get_current_user()->ID): ?>
    <a href="<?= $vars['conversation'] ?? null ?>" class="alignright">Envoyer un message</a>
<?php endif; ?>

<script>
    let person = <?= json_encode($vars['person']) ?>;
</script>
<?= $vars['customScript'] ?>
