<nav>
  <ul>
      <?php

      if(session_status() === PHP_SESSION_ACTIVE){
          ?>

          <li>
              <a href="http://localhost/kanlo/home/profile/<?php echo $_SESSION['id']; ?>">Profile</a>
          </li>
          <li>
              <a href="http://localhost/kanlo/security/disconnect">Deconnexion</a>
          </li>

      <?php } else { ?>
          <li>
              <a href="http://localhost/kanlo/security/connect">Connexion</a>
          </li>
          <li>
              <a href="http://localhost/kanlo/security/register">Inscription</a>
          </li>

      <?php }?>
  </ul>


</nav>
