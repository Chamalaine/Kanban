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
    <title>Kanlo Password Recovery</title>
</head>
<body>

<!-- Header -->
<?php
    include 'header.php'; 
?> 

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 content-col">
                    <h3>Mot de passe oublié</h3>
                    <form id="contact-form" action="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/forgotten" method="POST">
                        <ul>
                            <li>
                                <label for="email"></label>
                                <input type="email" name="email" id="email" placeholder="E-mail">
                            </li>
                            <?php 
                            if(isset($data["message"])){ ?>
                            <div class="alert alert-info">
                                <?php echo $data["message"]; ?>
                            </div>
                            <?php }
                            ?>
                            <li>
                                <button class="btn-log" type="submit" name="submit">Restaurer</button>
                            </li>                        
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
<?php
    include 'footer.php'; 
?>     

</body>
</html>