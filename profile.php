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
    <div class="container nav_bar">
        <div class="row">
            <div class="col-4">
                <p class='nav_logo'>
            </div>
            <div class="col-4">
                <b>Информация обо мне</b>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                Меня зовут Артем! Я занимаюсь наукой 
                в сфере обеспечения информационной 
                безопасности сетевой инфраструктуры предприятия :)
                Меня зовут Артем! Я занимаюсь наукой 
                в сфере обеспечения информационной 
                безопасности сетевой инфраструктуры предприятия :)
                Меня зовут Артем! Я занимаюсь наукой 
                в сфере обеспечения информационной 
                безопасности сетевой инфраструктуры предприятия :)
                Меня зовут Артем! Я занимаюсь наукой 
                в сфере обеспечения информационной 
                безопасности сетевой инфраструктуры предприятия :)
            </div>
            <div class="col-4">
                <div class="row my_photo"></div>
                <div class="row">Цыганков А.А.</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="button_js col-12">
                <button id="myButton">Click Me</button>
                <p id="demo"></p>
            </div>
        </div>
    </div>
    <div class="container"> 
    <div class="row">
        <div class="col-12">
            <h1 class="hello">Привет, <?php echo $_COOKIE['User']; ?> </h1>
        </div> 
        <div class="col-12">
            <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                <div class="col-12">
                    <input type="text" class="form" name="title" placeholder="Заголовок вашего поста">
                </div>
                <div class="col-12">
                    <textarea name="text" cols="30" rows="10" placeholder="Введите текст вашего поста ..."></textarea>
                </div>
                <div class="col-12">
                    <input type="file" name="file" /><br>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn_red" name="submit">Сохранить пост!</button>
                </div>
            </form> 
        </div>
    </div>
</div> 
    <script type="text/javascript" src="button.js"></script>
</body>
</html>

<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1); 
    require_once('bd.php');
    $link = mysqli_connect('127.0.0.1', 'root', 'tema', 'first');
    if (isset ($_POST ['submit'])) {
        $title = $_POST[ 'title'];
        $main_text = $_POST [ 'text'];

        if (!$title || !$main_text) die("Заполните все поля");

        if(!empty($_FILES["file"])) {
            if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
            || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
            || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
            && (@$_FILES["file"]["size"] < 102400))
            {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
            }
            else
            {
                echo "upload failed!";
            }
        }

        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";
        
        if(!mysqli_query ($link, $sql)) die("не удалось добавить пост");
}
?>