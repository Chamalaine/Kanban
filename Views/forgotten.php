
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>
<body>
<header>
    <?php require_once 'layout/menu.php'; ?>
</header>

<main>
    <h4>Oubli mot de passe</h4>

    <form action="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/security/forgotten" method="post">
        <label for="email"> Email</label>
        <input name="email" type="text" id="email">
        <input type="submit" value="Envoyer">
    </form>
</main>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>
