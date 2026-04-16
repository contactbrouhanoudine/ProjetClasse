<?php
require_once '../Config/conn.php';
include '../PHPMailer/PHPMailerAutoload.php';


if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(3)); // Générer un token de vérification 
   
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
       header("Location: ../FrontEnd/inscription.php?error=1");
        exit();
    }


    // Insérer les données dans la base de données
    $stmt = $conn->prepare("INSERT INTO users (nom, email, passwords, token) VALUES (:username, :email, :password, :token)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':token', $token);


    if ($stmt->execute()) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $conn->lastInsertId();
      

        $mail = new PHPMailer;

        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'contact.brouhanoudine@gmail.com';                 // SMTP username
        $mail->Password = 'mtzk faqk ghku vnam';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('contact.brouhanoudine@gmail.com', 'Brouhanoudine');
        $mail->addAddress($email, $username);     // Add a recipient
                    // Name is optional
            // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Code de vérification';
        $mail->Body    = '<doctype html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <title>Code de vérification</title>
                            </head>
                            <body>
                                <p>Bonjour ' . $username . ',</p>
                                <p>Votre code de vérification est : 
                                    <h2 style="color: #1b0679;font-size: 24px;font-weight: bold;">' . $token . '</h2>
                                </p>
                                <p>Veuillez cliquer sur le lien suivant pour vérifier votre compte :
                                    <a href="http://localhost/ProjetClasse/FrontEnd/verification.php?token=' . $token . '">Vérifier mon compte</a></p>
                                <p>Cordialement,<br>L\'équipe Brouhanoudine</p>
                            </body>
                            </html>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            header("Location: ../FrontEnd/verification.php");
        exit();
        }
       
    } else {
        echo "Erreur lors de l'inscription. Veuillez réessayer.";
    }
} else {
    echo "Veuillez remplir tous les champs du formulaire.";
}
}





?>