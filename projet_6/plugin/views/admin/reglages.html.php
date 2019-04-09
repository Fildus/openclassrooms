<h1 class="wp-heading-inline"><?= get_admin_page_title() ?></h1>
<form action="" method="post">
    <label for="find_nanny[customCss]">Css personnalisé : </label>
    <br>
    <textarea name="find_nanny[customCss]" id="find_nanny[customCss]" cols="150" rows="40"><?= $vars['customCss'] ?></textarea>
    <br>
    <button type="submit" class="button button-primary">soumettre</button>
</form>