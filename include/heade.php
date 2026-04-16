<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .head-content{
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .head-content nav{
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .head-content nav .title{
            display: flex;
            align-items: center;
        }
        .head-content nav .title img{
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }
        .head-content nav .element a{
            color: #f3bc08;
            text-decoration: none;
            margin-left: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .logo{
            width: 70px;
            height: 70px;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eae8e1;
            border-radius: 50%;
            margin-left: -40px;
        }
    </style>
</head>
<body>
    <header class="head-content">
        <nav>
            <div class="title">
                <div class="logo">
                    <img src="../image/commerce-electronique.png" alt="Logo de la boutique">
                </div>
                <h1>My Shop</h1>
            </div>
           <div class="element">
             <a href="../FrontEnd/main.php#container">Accueil</a>
            <a href="../FrontEnd/main.php#produit">Produits</a>
            <a href="../FrontEnd/panier.php">Panier</a>
            <?php
                
                if(isset($_SESSION['username'])){
                    echo '<a href="../Backend/deconnexion.php">Déconnexion</a>';
                }else{
                    echo '<a href="../FrontEnd/connexion.php">Connexion</a>';
                }
            ?>
           </div>
        </nav>
    </header>
</body>
</html>