<?php
require_once '../Config/conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier les informations d'identification de l'utilisateur
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM admin WHERE email = :email";
    $stmte = $conn->prepare($sql);
   
    $stmte->execute(['email' => $email]);


    if ($user && password_verify($password, $user['passwords'])) {
        // Authentification réussie
        session_start();
        $_SESSION['user_id'] = $user['id_users'];
        $_SESSION['username'] = $user['nom'];
        $_SESSION['email'] = $user['email'];
        header("Location: ../FrontEnd/main.php");
        exit();
    } else if ($stmte->rowCount() > 0) {
         
       
        // Authentification réussie pour l'admin
        header("Location: ../FrontEnd/admin.php");
        exit();
    } else {
        // Authentification échouée
        header("Location: ../FrontEnd/connexion.php?error=1");
        exit();
    }
} else {
    // Rediriger vers la page de connexion si la requête n'est pas POST
    header("Location: ../FrontEnd/connexion.php");
    exit();
}
