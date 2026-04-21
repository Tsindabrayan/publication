<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'PHPMailer/src/Exception.php';
 require 'PHPMailer/src/PHPMailer.php';
 require 'PHPMailer/src/SMTP.php';



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom =htmlspecialchars($_POST["nom"]);
    $email =htmlspecialchars($_POST["email"]);
    $sujet =htmlspecialchars($_POST["sujet"]);
    $message =htmlspecialchars($_POST["message"]);
   
  


    $mail = new PHPMailer(true);

    try{
        //parametre SMTP GMAIL
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'partnersbiyog@gmail.com';
        $mail->Password = 'ebyvflfixuupraoe';//vous devez activer la double validation et mettre sont mots de passe ici
        $mail->SMTPSecure= 'tls';
        $mail->Port = 587;

            //destination

        $mail->setFrom('partnersbiyog@gmail.com','Mr. biyogpartner');

        $mail->addAddress('partnersbiyog@gmail.com','Mr. biyogpartner');

        //contenu html

        $mail -> isHTML(true);
        $mail->subject = "nouveau message depuis le site de Biyog parteneur";

        $mail->Body ="
           <h2>Nouveau message via le site de Biyog parteneur</h2>

            <p><strong>Nom :</strong>{{$nom}}</p>
            <p><strong>email :</strong>{{$email}}</p>
            <p><strong>sujet :</strong>{{$sujet}}</p>
            <p><strong>message :</strong></p>
            <p>{{$message}}</p>
        ";

          $mail->AltBody= "nom: $nom
            \nEmail : $email
            \nsujet: $sujet
            \nmessage:$message";

          $mail->send();
          echo "message envoyer avec sucees";


    }catch(Exception $e){
        echo "echec de l'envoie : {$mail ->ErrorInfo}";
    }

}else{
    echo"methode non autorise";
}
?>