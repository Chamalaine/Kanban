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
<?php var_dump($data); ?>
<main>
    <h4>Tableau</h4>
    <h3>Titre du tableau : <?php echo $data["board"]["title"]?></h3>

    <form action="http://localhost/kanlo/home/addlist" method="post">
        <input name="title" type="text" id="title" value="Titre">
        <input name="description" type="text" id="description" value="Description">
        <input name="id" type="hidden" value="<?php echo $data["board"]["id"]; ?>">
        <input type="submit" value="Envoyer">
    </form>

</main>

<?php require_once 'layout/footer.php'; ?>
</body>
</html>
