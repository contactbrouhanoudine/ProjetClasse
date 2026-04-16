<?php
require_once '../Config/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $stock = $_POST['stock'];
    $prix = $_POST['prix'];
    $image = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image);

    $sql = "INSERT INTO produit (nom_prod, prix, stock,  image) VALUES (:nom, :prix, :stock, :image)";
   $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':image', $image);
   $stmt->execute();

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        header("Location: ../FrontEnd/liste_produit.php");
        exit();
    } else {
        echo "Désolé, une erreur s'est produite lors de l'ajout du produit.";
    }



}















?>