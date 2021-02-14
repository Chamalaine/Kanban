<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement mot de passe</title>
</head>
<body>
<header>
    <?php require_once 'layout/menu.php'; ?>
</header>

<main>
    <h4>Changement mot de passe</h4>

    <?php var_dump($data); ?>

    <form action="http://localhost/kanlo/security/changepassword" method="post">
        <label for="oldPass">Mot de passe actuel</label>
        <input name="oldPass" type="text" id="password">

        <label for="newPass">Nouveau mot de passe</label>
        <input name="newPass" type="text" id="password">

        <input name="user" type="hidden" value='<?php echo $_SESSION['id'];?>'>
        <input type="submit" value="Enregistrer">
    </form>
</main>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>