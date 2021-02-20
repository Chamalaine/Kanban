<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Valentin Simon Chamalaine Soufi Olimpia Sacareanu ">
    <meta name="description" content="KANLO - framework pour simplifier votre treavail" />
    <meta name="keywords" content="application framework kanban trelo travail géstion">


    <!-- Lines -->
    <link rel="icon" type="image/png" href="src/img/favicon.png">
    <link rel="stylesheet" href="/kanlo/public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Titre -->
    <title>Kanlo</title>
</head>
<body>

<!-- Header -->
<?php
    include 'header.php'; 
?> 

    <section id="tables">
        <div class="container">
            <h3>Tableaux</h3>
            <ul>
                <a href=""><li>Ye sqdfggs</li></a>
                <a href=""><li>Yes</li></a>
                <a href=""><li>Yes</li></a>
                <a href=""><li>Yes</li></a>
            </ul>
        </div>
    </section>


    <h4>Dashboard</h4>

    <?php

    foreach($data["boards"] as $board){

        echo "<a href='/kanlo/home/displayboard/$board[id]'>Afficher tableau</a>";
        echo "<a href='/kanlo/home/deleteboard/$board[id]'>Effacer tableau</a>";
    }
        ?>


    
    <!-- Addboard to the dashboard - form should not be repeated -->
    <form action="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/home/addboard" method="post">
        <input name="title" type="text" id="title" value="Titre">
        <input name="description" type="text" id="description" value="Description">
        <input name="id" type="hidden" value="<?php echo $_SESSION['id']; ?>">
        <input type="submit" value="Envoyer">
    </form>

    
<?php
    include 'footer.php'; 
?>     

</body>
</html>