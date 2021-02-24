<div class="container-fluid nav-bar">
    <a href="https://<?php echo $_SERVER["HTTP_HOST"]?>"><img src="../../public/img/logo.png" alt="logo kanlo"></a>

    <nav class="d-flex justify-content-end navbar navbar-expand-lg sticky-top container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapsed" aria-controls="navbarCollapsed" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars" id="burger"></i>
        </button>
        <div  class="collapse navbar-collapse justify-content-end " id="navbarCollapsed">
            <ul class="navbar-nav justify-content-end">
                <?php

                if(isset($_SESSION['id'])){
                    ?>     
                    <li class="nav-item">
                        <a href="https://<?php echo $_SERVER["HTTP_HOST"]?>/home/dashboard/<?php echo $_SESSION['id']; ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://<?php echo $_SERVER["HTTP_HOST"]?>/home/profile/<?php echo $_SESSION['id']; ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/disconnect">Deconnexion</a>
                    </li>

                <?php } else { ?>
                    <li class="nav-item">
                        <a href="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/connect">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://<?php echo $_SERVER["HTTP_HOST"]?>/security/register">Inscription</a>
                    </li>

                <?php }?>
            </ul>
        </div>
    </nav>
</div>



