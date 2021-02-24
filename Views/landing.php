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
    <link rel="icon" type="image/png" href="../public/img/favicon.png">
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Titre -->
    <title>Kanlo</title>
</head>

<body>

    <!-- Logo -->
    <div class="logo">
        <img src="../public/img/logo.png" alt="Logo Kanlo">
    </div>

    <!-- Connection -->
    <section id="connection">
        <div class="container">
            <div class="col">
                <div class="col-sm-12 content-row typewriter">
                    <h3>"Avec Kanlo, pas de simples tableaux, mais des projets idéaux"</h3>
                </div>
                <div class="col-sm-12 content-row-space">
                    <?php

                            session_start();
                    if(!isset($_SESSION['id'])){ ?>
                    <a class="btn btn-outline-light btn-lg btn-log" href="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/register" role="button">S'inscrire</a>
                    <a class="btn btn-outline-light btn-lg btn-log" href="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/connect" role="button">Se connecter</a>
                    <?php }
                      else{

                    ?>
                          <a class="btn btn-outline-light btn-lg btn-log" href="https://<?php echo $_SERVER["HTTP_HOST"]?>/home/dashboard/<?php echo $_SESSION['id']; ?>">Dashboard</a>
                          <a class="btn btn-outline-light btn-lg btn-log" href="https://<?php echo $_SERVER["HTTP_HOST"]?>/home/profile/<?php echo $_SESSION['id']; ?>">Profile</a>
                          <a class="btn btn-outline-light btn-lg btn-log" href="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/disconnect">Deconnexion</a>

                    <?php }?>
                </div>
            </div>
        </div>
    </section>

    <div class="space"></div>

    <!-- Description -->
    <section id="description">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 col-md-6 content-col">
                    <h3>Notre projet!</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni repudiandae, quibusdam atque, sit deleniti, veritatis iste ab error ad consectetur nobis velit necessitatibus vero eos quidem a aliquid explicabo laborum!
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem, asperiores quae. Consequatur accusantium placeat iusto incidunt a, quibusdam quae, voluptatibus quaerat corrupti earum doloremque voluptates non accusamus cumque ab at.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero dolorum cumque suscipit quaerat. Porro, amet eos exercitationem deserunt ducimus quia consequatur, ex tenetur perspiciatis consequuntur dolorem ipsam, cum recusandae magni.</p>    
                </div>
                <div class="col-sm-6 col-lg-6 col-md-6 content">
                    <p><i class="fas fa-check fa-2x ico"></i>Lorem</p>
                    <p><i class="fas fa-check fa-2x ico"></i>Lorem</p>
                    <p><i class="fas fa-check fa-2x ico"></i>Lorem</p>
                </div>
            </div>
         </div>
    </section>

    <div class="space"></div>

    <!-- Team -->
    <section id="photo">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-lg-4 col-md content-col text">
                    <img src="../public/img/valentin.jpg" class="rounded-circle" alt="Valentin">
                    <br>
                    Valentin
                    <br>
                    Front-end
                </div>
                <div class="col-sm-4 col-lg-4 col-md content-col text">
                    <img src="../public/img/olimpia.jpg" class="rounded-circle" alt="Olimpia">
                    <br>
                    Olimpia
                   
                    <br>
                    Web Design
                </div>
                <div class="col-sm-4 col-lg-4 col-md content-col text">
                    <img src="../public/img/chamalaine.jpg" class="rounded-circle" alt="Chamalaine">
                    <br>
                    Chamalaine
                    <br>
                    Back-end
                </div>
            </div>
        </div>
    </section>
        
<?php
    include 'footer.php'; 
?>     
</body>
</html>