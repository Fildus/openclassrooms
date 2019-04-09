<?php foreach ( $vars['js'] as $js ){echo $js;} ?>
<?php foreach ( $vars['link'] as $link ){echo $link;} ?>
<?= $vars['customStyle'] ?>

<div id="mapid"></div>
<button class="custom-button warning transition aligncenter" id="localisation">Votre position (localisation automatique par GPS)</button>
<section>
	<form action="" method="post" class="button-group find_nanny_search_FORM">

        <label for="find_nanny[ville]">Ville : </label>
        <input type="text" name="find_nanny[ville]" id="find_nanny[ville]" value="<?= $vars['ville'] ?? null ?>">
        <button type="button" id="chercher" class="custom-button success transition alignleft">Chercher</button>

        <hr class="custom-clear">

        <input id="lat" name="find_nanny[lat]" value="<?= $vars['lat'] ?? null ?>" hidden>
        <input id="lng" name="find_nanny[lng]" value="<?= $vars['lng'] ?? null ?>" hidden>

        <h2>Filtres de recherche</h2>

        <div>
            <label for="find_nanny[km]">Rayon maximum de votre recherche (km) : </label>
            <select type="number" name="find_nanny[km]" id="find_nanny[km]">
				<?php foreach ([1,2,5,10,15,20,25,30,35,40,45,50] as $v): ?>
                    <option
                            value="<?= $v ?>" <?php if ( (integer) $vars['km'] === $v ){echo 'selected';}
					if ( !isset($vars['km']) && $v === 5 ){echo 'selected';} ?>><?= $v ?>km
                    </option>
				<?php endforeach; ?>
            </select>
        </div>

        <div>
            <input id="find_nanny[avaiblable]" name="find_nanny[avaiblable]" type="checkbox" onchange="checkboxUse(this)">
            <label for="find_nanny[avaiblable]">Actuellement disponible ?</label>
        </div>
        <br>
        <div>
            <label>Disponibilités recherchées ?</label>
            <div id="rangePicker"></div>
        </div>

        <hr class="custom-clear">

        <div>
            <h3 for="">Tarif à l'heure</h3>
            <div style="display: flex">
                <label for="min_range_input">minimum</label>
                <input
                        style="margin-left: 20px;"
                        value="0"
                        id="min_range_input"
                        name="min_range_input"
                        type="range"
                        min="0"
                        max="100"
                        onchange="echoRange(this.value, 'min')">
            </div>
            <div style="display: flex">
                <label for="max_range_input">maximum</label>
                <input
                        style="margin-left: 20px;"
                        value="0"
                        id="max_range_input"
                        name="max_range_input"
                        type="range"
                        min="0"
                        max="100"
                        onchange="echoRange(this.value, 'max')">
            </div>
            <p>Le prix se situe entre <output id="min_range_output"></output>,00€ et <output id="max_range_output"></output>,00€.</p>
        </div>
	</form>
</section>
<section>
    <h2>Résultats</h2>
    <table>
        <thead>
        <tr style="font-size: 0.8em;">
            <th>Nom</th>
            <th>Prix/h(ttc)</th>
            <th>Enfants max</th>
            <th>distance(km)</th>
            <th>disponibilité</th>
        </tr>
        </thead>
        <tbody id="tableau">

        </tbody>
    </table>
</section>

<script>
    let PersonnesListe = <?= json_encode($vars['liste']) ?>;
</script>
<?= $vars['customScript'] ?>
