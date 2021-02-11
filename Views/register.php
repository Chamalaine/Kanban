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
    <h4>Inscription</h4>

    <form action="http://localhost/kanlo/security/register" method="post">
        <label for="email"> Email</label>
        <input name="email" type="text" id="email">

        <label for="password"> Password</label>
        <input name="password" type="text" id="password">

        <label for="pseudo"> Pseudo</label>
        <input name="pseudo" type="text" id="pseudo">


        <input type="submit" value="Inscription">
    </form>

</main>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>
