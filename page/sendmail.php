<?php
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
    $to = "contact@renolandes.com";

    // Le sujet du message
    $subject = "Nouveau message de $nom $prenom";

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
    } else {
        echo "Erreur lors de l'envoi du message";
    }
} else {
    // Si le formulaire n'a pas été soumis, affichez le code HTML
    // (insérez ici votre code HTML)
}
?>