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
	$model = $_POST['model'];
	$name_spec = $_POST['name_spec'];
	$spec = $_POST['spec'];

	$sql_check_brand = "SELECT brand FROM `table_brand` WHERE brand = '$brand'";
	$check_brand = mysqli_query($link, $sql_check_brand);
	$sql_check_model = "SELECT brand FROM `table_model` WHERE model = '$model'";
        $check_model = mysqli_query($link, $sql_check_model);

	if ($check_brand) {
		if (mysqli_num_rows($check_brand) > 0) {
			echo "Данный бренд уже добавлен)<br>";
                } else {
                        $sql_brand = "INSERT INTO `table_brand` (brand) VALUES ('$brand')";
                        $link -> query($sql_brand);
                }
        } else {
                echo 'Error: ' . mysqli_error();
        }

        if ($check_model) {
		if (mysqli_num_rows($check_model) > 0) {
			echo "Данная модель уже добавлена)<br>";
		} else {
                        $sql_model = "INSERT INTO `table_model` (model) VALUES ('$model')";
                        $link -> query($sql_model);
                }
        } else {
                echo 'Error: ' . mysqli_error();
        }

	if (empty($brand) || empty($model) || empty($name_spec) || empty($spec)) {
		echo "Не полные данные!";
	} else {
		#$sql_brand = "INSERT INTO `table_brand` (brand) VALUES ('$brand')";
		#$sql_model = "INSERT INTO `table_model` (model) VALUES ('$model')"; 
		$sql_spec = "INSERT INTO `table_specification` (name, brand, model, description) VALUES ('$name_spec', '$brand', '$model', '$spec')";
		#$link -> query($sql_brand);
		#$link -> query($sql_model);
		$link -> query($sql_spec);
		echo "Данные добавились!";
	}
?>
</div>
</body>
</html>
