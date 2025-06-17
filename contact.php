<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et nettoyage des données envoyées
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Paramètres de l'email
    $to = "ss.securiteprivee@gmail.com"; // Remplacez par votre adresse email
    $subject = "Nouveau message de contact de $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Construction du corps du message
    $body = "Nom : $name\n";
    $body .= "Email : $email\n";
    $body .= "Message :\n$message\n";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Merci, votre message a été envoyé avec succès !";
    } else {
        echo "Une erreur s'est produite lors de l'envoi de votre message.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>