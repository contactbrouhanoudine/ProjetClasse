<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <style>
       .produit {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
            margin-left: 30px;
            margin-right: 30px;
            margin-bottom: 50px;
        }
        .card {
            border-radius: 10px;
            width: 300px;
            text-align: center;
            height: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card img {
            width: 100%;
            margin: 0;
           border-top-left-radius: 10px;
           border-top-right-radius: 10px;
            height: 200px;
        }
        .card h3 {
            margin: 10px 0;
        }
        .card p {
           
        }
        .btn {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            margin-left: 10px;
             margin-right: 10px;
             margin-bottom: 20px;
        }
        .btn a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn a:hover {
            background-color: #0056b3;
        }
        .value{
            display: flex;
            justify-content: space-around;
            align-items: center;

        }

    </style>
</head>
<body>
    <?php include '../include/heade.php'; ?>
    <main class="container" id="container">
        
        <section class="accueil">
            <div class="principal">
                <h2>Bienvenue sur notre boutique</h2>
                <p>Découvrez nos derniers produits et profitez de nos offres spéciales.
                    Nous sommes ravis de vous accueillir dans notre boutique en ligne.
                    Merci de choisir notre boutique pour vos besoins d'achat en ligne!   
                </p>
                <div class="start">
                    <p><a href="produits.php">Découvrir nos produits</a></p>
                    <p><a href="FrontEnd/inscription.php">Commencer</a></p>
                </div>
                
            </div>
            <div class="image">
                <img src="../image/commerce.jpg" alt="Boutique en ligne">
            </div>
        </section>
        <section class="produit" id="produit">
            <?php
                require_once '../Config/conn.php';
                $sql = "SELECT * FROM produit";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($produits as $produit) {
                   ?> 
                    <div class="card">
                        
                        <img src="../uploads/<?php echo $produit['image']; ?>" alt="<?php echo $produit['nom_prod']; ?>">
                        <div class="value"><p>Produit: </p><h3>  <?php echo  $produit['nom_prod']; ?></h3></div>
                        <div class="value"><p>Stock: </p><h3><?php echo $produit['stock']; ?></h3></div>
                        <div class="value"><p>Prix: </p><h3><?php echo $produit['prix']; ?> FCFA</h3></div>
                        <div class="btn">
                                <p><a href="../Backend/ajouter_panier.php?id=<?php echo $produit['id_prod']; ?>">Ajouter au panier</a></p>
                                 <p><a href="produits.php">Commander</a></p>
                        </div>
                       
                    </div>
                    <?php
                     
                }


            ?>

        </section>
    
    </main>
    <?php include '../include/footer.php'; ?>
</body>
</html>