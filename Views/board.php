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


    <h4>Tableau</h4>
    <h3>Titre du tableau : <?php echo $data["board"]["title"];?></h3>


    <!-- Add User for collab form should not be foreached -->
    <form action="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/home/addUser" method="post">
        <input name="email" type="email  value="Email">
        <input name="idBoard" type="hidden" value="<?php echo $data["board"]["id"]; ?>">
        <input type="submit" value="Ajouter User">
    </form>


    <!-- AddList to the array display form should not be foreached -->
    <form action="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/home/addListe" method="post">
        <input name="title" type="text" id="title" value="Titre">
        <input name="description" type="text" id="description" value="Description">
        <input name="id" type="hidden" value="<?php echo $data["board"]["id"]; ?>">
        <input type="submit" value="Ajouter Liste">
    </form>


    <?php
    // Here we take from the controller $data who got an array of listes, so we browse it to display listes
    foreach($data["listes"] as $liste){?>

        <h3><?php echo $liste["title"];?></h3>

        <?php
        // Inside each list, there is an array of card, we display them by browsing the array
        foreach($liste[0] as $card){?>

            <h4><?php echo $card["title"];?></h4>
            <h5><?php echo $card["description"];?></h5>

            <!-- Delete card method -->
            <a href='/kanlo/home/deletecard/<?php echo $card["id"];?>'>Effacer Carte</a>;


        <?php
        // Here we stop browsing the card array inside each list
        }
        ?>

        <!-- Form to add a card on each list, this form get repeated for each list though the array browsing in php -->
        <form action="http://<?php echo $_SERVER["HTTP_HOST"];?>/kanlo/home/addCard" method="post">
            <input name="title" type="text" id="title" value="Titre">
            <input name="description" type="text" id="description" value="Description">
            <input name="idListe" type="hidden" value="<?php echo $liste["id"];?>">
            <input name="idBoard" type="hidden" value="<?php echo $liste["id_board"];?>">
            <input type="submit" value="Ajouter Carte">
        </form>

        <!-- this a link calls the deletelistmethod from our homecontroller and get repeated for each list -->
        <a href='/kanlo/home/deleteliste/<?php echo $liste["id"];?>'>Effacer Liste</a>;

    <?php
    //here we stop browsing the list array
    }
        ?>



    <!-- Nav menu grey -->
   <section class="nav-menu">
        <div class="tables-title">
            <a href="tables.php"><h3>Tableaux</h3></a>
        </div>
        <div class="table-title">
            <h3>Premier tableau</h3>
        </div>
        <div class="collab">
            <div><i class="fas fa-user"></i></div>
            <div><i class="fas fa-user"></i></div>
            <div class="invite">Inviter</div>
        </div>
        <div class="user">
            <div><i class="fas fa-user"></i></div>
        </div>
    </section>

    <!-- Liste des cartes -->
    <section id="table">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 ">
                    <div class="list">
                    <h4>TO DO</h4>

                        <!-- Les cartes -->
                        <div class="carte">
                            <ul>
                                <li>
                                    <p>Exemple 1</p>
                                    <div class="delete">X</div>
                                </li>
                                <li>
                                    <p>Exemple 1</p>
                                    <div class="delete">X</div>
                                </li>
                                <li>
                                    <p>Exemple 1</p>        
                                    <div class="delete">X</div>
                                </li>
                            </ul>
                        </div>

                        <!-- Form to add a item -->
                        <div class="add">
                            <form id="add-form">
                                <p>
                                    <label for="add"></label>
                                    <input type="text" id="add" placeholder="+ Titre de la carte">
                                    <button class="btn-log">Ajouter</button>
                                </p>  
                            </form>
                        </div>
                    </div>             
                    
                </div>
                <div class="col-lg-2">
                    <div class="list">test</div>
                </div>
                <div class="col-lg-2">
                    <div class="list">test</div>
                </div>
                <div class="col-lg-2">
                    <div class="list">test</div>
                </div>
                <div class="col-lg-2">
                    <div class="list">test</div>
                </div>
                <div class="col-lg-2">
                    <div class="list">test</div>
                </div>
            </div>
        </div>
    </section>
    
<?php
    include 'footer.php'; 
?>     

</body>
</html>