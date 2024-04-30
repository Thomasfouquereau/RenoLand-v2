<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Vérifiez si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $description = $_POST["description"];
    $ville = $_POST["ville"];
    $telephone = $_POST["telephone"];
    $services = $_POST["services"];

    // L'adresse e-mail à laquelle le message sera envoyé
    $to = "contactrenolandes@gmail.com";

    // Le sujet du message
    $subject = "mail de Renolandes de $nom $prenom pour $services";

    // Le contenu du message
    $message = "Nom: $nom\n".
               "Prénom: $prenom\n".
               "Email: $email\n".
               "Description: $description\n".
               "Ville: $ville\n".
               "Téléphone: $telephone\n".
               "Services: $services";

    // Les en-têtes du message
    $headers = "From: $email";

    // Envoyez le message
    if(mail($to, $subject, $message, $headers)) {
        echo "Message envoyé avec succès";
        header("refresh:1;url=https://www.renolandes.com/page/pageContact.html");
    } else {
        echo "<p style='color: red; font-size: 20px;'>Échec de l'envoi du message...</p>";
        // Redirigez apres 20 seconde l'utilisateur vers la page https://www.renolandes.com/page/pageContact.html
        header("refresh:5;url=https://www.renolandes.com/page/pageContact.html");
    }
}
?>