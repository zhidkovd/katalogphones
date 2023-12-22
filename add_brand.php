<!doctype html>
<html lang="ru">
<head>
<title>Мобильные телефоны</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container mt-2">
<header>
<h2><a href="index.php" class="link-offset-2 link-underline link-underline-opacity-25">Главная</a></h2>
<h5><a href="about.php" class="link-offset-2 link-underline link-underline-opacity-25">Автор</a></h5>
</header>

<?php
        include 'connect_to_mysql.php';

        $brand = $_POST['brand'];

        if (empty($brand)) {
                echo "Не полные данные!";
        } else {
                $sql_brand = "INSERT INTO `table_brand` (brand) VALUES ('$brand')";
                $link -> query($sql_brand);
                echo "Данные добавились!";
        }
?>
</div>
</body>
</html>
