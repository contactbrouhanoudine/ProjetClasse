<?php
    session_start();
    require_once '../Config/conn.php';

    if (isset($_GET['id'])) {
        $id_prod = $_GET['id'];

        // Récupérer les informations du produit
        $sql = "SELECT * FROM produit WHERE id_prod = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id_prod);
        $stmt->execute();
        $produit = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($produit) {
            // Ajouter au panier
            if (!isset($_SESSION['panier'])) {
                $_SESSION['panier'] = array();
            }

            $_SESSION['panier'][] = $produit;
            header("Location: ../FrontEnd/panier.php");
            exit();
        }
    }
?>

?>