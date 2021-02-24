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
    <link rel="icon" type="image/png" href="../../public/img/favicon.png">
    <link rel="stylesheet" href="../../public/css/style.css">
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

  
<section id="table">
    <div class="tables-title">
        <div class="table-form">
        <!-- <h2>Tableau</h2> -->
            <h4 class="title-center"> <?php echo $data["board"]["title"];?></h4>
            
            <!-- Add User for collab form should not be foreached -->
            <form action="https://<?php echo $_SERVER["HTTP_HOST"]?>/home/addUser" method="post">
                <input class="dashboard-input" name="email" type="email"  placeholder="Inviter par email">
                <input name="idBoard" type="hidden" value="<?php echo $data["board"]["id"]; ?>">
                <button class="btn btn-outline-light btn-lg btn-log" type="submit" ><i class="fas fa-user-plus"></i></button>
            </form>

            <!-- AddList to the array display form should not be foreached -->
            <form action="https://<?php echo $_SERVER["HTTP_HOST"]?>/home/addListe" method="post">
                <input class="dashboard-input" name="title" type="text" id="title" placeholder="Titre Liste">
                <input class="dashboard-input" name="description" type="text" id="description" placeholder="Description">
                <input name="id" type="hidden" value="<?php echo $data["board"]["id"]; ?>">
                <button class="btn btn-outline-light btn-lg btn-log" type="submit" ><i class="fas fa-plus"></i></button>
            </form>
        </div>


        <div class="container-fluid">
            <div class="row">        
            
            <?php
            // Here we take from the controller $data who got an array of listes, so we browse it to display listes
            foreach($data["listes"] as $liste){?>
                <div class="col-lg-3 col-sm-12 col-md-6">
                    <div class="list-style">
                        <h3><?php echo $liste["title"];?></h3>
                        <a href='/home/deleteListe/<?php echo $liste["id"];?>'><i class="fas fa-trash"></i></a>
                    </div>

                    <?php
                    // Inside each list, there is an array of card, we display them by browsing the array
                    foreach($liste[0] as $card){?>
                        <div class="card-style">
                            <div class="card-row">
                                <h4><?php echo $card["title"];?></h4>
                                <h5><?php echo $card["description"];?></h5>
                            </div>
                           
                            <a class="deletecard" href='/home/deletecard/<?php echo $card["id"];?>'><i class="fas fa-trash"></i></a>
                        </div>

                        <!-- Delete card method -->

                    <?php
                    // Here we stop browsing the card array inside each list
                    }
                    ?>

                    <!-- Form to add a card on each list, this form get repeated for each list though the array browsing in php -->
                    <form action="https://<?php echo $_SERVER["HTTP_HOST"];?>/home/addCard" method="post">
                        <input class="dashboard-input" name="title" type="text" id="title" placeholder="Titre Carte">
                        <input class="dashboard-input" name="description" type="text" id="description" placeholder="Description">
                        <input name="idListe" type="hidden" value="<?php echo $liste["id"];?>">
                        <input name="idBoard" type="hidden" value="<?php echo $liste["id_board"];?>">
                        <button class="btn btn-outline-light btn-lg btn-log" type="submit" ><i class="fas fa-plus"></i></button>
                    </form>

                    <!-- this a link calls the deletelistmethod from our homecontroller and get repeated for each list -->            
                </div>
            <?php
            //here we stop browsing the list array
            }
            ?>

            </div>
        </div>     
    </div>
</section>

       
        
    <?php
        include 'footer.php'; 
    ?>     

</body>
</html>