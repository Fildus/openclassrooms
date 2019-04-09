<?= $vars['customStyle'] ?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?= get_admin_page_title() ?></h1>
    <table class="wp-list-table widefat fixed striped posts">
        <thead>
            <tr>
                <th class="manage-column">Nourrice</th>
                <th class="manage-column" colspan="3">Adresse</th>
                <th class="manage-column">Disponibilité</th>
                <th class="manage-column">Supprimer</th>
                <th class="manage-column">Acceptations</th>
            </tr>
        </thead>

        <tbody id="">
        <?php foreach ($vars['liste'] as $k => $v): ?>
            <tr>
                <td>
                    <strong>
                        <a href="<?= get_bloginfo('url').'/wp-admin/admin.php?page=Find_a_nanny&id='.$v->id ?>">
		                    <?= $v->nom ?>
                        </a>
                    </strong>
                </td>
                <td colspan="3"><?= $v->adresse ?></td>
                <td>
                    <?php
                    if ($v->available !== null && date_diff(new DateTime($v->available), new DateTime())->d < 7 && ( $v->nextDateAvailable === null || (new DateTime($v->nextDateAvailable))->getTimestamp() < (new DateTime())->getTimestamp())){
                        echo '<span style="color: #0A0;"><strong>Disponible</strong></span>'."<br/>"
                             .date_format(new DateTime($v->available), 'd-m-Y');
                    }elseif($v->nextDateAvailable !== null){
	                    echo '<span style="color: #999;">Disponible à partir du </span>'."<br/>"
                             .date_format(new DateTime($v->nextDateAvailable), 'd-m-Y');
                    }else{
	                    echo '<span style="color: #999;">Indisponible</span>';
                    }
                    ?>
                </td>
                <td>
                    <form action="" method="post">
                        <button class="btn btn-danger" name="find_nanny_back[dash][<?= (int)$v->id ?>]" value="dashed">
                            Corbeille
                        </button>
                    </form>
                </td>
                <?php if ((int) $v->accepted === 0): ?>
                <td>
                    <form action="" method="post">
                        <button class="btn btn-success" name="find_nanny_back[isAccepted][<?= (int)$v->id ?>]" value="accepted">
                            Accepter le dossier
                        </button>
                    </form>
                </td>
                <?php endif; ?>
	            <?php if ((int) $v->accepted === 1): ?>
                <td>
                    <form action="" method="post">
                        <button class="btn btn-danger" name="find_nanny_back[isAccepted][<?= (int)$v->id ?>]" value="refused">
                            refuser le dossier
                        </button>
                    </form>
                </td>
	            <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

</div>