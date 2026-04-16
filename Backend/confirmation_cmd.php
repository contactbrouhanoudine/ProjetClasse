<?php
include '../Config/conn.php';
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
   $code = $_POST['code'];

   $req = $conn->prepare("SELECT * FROM commande WHERE token = :code");
   $req->bindParam(':code', $code);
   $req->execute();
  

   if($req->rowCount() > 0) {
       // Code de vérification correct, rediriger vers la page de confirmation
    $commandeId = $_SESSION['id_cmd'];
    $produitId = $_SESSION['id_prod']; // Récupérer l'ID de la commande insérée

 // Insérer les détails de la commande
    foreach ($_SESSION['panier'] as $id => $produit) {
        $sql = "INSERT INTO detail_commande (id_prod, id_cmd, qte, prix) VALUES (:id_prod, :id_cmd, :quantite, :prix)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_prod', $produitId);
        $stmt->bindParam(':id_cmd', $commandeId);
        $stmt->bindParam(':quantite', $produit['stock']);
        $stmt->bindParam(':prix', $produit['prix']);
        $stmt->execute();
    }

    // Vider le panier après la validation de la commande
    unset($_SESSION['panier']);

    header("Location: ../FrontEnd/main.php");
    exit();
   } else {
       // Code de vérification incorrect, afficher un message d'erreur
       header("Location: ../FrontEnd/confirmation.php?error=1");
       exit();
      
   }


   
}

















?>