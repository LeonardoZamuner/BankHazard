<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        p a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <?php
        if (isset ($error_message)) {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Accedi">
        </form>
        <p>Non hai un account? <a href="registrazione.php">Registrati</a></p>
    </div>
</body>

</html>