<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
           
        }
        main {
            max-width: 800px;
            margin: 0 auto;
            margin-top: 150px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        h2 {
            color: #09730c;
        }
        form {
            margin-top: 20px;
            width: 70%;
            display: flex;
            border-radius: 10px;
            flex-direction: column;
            gap: 20px;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        input[type="text"] {
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 24px;
            color: #1b0679;
            text-align: center;
        }
        input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php include '../include/heade.php'; ?>
    <main>
        <form action="../Backend/confirmation_cmd.php" method="post">
            <h2>Entrez le code de validation</h2>
            <input type="text" name="code"  required>
            <button type="submit">Valider la commande</button>
        </form>
    </main>
</body>
</html>