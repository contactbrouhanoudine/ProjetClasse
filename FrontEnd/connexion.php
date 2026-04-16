<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/connexion.css">
</head>
<body>
    <?php 
        include '../include/heade.php';
    ?>
    <div class="container">
        <h2>Se connecter</h2>
        <form action="../Backend/connexion.php" method="POST" >
            <?php if (isset($_GET['error'])): ?>
                <p style="color: red;"><?php echo "Nom d'utilisateur ou mot de passe incorrect."; ?></p>  
            <?php endif; ?>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="btn">
                <button type="submit">Se connecter</button>
            </div>
            <p>Pas de compte? <a href="inscription.php">Inscrivez-vous</a></p>
        </form>
</body>
</html>