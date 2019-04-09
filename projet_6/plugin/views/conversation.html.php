<?= $vars['customStyle'] ?>

<div class="custom-messages-box">
	<?php foreach ($vars['messages'] as $message): ?>
		<div class="custom-messages <?php
		if ($message->idTransmitter === $vars['idContact']){
			echo 'other';
		}else{
			echo 'self';
		}
		?>">
			<p><?= $message->name ?></span></p>
			<p><?= $message->message ?></p>
            <p style="color: #888; font-size: 0.8em;line-height: 0.8em;">reçu le <?= (new DateTime($message->dateMessage))->format('d M Y à H\h \e\t i\m\i\n') ?> </p>
		</div>
	<?php endforeach; ?>
</div>

<form action="" method="post">
	<label for="find_nanny[message]">Répondre</label>
	<textarea name="find_nanny[message]" id="find_nanny[message]" cols="30" rows="10"><?= $vars['post'] ?></textarea>
	<button type="submit" class="custom-float-right">Envoyer</button>
</form>

<?= $vars['customScript'] ?>
