<?php

namespace Controllers;

use Models\User;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SecurityController extends Controller {

  // "Convention" Method par défaut d'appel d'un controleur
  public function index()
  {
    $this->view('login.php');
  }

  //Connection
  public function connect(){



      if(!isset($_SESSION)){
          session_start();
      }



      if(!isset($_SESSION['id'])) {
          if (isset($_POST['email']) && isset($_POST['password'])) {
              $user = new User();
              $userFind = $user->findUserByEmail($_POST['email']);


            
              if ($userFind != false && password_verify($_POST['password'], $userFind["password"]) === true) {

                  $_SESSION["id"] = $userFind["id"];
                  $_SESSION["auth"] = true;
                  $_SESSION["name"] = $userFind["pseudo"];

                  $this->view('landing.php', [
                      'message' => "Vous êtes connecté",
                  ]);
              }
              else {
                  $this->view('login.php', [
                      'message' => "Mauvais identifiants",
                  ]);
              }
          }
          else {
              $this->view('login.php');
          }
      }

      else{

          $this->view('landing.php');
      }
  }

  public function disconnect(){
    session_start();
    session_destroy();
    unset($_SESSION["id"]);
    unset($_SESSION["auth"]);
    unset($_SESSION["name"]);
    session_unset();

    $this->view('landing.php');

  }


  //Register
  public function register(){

      if(!isset($_SESSION)){
          session_start();
      }
      if(!isset($_SESSION["id"])) {

          if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['pseudo'])) {

              $user = new User();
              $checkUser = $user->findUserByEmail($_POST['email']);

              //Unique Email check
              if ($checkUser === false) {
                  $email = $_POST['email'];

                  //Password Crypt
                  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                  $pseudo = $_POST['pseudo'];


                  $user->createUser($email, $password, $pseudo);

                  $newUser = $user->findUserByEmail($email);


                  $_SESSION["id"] = $newUser["id"];
                  $_SESSION["auth"] = true;
                  $_SESSION["name"] = $newUser["pseudo"];

                  $this->view('landing.php', [
                      "message" => "Inscription réalisé"
                  ]);

              } else {
                  $this->view('register.php', [
                      "message" => "Email déjà utilisé",
                  ]);
              }

          } else {
              $this->view('register.php');
          }
      }

      else{
          $this->view('landing.php');
      }
  }


  // Forgotten Password 1st Method, link sent
  public function forgotten(){
      if(!isset($_SESSION)){
          session_start();
      }
      if(!isset($_SESSION["id"])) {
          if (isset($_POST['email'])) {

              $email = $_POST['email'];
              $user = new User();
              $checkUser = $user->findUserByEmail($email);

              if ($checkUser != false) {

                  //Unique Token Generator
                  $token = bin2hex(random_bytes(64));
                  $user->insertToken($checkUser["id"], $token);


                  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                      ->setUsername('surassur.amc@gmail.com')
                      ->setPassword("surassuramc67?");

                  $mailer = new Swift_Mailer($transport);

                  $url = "https://kanlo.chamalaine.fr/security/mailpassword/" . $token;

                  $message = (new Swift_Message("Oubli mot de passe"))
                      ->setFrom(['surassur.amc@gmail.com'])
                      ->setTo([$email])
                      ->setBody("Veuillez cliquer sur ce lien afin de réinitialiser votre mot de passe : ".$url);


                  $mailer->send($message);

                  $this->view("forgottenPassword.php",[
                      "message" => "Email d'oubli de mot de passe envoyé"
                  ]);
              }

              else{
                  $this->view('forgottenPassword.php', [
                      "message" => "L'email fourni est incorrect"
                  ] );
              }

          } else {
              $this->view('forgottenPassword.php');
          }
      }

      else{
          $this->view('landing.php');
      }
  }

  // Forgotten Password 2st Method, link clicked
  public function mailPassword($token){

      if(!isset($_SESSION)){
          session_start();
      }
      if(!isset($_SESSION["id"])) {

          $user = new User();
          $checkUser = $user->findToken($token);
    
          if ($checkUser != false) {

              $this->view("resetPassword.php", [
                  "id" => $checkUser['id'],
              ]);

          }

          else{
              $this->view('landing.php');
          }
      }

      else {
          $this->view('landing.php');
      }
  }

  // Forgotten Password 3rd Method, password change
  public function resetPassword(){

      if(!isset($_SESSION)){
          session_start();
      }
      if(!isset($_SESSION["id"])) {
          if (isset($_POST["password"])) {

              $user = new User();
              $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
              $user->changePassword($_POST["id"], $password);
              $this->connect();

          } else {
              $this->view("resetPassword.php");
          }

      }

      else{
          $this->view('landing.php', [
              "message" => "Mot de passe réinitialisé"
          ]);
      }

  }

  public function changePassword(){
      if(!isset($_SESSION)){
          session_start();
      }
      if(isset($_SESSION["id"])) {

          if(isset($_POST["oldPass"]) && isset($_POST["newPass"])){

              if($_POST["user"]===$_SESSION["id"]){
                  $user = new User();

                  $userFind = $user->findUserById($_POST["user"]);

                  if (password_verify($_POST['oldPass'], $userFind["password"]) === true) {

                      $password = password_hash($_POST["newPass"], PASSWORD_DEFAULT);
                      $user->changePassword($_POST["user"], $password);

                      $this->view('landing.php', [
                          "message" => "Mot de passe modifié",
                      ]);
                  }

                  else{
                      $this->view('changePassword.php', [
                          "message" => "Mauvais mot de passe",
                      ]);
                  }
              }

              else{
                  $this->view('changePassword.php');
              }
          }

          else{
              $this->view('changePassword.php');
          }
      }

      else{
          $this->connect();
      }

  }

  public function confidential(){
      $this->view('privacyPolice.php');
  }

  public function mentions(){
      $this->view('legalNotice.php');
  }


}
