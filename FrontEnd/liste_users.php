<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/liste_users.css">
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
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </div>
        
        <div class="main">
            <div class="header">
                <h1>Tableau de Bord</h1>
                
            </div>
            <div class="chart">
                <div class="haut">
                    <h2>Liste des utilisateurs</h2>
                </div>
                
                <?php
                // Connexion à la base de données
                require_once '../Config/conn.php';
                // Récupération des utilisateurs
                $sql = "SELECT * FROM users";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['nom'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td class="status"><?php if($user['status'] == 1){
                                echo "Actif";
                            } else {
                                echo "Inactif";
                            }
                                ?></td>
                           
                            <td class="action">
                                <a href="supprimer_produit.php?id=1"><i class="fas fa-trash"></i></a>
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