
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
<header>
    <?php require_once 'layout/menu.php';
?>
</header>

<main>
    <h4>Profile user</h4>

    <a href="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/security/changepassword">Modifier mot de passe</a>
</main>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>
