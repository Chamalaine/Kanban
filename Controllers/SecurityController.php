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
    $this->view('connect.php');
  }

  //Connection
  public function connect(){

      session_start();
      if(!isset($_SESSION['id'])) {
          if (isset($_POST['email']) && isset($_POST['password'])) {
              $user = new User();
              $userFind = $user->findUserByEmail($_POST['email']);

            
              if ($userFind != false && password_verify($_POST['password'], $userFind["password"]) === true) {

                  $_SESSION["id"] = $userFind["id"];
                  $_SESSION["auth"] = 
                  $this->view('home.php', [
                      'message' => "Vous êtes connecté",
                  ]);
              }
              else {
                  $this->view('connect.php', [
                      'message' => "Mauvais identifiants",
                  ]);
              }
          }
          else {
              $this->view('connect.php');
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
    session_unset();


    $this->view('landing.php');



  }


  //Register
  public function register(){

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
                  $register_date = new \DateTime();

                  $user->createUser($email, $password, $pseudo, $register_date);

                  $newUser = $user->findUserByEmail($email);

                  $this->session();
                  $this->isAuth();

                  $_SESSION["id"] = $newUser["id"];

                  $this->view('landing.php');

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
      session_start();
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

                  $message = (new Swift_Message("Oubli mot de passe"))
                      ->setFrom(['surassur.amc@gmail.com'])
                      ->setTo([$email])
                      ->setBody("http://localhost/kanlo/security/mailpassword/" . $token);

                  $mailer->send($message);

                  $this->view("landing.php",[
                      "message" => "Email d'oubli de mot de passe envoyé"
                  ]);
              }

          } else {
              $this->view('forgotten.php');
          }
      }

      else{
          $this->view('landing.php');
      }
  }

  // Forgotten Password 2st Method, link clicked
  public function mailPassword($token){

      session_start();
      if(!isset($_SESSION["id"])) {

          $user = new User();
          $checkUser = $user->findToken($token);
          var_dump($checkUser);

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
          $this->view('landing.php');
      }

  }

  public function changePassword(){

      if(isset($_SESSION["id"])) {

          session_start();
          if(isset($_POST["oldPass"]) && isset($_POST["newPass"])){

              if($_POST["user"]===$_SESSION["id"]){
                  $user = new User();

                  $userFind = $user->findUserById($_POST["user"]);

                  if (password_verify($_POST['oldPass'], $userFind["password"]) === true) {

                      $password = password_hash($_POST["newPass"], PASSWORD_DEFAULT);
                      $user->changePassword($_POST["user"], $password);

                      $this->view('home.php', [
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
                  $this->view('changePassword.php', [
                      "message" => "Erreur id",
                  ]);
              }
          }

          else{
              $this->view('changePassword.php', [
                  "message" => "post truc muche",
              ]);
          }
      }

      else{
          $this->connect();
      }

  }


}
