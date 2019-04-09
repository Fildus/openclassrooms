<?php if( wp_get_current_user()->ID):?>

<?php foreach ( $vars['link'] as $link ){echo $link;} ?>
<?php foreach ( $vars['js'] as $js ){echo $js;} ?>
<?= $vars['customStyle'] ?>

<?php if($vars['wantTobeNanny']):?>
    <?php if($vars['accepted']):?>
        <div class="custom-registerNotification success">Votre compte est approuvé, vous êtes actuellement accessible sur la plateforme</div>
    <?php endif; ?>
    <?php if(!$vars['accepted']):?>
        <div class="custom-registerNotification danger">Votre compte n'a pas encore était approuvé ou l'accès a été suspendu</div>
    <?php endif; ?>
<?php endif; ?>

<input id="find_nanny_register[nanny]" name="find_nanny[nanny]" type="checkbox" <?= $vars['wantTobeNanny'] ?>>
<label for="find_nanny_register[nanny]">Je souhaite devenir nounou</label>

    <hr>

<div id="customForm">
    <form action="" method="post" class="button-group find_nanny_search_FORM">
        <p><?= $vars['diffAvailable'] ?></p>
        <button type="submit"
                name="find_nanny_available[updateAvailable]"
                value="available"
                class="custom-button success transition aligncenter custom-float-left">
            Je m'actualise !
        </button>
        <button type="submit"
                name="find_nanny_available[updateAvailable]"
                value="unavailable"
                class="custom-button danger transition aligncenter custom-float-right">
            Je ne souhaite plus être visible
        </button>
    </form>

    <form action="" method="post" class="button-group find_nanny_search_FORM">

        <hr class="custom-clear">

        <h2>Vos disponibilités</h2>
        <div id="rangePicker" class="custom-boxes"></div>

        <hr class="custom-clear">

        <div id="mapid"></div>
        <button type="button" class="custom-button warning transition aligncenter" id="localisation">Votre position (localisation automatique par GPS)</button>

        <label for="find_nanny_register[ville]">Ville</label>
        <input type="text" name="find_nanny_register[ville]" id="find_nanny_register[ville]" value="<?= $vars['ville'] ?? null ?>">

        <input id="lat" name="find_nanny_register[lat]" value="<?= $vars['lat'] ?? null ?>" hidden>
        <input id="lng" name="find_nanny_register[lng]" value="<?= $vars['lng'] ?? null ?>" hidden>

        <button type="button" id="chercher" class="custom-button success transition alignleft">Chercher</button>

        <div class="clear"></div>

        <label for="find_nanny_register[description]">Décrivez-vous</label>
        <textarea name="find_nanny_register[description]"
                  id="find_nanny_register[description]"
                  cols="30" rows="5"><?php echo stripslashes_from_strings_only($vars['description']) ?? null; ?></textarea>



        <h2>Quelques informations</h2>
        <div>
            <label for="find_nanny_register[nbrChildren]">Nombre maximum d'enfants</label>
            <input id="find_nanny_register[nbrChildren]"
                   name="find_nanny_register[nbrChildren]"
                   type="number"
                   min="1"
                   max="10"
                   value="<?= $vars['nbrChildren'] ?>">
        </div>
        <div>
            <label for="find_nanny_register[price]">Votre prix à l'heure</label>
            <input id="find_nanny_register[price]"
                   name="find_nanny_register[price]"
                   type="number"
                   style="text-align: right"
                   value="<?= $vars['price'] ?>"> .00€
        </div>
        <div>
            <input id="whenYouAreReadyInput" name="whenYouAreReadyInput" type="checkbox" onclick="whenYouAreReady(this)">
            <label for="whenYouAreReadyInput">Je suis disponible actuellement</label>
        </div>
        <div id="whenYouAreReady"></div>

        <button type="submit" id="find_nanny_register[submit]" class="custom-button transition alignright">Valider</button>
    </form>

</div>


<script>
    let days = <?= json_encode($vars['days']) ?>;
    let nextDateAvailable = <?= json_encode($vars['nextDateAvailable']) ?>;

    let divElt = document.getElementById('whenYouAreReady')

    if (nextDateAvailable === null) {
        let whenYouAreReadyInput = document.getElementById('whenYouAreReadyInput')
        whenYouAreReadyInput.setAttribute('value', nextDateAvailable)
        whenYouAreReadyInput.setAttribute('checked', 'checked')
    }else if(typeof nextDateAvailable === typeof  ''){
        test(nextDateAvailable)
    }

    function whenYouAreReady(input){
        if (input.hasAttribute('checked')){
            input.removeAttribute('checked')
            test(nextDateAvailable)
        }else {
            divElt.innerHTML = ""
            input.setAttribute('checked', 'checked')
        }
    }

    function test(date = null) {
        let dateLabelElt = document.createElement('label')
        let dateElt = document.createElement('input')

        if (date !== null) {
            dateElt.setAttribute('value', date)
        }

        dateLabelElt.setAttribute('for', 'find_nanny_register[nextDateAvailable]')
        dateLabelElt.innerText = 'Votre prochaine disponibilité'

        dateElt.setAttribute('type', 'date')
        dateElt.setAttribute('id', 'find_nanny_register[nextDateAvailable]')
        dateElt.setAttribute('name', 'find_nanny_register[nextDateAvailable]')

        divElt.appendChild(dateLabelElt)
        divElt.appendChild(dateElt)
    }
</script>

<?= $vars['customScriptRegister'] ?>
<?= $vars['customScriptDatePicker'] ?>

<?php endif; ?>

<?php if( !wp_get_current_user()->ID):?>
    <p>Pour vous enregistrer ou accéder à votre compte nourrice vous devez être connecté au préalable</p>
<?php endif;?>
