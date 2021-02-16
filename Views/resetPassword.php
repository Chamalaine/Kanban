<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation Mot de Passe</title>
</head>
<body>
<header>
    <?php require_once 'layout/menu.php'; ?>
</header>

<main>
    <h4>Réinitialisation Mot de Passe</h4>

    <form action="http://localhost/kanlo/security/resetpassword" method="post">
        <label for="password"> Mot de Passe</label>
        <input name="password" type="text" id="password">
        <input name="id" type="hidden" value='<?php echo $data["id"]; ?>'>
        <input type="submit" value="Enregistrer">
    </form>
</main>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>