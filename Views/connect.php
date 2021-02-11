
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
    <h4>Connection</h4>

      <form action="http://localhost/kanlo/security/connect" method="post">
          <label for="email"> Email</label>
          <input name="email" type="text" id="email">

          <label for="password"> Password</label>
          <input name="password" type="text" id="password">
          <input type="submit" value="Connexion">
      </form>
      <a href="http://localhost/kanlo/security/forgotten">Oubli mot de passe</a>
  </main>

  <?php require_once 'layout/footer.php'; ?>
</body>
</html>
