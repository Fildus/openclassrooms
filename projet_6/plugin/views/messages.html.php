<?= $vars['customStyle'] ?>

<?php if( wp_get_current_user()->ID && isset($vars['b']) && !empty($vars['b'])):?>
    <table style="text: center">
        <thead>
            <tr>
                <th style="text-align: center; color: #FFF; background-color: #555;">Vos dernières conversations</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($vars['listePersons'] as $item): ?>
            <tr>
                <td style="text-align: center"><a href="<?= $item['url'] ?>"><?= $item['user'][0]->user_nicename ?></a>
                <?php
                    if ($vars['nbrNotView'] !== 0){
                        echo '<span class="custom-nbr-view">'.$vars['nbrNotView'].'</span>';
                    }
                ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if( !wp_get_current_user()->ID):?>
    <p>Pour consulter vos messages vous devez être connecté.</p>
<?php endif; ?>

<?php if (wp_get_current_user()->ID && (!isset($vars['b']) || empty($vars['b']))): ?>
    <p>Vous n'avez pas de messages</p>
<?php endif; ?>

<?= $vars['customScript'] ?>

