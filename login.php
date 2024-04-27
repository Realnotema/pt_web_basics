<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Цыганков А.А.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class=" row">
            <div class="col-12">
                <h1>Регистрация</h1>
            </div> 
        </div> 
        <div class="row">
            <div class="col-12">
                <form method="POST" action="login.php">
                    <div class="row form__log"><input class="form" type="text" name="login" placeholder= "Login"></div>
                    <div class="row form__log"><input class="form" type="password" name="password" placeholder= "Password"></div>
                    <button type="submit" class="btn_red btn_ log" name="submit">Продолжить</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);    
    require_once('bd.php');

    if (isset($_COOKIE['User'])) {
        header("Location: profile.php");
    }
    $link = mysqli_connect("127.0.0.1", "root", "tema", "first");
    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $pass = $_POST['password'];

        if (!$username || !$pass) die("Пожалуйста введите все значения!");

        $sql = "SELECT * FROM users WHERE username='$login' AND password='$pass'";    
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 1) {
            setcookie("User", $username, time()+7200);
            header('Location: profile.php');
          } else {
            echo "неправильное имя или пароль";
          }
    }
?>
