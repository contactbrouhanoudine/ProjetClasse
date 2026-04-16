<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/admin.css">
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
                <li><a href="liste_commandes.php"><i class="fas fa-shopping-cart"></i> Commandes</a></li>
                <li><a href="statistiques.php"><i class="fas fa-chart-bar"></i> Statistiques</a></li>
                <li><a href="parametres.php"><i class="fas fa-cog"></i> Paramètres</a></li>
                <li><a href="deconnexion.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </div>
        
        <div class="main">
            <div class="header">
                <h1>Tableau de Bord</h1>
                
            </div>
            <?php
                // Connexion à la base de données
                require_once '../Config/conn.php';
                // Récupération du nombre d'utilisateurs
                $sql = "SELECT COUNT(*) AS total_users FROM users";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_users = $result['total_users'];
                
                // Récupération du nombre de produits
                $sql = "SELECT COUNT(*) AS total_products FROM produit";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_products = $result['total_products'];
                
                // Récupération du nombre de commandes
                $sql = "SELECT COUNT(*) AS total_orders FROM commande";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_orders = $result['total_orders'];
                
                // Récupération des revenus totaux
                $sql = "SELECT SUM(total) AS total_revenue FROM commande";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $total_revenue = number_format($result['total_revenue'], 2, ',', ' ');
                ?>
            
            <div class="cards">
                <div class="card">
                    <h3><i class="fas fa-users"></i> Utilisateurs</h3>
                    <p><?= $total_users ?></p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-box"></i> Produits</h3>
                    <p><?= $total_products ?></p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-shopping-cart"></i> Commandes</h3>
                    <p><?= $total_orders ?></p>
                </div>
                <div class="card">
                    <h3><i class="fas fa-dollar-sign"></i> Revenus</h3>
                    <p>€<?= $total_revenue ?></p>
                </div>
            </div>
            
            <div class="chart">
              
            </div>
            <div class="chart">
                <h2>Activité Récente</h2>
                <p style="margin-top: 20px; color: #999;">Graphiques et statistiques à venir...</p>
            </div>
        </div>
    </div>
</body>
</html>