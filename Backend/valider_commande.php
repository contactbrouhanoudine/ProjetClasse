<?php
require_once '../Config/conn.php';
include '../phpmailer/PHPMailerAutoload.php';
session_start();

if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
    $total = 0;
    foreach ($_SESSION['panier'] as $id => $produit) {
        $sousTotal = $produit['prix'] * $produit['stock'];
        $total += $sousTotal;
    }

    // Insérer la commande dans la base de données
    $produitId = $_GET['id'];
    $token = bin2hex(random_bytes(3)); // Générer un token unique pour la commande
    $sql = "INSERT INTO commande (id_prod, total, token) VALUES (:id_prod, :total, :token)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_prod', $produitId);
    $stmt->bindParam(':total', $total);
    $stmt->bindParam(':token', $token);
   
    if( $stmt->execute()){
        $_SESSION['id_cmd'] = $conn->lastInsertId();
        $_SESSION['id_prod'] = $produitId; // Stocker l'ID de la commande dans la session
        // Envoyer un email de confirmation
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->isHTML(true);
        $mail->Host = 'smtp.gmail.com'; // Remplacez par votre serveur SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'contact.brouhanoudine@gmail.com'; // Remplacez par votre adresse email
        $mail->Password = 'mtzk faqk ghku vnam'; // Remplacez par votre mot de passe
         $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('contact.brouhanoudine@gmail.com', 'Brouhanoudine');
        $mail->addAddress($_SESSION['email'], $_SESSION['username']);
        $mail->Subject = 'Confirmation de commande';
        $mail->Body = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <h1>Confirmation de commande</h1>
            <p style="color: #333; font-size: 16px;">
                Merci pour votre commande ! Votre numéro de commande est : ' . $token . '
            </p>
            <p>
                <a href="http://ProjetClasse/FrontEnd/confirmation.php?token=' . $token . '" style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                    Veuillez cliquer sur ce lien pour valider votre commande
                </a>
            </p>
            <p>Nous vous contacterons bientôt pour les détails de la livraison.</p>
        </body>
        </html> !';

        if (!$mail->send()) {
            echo 'Erreur lors de l\'envoi de l\'email: ' . $mail->ErrorInfo;
        } else {
            header("Location: ../FrontEnd/confirmation.php?token=" . $token);
            exit();
        }
    }

    // Récupérer l'ID de la commande insérée
    $commandeId = $conn->lastInsertId();

} else {
    echo "Votre panier est vide.";
}














?>