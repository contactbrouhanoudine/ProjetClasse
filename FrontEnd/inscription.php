<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/inscription.css">
</head>
<body>
    <?php
        include "../include/heade.php";
    ?>
    <div class="container">
        <h2>Inscription</h2>
        <form action="../BackEnd/inscription.php" method="POST">
                <?php if (isset($_GET['error'])): ?>
                    <p style="color: red;text-align: center;margin-bottom: 15px;font-weight: bold;"><?php echo "Cet addresse email existe déjà. Veuillez en choisir un autre."; ?></p>   
                <?php endif; ?>
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="btn">
                <button type="submit">S'inscrire</button>
            </div>
        </form>
    </div>
<?php include '../include/footer.php'; ?>
</body>
</html>