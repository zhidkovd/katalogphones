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
</header><br>

<?php 

include 'connect_to_mysql.php';
echo "<h5><p>В базе данных предоставлены следующие бренды: </p></h5>";
$sql_brand = "SELECT brand FROM table_brand";
$sql_model = "SELECT model, brand FROM table_model";
$result_brand = mysqli_query($link, $sql_brand);
$result_model = mysqli_query($link, $sql_model);
echo "<p>";
while ($i = mysqli_fetch_assoc($result_brand)) {
	echo "Бренд: " . $i['brand'] . "<br>";
}
echo "</p>";
echo "<p>";
echo "<h5><p>В базе данных предоставлены следующие модели: </p></h5>";
while ($i = mysqli_fetch_assoc($result_model)) {
	echo "Модель телефона: " . $i['brand'] . " " . $i['model'] . "<br>";
}
echo "</p>";

?>
<!--
<p>
<h5><p>Добавить бренд: </p></h5>
<form action="add_brand.php" method="POST">
        <input type="text" placeholder="Введите бренд" name="brand" class="form-control"><br>
        <input type="submit" value="Добавить" class="btn btn-success">
        <hr class="hr-success" /><br>
</form>
</p>
-->

<p>
<h5><p>Добавить модель: </p></h5>
<form action="add_model.php" method="POST">
        <input type="text" placeholder="Введите бренд" name="brand" class="form-control"><br>
	<input type="text" placeholder="Введите модель" name="model" class="form-control"><br>	
	<input type="submit" value="Добавить" class="btn btn-success">
	<hr class="hr-success" /><br>
</form>
</p>


<h5><p>Добавить характеристику к модели: </p></h5>
<form action="add_spec.php" method="POST">
	<input type="text" placeholder="Введите бренд" name="brand" class="form-control"><br>
	<input type="text" placeholder="Введите модель" name="model" class="form-control"><br>
	<hr class="hr-success" /><br>
	<input type="text" placeholder="Введите название характеристики" name="name_spec" class="form-control"><br>
	<input type="text" placeholder="Введите характеристику" name="spec" class="form-control"><br>
	<input type="submit" value="Добавить" class="btn btn-success"><br>
</form>
</div>
</body>
</html>
