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

	$sql_brand = "SELECT brand FROM table_brand";
	$sql_model = "SELECT model, brand FROM table_model";
	$result_brand = mysqli_query($link, $sql_brand);
	$result_model = mysqli_query($link, $sql_model);

        $brand = $_POST['brand'];
        $model = $_POST['model'];

	$sql_check = "SELECT brand FROM `table_brand` WHERE brand = '$brand'";
	$check = mysqli_query($link, $sql_check);

	if ($check) {
    		if (mysqli_num_rows($check) > 0) {
        		echo "Данный бренд уже добавлен)<br>";
    		} else {
        		$sql_brand = "INSERT INTO `table_brand` (brand) VALUES ('$brand')";
                	$link -> query($sql_brand);
    		}
	} else {
    		echo 'Error: ' . mysqli_error();
	}

        if (empty($brand) || empty($model)) {
                echo "Не полные данные!";
        } else {
                $sql_model = "INSERT INTO `table_model` (model, brand) VALUES ('$model', '$brand')";
                $link -> query($sql_model);
                echo "Данные о новой модели добавились!";
        }
?>
</div>
</body>
</html>
