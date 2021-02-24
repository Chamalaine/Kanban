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
    <title>Kanlo Reset Password</title>
</head>
<body>
<!-- Header -->
<?php
    include 'header.php'; 
?> 

        <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 content-col">
                        <main>
                        <h4 id="mid">Réinitialisation Mot de Passe</h4>
                        <img src="../../public/img/reset.png" alt="Reset Password">


                        <form action="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/resetpassword" method="post">
                            <input class="reset-input" name="password" type="text" placeholder="Nouveau mot de passe" id="password">
                            <input name="id" type="hidden" value='<?php echo $data["id"]; ?>'>
                            <input class="btn btn-outline-light btn-lg btn-log" type="submit" value="Enregistrer">
                        </form>
                    </main>
                </div>
        </div>


<?php
    include 'footer.php'; 
?>     

</body>
</html>