?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Kanlo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Assistant&family=Yusei+Magic&display=swap');

html, body {
    margin:0;
    padding:0;
}

html {
    height: 100%;
}

*{
    font-family: 'Assistant', sans-serif;
    color: #4b4b4b;
}

h1, h2, h3{
    font-family: 'Yusei Magic', sans-serif;
    text-align:center;
}

body {
	background: rgb(72,72,72);
    background: linear-gradient(315deg, rgba(72,72,72,1) 0%, rgba(237,103,196,1) 35%, rgba(134,168,231,1) 65%, rgba(95,251,225,1) 100%);
    background-repeat: fill;
    background-attachment: fixed;
}
.container-fluid {
	display:block;
	width:100%;
	background-color:white;
	margin-top:2vh;
}

.img-center {
	margin-top:2vh;
	display:flex;
	justify-content: center;
}


p {
	text-align:center;
	margin-top:2vh;
}

.cent {
	display:flex;
	justify-content: center;
}

.btn {
	background-color: #bd89de !important;
    border: none;
    padding: 7px 15px;
    color: #fff;
    border-radius: 5px;
    display:flex;
    justify-content: center;
}
</style>
<body>
	<a class="img-center" href="https://kanlo.chamalaine.fr"><img src="http://n4sh.free.fr/images/logo.png" alt="logo kanlo"></a>
	<section id="connection">
        <div class="container-fluid">
            <div class="col">
                <div class="col-sm-12">
                    <h1>Bonjour <span><?php echo $data["name"]; ?></span></h1>
					<p>Vous avez demandé la réinitialisation de votre mot de passe. Si vous n'êtes pas à l'origine de cette demande, veuillez contacter le support et par mesure de sécurité changer votre mot de passe actuel.</p>
					<a class="btn" href="<?php echo $data["url"];?>"> Réinitialisation</a>
					<p>Merci pour votre confiance</p>
					<h3>Toute l'équipe Kanlo !</h3>
            	</div>
        	</div>
        </div>
    </section>

</body>
</html>
<?php