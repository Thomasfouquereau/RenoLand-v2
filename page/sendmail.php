<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Maintenant, vous pouvez accéder à vos variables d'environnement avec getenv()
$smtp_host = getenv('SMTP_HOST');
$smtp_username = getenv('SMTP_USERNAME');
$smtp_password = getenv('SMTP_PASSWORD');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $ville = $_POST["ville"];
    $telephone = $_POST["telephone"];
    $services = $_POST["services"];

    $to = "contact@renolandes.com";
    $subject = "Nouveau message de $nom $prenom";
    $message = "Nom: $nom\n".
               "Prénom: $prenom\n".
               "Email: $email\n".
               "Description: $description\n".
               "Ville: $ville\n".
               "Téléphone: $telephone\n".
               "Services: $services";

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 
        $mail->isSMTP();                                      
        $mail->Host = $smtp_host;  
        $mail->SMTPAuth = true;                               
        $mail->Username = $smtp_username;                 
        $mail->Password = $smtp_password;                           
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 465;                                    

        //Recipients
        $mail->setFrom($email, $nom);
        $mail->addAddress($to);     

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>