<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/ajouter_produit.css">
</head>
<body>
    <header>
        <nav>
            
                <div class="element">
                    <p>My Big Shop</p>
                </div>
                <div class="user-info">
                    <span><a href="../Backend/deconnexion.php">Deconnexion</a></span>
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
                <form action="../Backend/ajouter_produit.php" method="post" enctype="multipart/form-data">
                <h2>Ajouter un Produit</h2>
                <div class="form-group">
                    <label for="nom">Nom du produit:</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="stock">stock:</label>
                    <input type="text" id="stock" name="stock" required>
                </div>
                <div class="form-group">
                    <label for="prix">Prix:</label>
                    <input type="number" id="prix" name="prix" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="quantite">Quantité en stock:</label>
                    <input type="number" id="quantite" name="quantite" min="0" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit">Ajouter le produit</button>
               </form>
            </div>
            <div class="chart">
                <h2>Activité Récente</h2>
                <p style="margin-top: 20px; color: #999;">Graphiques et statistiques à venir...</p>
            </div>
        </div>
    </div>
</body>
</html>