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
    // We take $data from our controller, we point the element boards who is an array of boards with associated
    // array  of listes
    foreach($data["boards"] as $board){?>

        <?php //Here we browse the array of boards and display data of each board ?>
        <h2><?php echo $board["title"]; ?></h2>
        <h3><?php echo $board["description"];?></h3>

        <?php // Here we are browsing again, but the array of lists from each boards
        foreach($board[0] as $liste){?>
                <h4><?php echo $liste["title"];?></h4>
                 <h5><?php echo $liste["description"]; ?></h5>
        <?php
        // Here we stop browsing the array of lists inside each boards
        }


        // DO NOT MODIFY THE LOGICAL PHP CODE ---- JUST STYLIZE IT OR CHANGE THE HTML BALISES FOR STYLE NECCESSITY --
        // DO NOT change the href links
        // IN CASE OF PHP ERROR CALL ME
        ?>
            <a href='/kanlo/home/displayboard/<?php echo $board["id"]?>'>Afficher tableau</a>
            <a href='/kanlo/home/deleteboard/<?php echo $board["id"]?>'>Effacer tableau</a>
    <?php
    // Here we stop browsing the array of boards
    }
        ?>


    
    <!--Addboard to the dashboard - form should not be repeated - Do not modify the inputs or action, just stylize it-->
    <form action="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/home/addboard" method="post">
        <input name="title" type="text" id="title" value="Titre">
        <input name="description" type="text" id="description" value="Description">
        <input name="id" type="hidden" value="<?php echo $_SESSION['id']; ?>">
        <input type="submit" value="Ajouter un Tableau">
    </form>

    
<?php
    include 'footer.php'; 
?>     

</body>
</html>