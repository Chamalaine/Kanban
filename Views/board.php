<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau</title>
</head>
<body>
<header>
    <?php require_once 'layout/menu.php'; ?>
</header>

<main>
    <h4>Tableau</h4>
    <h3>Titre du tableau : <?php echo $data["board"]["title"]?></h3>

    <?php echo $data["message"] ?>

    <!-- Add User for collab form should not be foreached -->
    <form action="http://localhost/kanlo/home/addUser" method="post">
        <input name="email" type="email  value="Email">
        <input name="idBoard" type="hidden" value="<?php echo $data["board"]["id"]; ?>">
        <input type="submit" value="Ajouter User">
    </form>


    <!-- AddList to the array display form should not be foreached -->
    <form action="http://localhost/kanlo/home/addListe" method="post">
        <input name="title" type="text" id="title" value="Titre">
        <input name="description" type="text" id="description" value="Description">
        <input name="id" type="hidden" value="<?php echo $data["board"]["id"]; ?>">
        <input type="submit" value="Ajouter Liste">
    </form>





</main>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>
