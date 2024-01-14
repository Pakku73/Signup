<?php

function login()
{

    $dbservername = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';

    $con = new mysqli("$dbservername", "$dbusername", "$dbpassword", "dbsingup") or die("Impossible de se connecter");

    if ($con->connect_error) {
        die('Erreur : ' . $con->connect_error);
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE email = '$email'"));

    $dbemail = $result['email'];
    $dbpassword = $result['password'];

    if ($email == $dbemail && password_verify($password, $dbpassword)) {
        print_r("true");
        header("Location:./config.php");
    } else {
        print_r("Connection échoué. L'email ou le mot de passe est incorrect");
    }

    $con->close();

}

if (isset($_POST["submit"])) {
    login();
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>

    <body>

        <div class="main_form">
            <div class="container">
                <form class="formulaire" action="singin.php" method="post">
                    <label for="" class="labelUp">E-mail or username:</label>
                    <input type="text" class="inputUp" name="email" placeholder="exemple@gmail.com">

                    <label for="" class="labelUp">Password :</label>
                    <input type="password" class="inputUp" name="password" placeholder="complex passord">

                    <button type="submit" name="submit">
                        <span>submit</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="singinBtn">
            <a href="singup.php">
                <button class="Btn">
                    <span>Sing up</span>
                </button>
            </a>
        </div>

        <footer>
            <p>Site sing up PHP</p>
        </footer>

    </body>

</html>