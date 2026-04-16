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
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #756d6d;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(110, 110, 110, 0.1);
            margin-top: 150px;
            
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        input {
            width: 50%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
            color: #1b0679;
        }
        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            
        }
        button:hover {
            background-color: #0056b3;
        }
        .btn{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px; 

        }
        h2{
            text-align: center;
            margin-bottom: 30px;
            color: #1b0679;
        }
        input:focus{
            border-color: #007bff;
            outline: none;
        }
        p{
            margin-top: 20px;
            text-align: center;
            color: #1b0679;
            font-size: 18px;

        }
        .btn{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px; 

        }
    </style>
</head>
<body>
    <?php include '../include/heade.php';?>
    <div class="container">
        <h2>Vérification de votre compte</h2>
        <p>Un code de vérification a été envoyé à votre adresse e-mail. Veuillez entrer ce code ci-dessous pour vérifier votre compte.</p>
        <form action="../Backend/verification.php" method="POST">
            <?php if (isset($_GET['error'])): ?>
                <p style="color: red;"><?php echo "Code de vérification incorrect. Veuillez réessayer."; ?></p>
            <?php endif; ?>
            <div class="form-group">
                <input type="text" id="verification_code" name="verification_code" required>
            </div>
            <div class="btn"><button type="submit">Vérifier</button></div>
        </form>
    </div>

</body>
</html>