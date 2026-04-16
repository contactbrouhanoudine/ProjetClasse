<?php   session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
            .a {
                text-decoration: none;
                color: white;
                background-color: #007BFF;
                padding: 8px 15px;
                border-radius: 5px;
                transition: background-color 0.3s ease;
               
            }
            .a:hover {
                background-color: #0056b3;
            }

            main {
                text-align: center;
                margin-top: 100px;
            }
            .btn{
                display: flex;
                justify-content: center;
                gap: 20px;
                margin-top: 30px;
                margin-bottom: 150px;

            }
        </style>
    </head>
    <body>
        <?php include '../include/heade.php'; ?>
        <header>
            <h1>Mon Panier</h1>
        </header>
        <main>
            <table border="1">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])){
                        $total = 0;
                        foreach($_SESSION['panier'] as $id => $produit) {
                            $sousTotal = $produit['prix'] * $produit['stock'];
                            $total += $sousTotal;
                            echo "<tr>
                                <td>" . htmlspecialchars($produit['nom_prod']) . "</td>
                                <td>" . number_format($produit['prix'], 2) . " €</td>
                                <td>" . $produit['stock'] . "</td>
                                <td>" . number_format($sousTotal, 2) . " €</td>
                                <td><a href='../Backend/supprimer_panier.php?id=" . $produit['id_prod'] . "'><i class='fas fa-trash'></i></a></td>
                            </tr>";
                        } 
                        echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>" . number_format($total, 2) . " €</strong></td></tr>";
                    } else {
                        echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
                    }
                    ?> 
                </tbody>
            </table>
            <div class="btn">
                <a href="main.php" class="a">Continuer les achats</a>
                <a href="../Backend/valider_commande.php?id=<?= $produit['id_prod'] ?>" class="a">Valider la commande</a>
            </div>
        </main>
        <?php include '../include/footer.php'; ?>
    </body>
    </html>
   