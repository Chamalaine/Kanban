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
    $this->view('login.php', [
      'test' => 'Mon login !',
      'var' => 45,
    ]);
  }

  //Connection
  public function connect(){
      if(isset($_POST['email']) && isset($_POST['password'])){

        $user = new User();
        $userFind=$user->findUser($_POST['email']);


        if(password_verify($_POST['password'], $userFind["password"])===true ){

            $this->session()['id']=$userFind["id"];

            $this->view('home.php', [
                'message' => "Vous êtes connecté",
            ]);
        }
        else{
            $this->view('connect.php', [
                'message' => "Mauvais mot de passe",
            ]);
        }
      }
      else{
          $this->view('connect.php');
      }
  }


  //Register
  public function register(){
      if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['pseudo'])){

          $user = new User();
          $checkUser=$user->findUser($_POST['email']);

          //Unique Email check
          if($checkUser===false){
              $email=$_POST['email'];

              //Password Crypt
              $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
              $pseudo=$_POST['pseudo'];
              $register_date = new \DateTime();

              $user->createUser($email,$password,$pseudo,$register_date);

              $newUser =$user->findUser($email);

              $this->session()['id']=$newUser["id"];

              $this->view('landing.php');

          }

          else{
              $this->view('register.php', [
                  "message" => "Email déjà utilisé",
              ]);
          }

      }


      else{
          $this->view('register.php');
      }
  }


  // Forgotten Password 1st Method
  public function forgotten(){

      if(isset($_POST['email'])){

          $email = $_POST['email'];
          $user= new User();
          $checkUser = $user->findUser($email);

          if($checkUser!=false){

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
                  ->setBody("http://localhost/kanlo/security/mailpassword/".$token);

              $mailer->send($message);
          }

      }

      else{
          $this->view('forgotten.php');
      }
  }


  public function mailPassword($token){

      $user = new User();
      $checkUser = $user->findToken($token);

      if($checkUser!=false){

              $this->view("resetPassword.php", [
                  "id" => $checkUser['id'],
              ]);

      }

  }

  public function resetPassword(){

      if(isset($_POST["password"])){
          $user = new User();


          $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
          $user->changePassword($_POST["id"],$password);


      }

      else{
          $this->view("resetPassword.php");
      }

  }


}
