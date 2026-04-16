<?php
require_once '../Config/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verification_code = $_POST['verification_code'];

    

        // Vérifier le code de vérification
    $stmt = $conn->prepare("SELECT * FROM users WHERE token = :verification_code");
    $stmt->bindParam(':verification_code', $verification_code);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        header("Location: ../FrontEnd/main.php");
        exit();
    } else {
        // Code de vérification incorrect
        header("Location: ../FrontEnd/verification.php?error=1");
        exit();
    }

    
}







?>