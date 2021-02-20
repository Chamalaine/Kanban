<div class="container nav-bar">
<ul>
      <?php

      if(isset($_SESSION['id'])){
          ?>     
          <li>
              <a href="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/home/dashboard/<?php echo $_SESSION['id']; ?>">Dashboard</a>
          </li>
          <li>
              <a href="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/home/profile/<?php echo $_SESSION['id']; ?>">Profile</a>
          </li>
          <li>
              <a href="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/security/disconnect">Deconnexion</a>
          </li>

      <?php } else { ?>
          <li>
              <a href="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/security/connect">Connexion</a>
          </li>
          <li>
              <a href="http://<?php echo $_SERVER["HTTP_HOST"]?>/kanlo/security/register">Inscription</a>
          </li>

      <?php }?>
  </ul>

</div>


