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

$brand = mysqli_real_escape_string($link, $_POST['selectedBrand']);
$model = mysqli_real_escape_string($link, $_POST['selectedModel']);
$name_spec = mysqli_real_escape_string($link, $_POST['name_spec']);
$spec = mysqli_real_escape_string($link, $_POST['spec']);


if (empty($brand) || empty($model) || empty($name_spec) || empty($spec)) {
    echo "Не полные данные!";
} else {
    $sql_spec = "INSERT INTO `table_specification` (name, brand, model, description) VALUES ('$name_spec', '$brand', '$model', '$spec')";
    if ($link->query($sql_spec)) {
        echo "Данные добавились!";
    } else {
        echo "Ошибка при добавлении данных: " . $link->error;
    }
}
?>
</div>
</body>
</html>
