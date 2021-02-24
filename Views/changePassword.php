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
    <title>Kanlo Password Change</title>
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
                    <h3>Redéfinir votre Mot de Passe</h3>
                    <form id="contact-form" action="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/changepassword" method="POST">
                        <ul>
                            <li>
                                <label for="text"></label>
                                <input type="text" name="oldPass" id="oldPass" placeholder="Mot de passe actuel">
                            </li>
                            <li>
                                <label for="text"></label>
                                <input type="text" name="password" id="password" placeholder="Nouveau Mot de Passe">
                            </li>
                            <li>
                                <button class="btn-log" type="submit" name="submit">Définir</button>
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