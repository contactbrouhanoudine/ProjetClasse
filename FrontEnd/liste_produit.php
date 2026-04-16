<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/liste_produit.css">
</head>
<body>
    <header>
        <nav>
            
                <div class="element">
                    <p>My Big Shop</p>
                </div>
                <div class="user-info">
                    <span>Admin</span>
                    <i class="fas fa-user-circle" style="font-size: 40px; color: #667eea;"></i>
            </div>

        </nav>
    </header>
    

    <div class="container">
        <div class="sidebar">
            <h2><i class="fas fa-tachometer-alt"></i> Admin</h2>
            <ul>
                <li><a href="admin.php"><i class="fas fa-home"></i> Accueil</a></li>
                <li><a href="liste_users.php"><i class="fas fa-users"></i> Utilisateurs</a></li>
                <li><a href="liste_produit.php"><i class="fas fa-box"></i> Produits</a></li>
                <li><a href="#"><i class="fas fa-shopping-cart"></i> Commandes</a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i> Statistiques</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Paramètres</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </div>
        
        <div class="main">
            <div class="header">
                <h1>Tableau de Bord</h1>
                
            </div>
            <div class="chart">
                <div class="haut">
                    <h2>Liste des Produits</h2>
                    <a href="ajouter_produit.php"><button>Ajouter un Produit</button></a>
                </div>
                <?php
                // Connexion à la base de données
                require_once '../Config/conn.php';
                // Récupération des produits
                $sql = "SELECT * FROM produit";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Stock</th>
                            <th>Prix</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produits as $produit): ?>
                        <tr>
                            <td><?= $produit['nom_prod'] ?></td>
                            <td><?= $produit['stock'] ?></td>
                            <td><?= $produit['prix'] ?></td>
                            <td class="action">
                                <a href="modifier_produit.php?id=<?= $produit['id_prod'] ?>"><i class="fas fa-edit"></i></a>
                                <a href="supprimer_produit.php?id=<?= $produit['id_prod'] ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>