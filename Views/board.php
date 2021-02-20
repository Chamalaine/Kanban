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
    <h3>Titre du tableau : <?php echo $data["board"]["title"]?></h3>

    <?php echo $data["message"] ?>

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