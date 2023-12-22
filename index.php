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
echo "<h5><p><b>В базе данных предоставлены следующие бренды и их модели:</b></p></h5>";
$sql_brand = "SELECT * FROM table_brand";
$sql_model = "SELECT * FROM table_model";
$sql_spec = "SELECT * FROM table_specification";
$sql_desc = "SELECT * FROM table_description";
$result_brand = mysqli_query($link, $sql_brand);
$result_model = mysqli_query($link, $sql_model);
$result_spec = mysqli_query($link, $sql_spec);
$result_desc = mysqli_query($link, $sql_desc);

$brands = [];
while ($i = mysqli_fetch_assoc($result_brand)) {
    $brands[] = $i;
}

$models = [];
while ($i = mysqli_fetch_assoc($result_model)) {
    $models[] = $i;
}

$specs = [];
while ($i = mysqli_fetch_assoc($result_spec)) {
    $specs[] = $i;
}

$descs = [];
while ($i = mysqli_fetch_assoc($result_desc)) {
    $descs[] = $i;
}

foreach ($brands as $brand) {
    	echo "<b>Бренд: </b>" . $brand['brand'] . "<br><b>Модели бренда:</b><br>";
    	mysqli_data_seek($result_model, 0);
    	foreach ($models as $model) {
        	if ($model['brand'] === $brand['brand']) {
			echo $model['model'] . "<br><b>Его характеристики:</b><br>";
			mysqli_data_seek($result_spec, 0);
			foreach ($specs as $spec) {
				if ($spec['model'] === $model['model']) {
					echo $spec['name'] . ": ". $spec['description'] . "<br>";
				}
			}

			echo "<b>Его описание:</b> ";
			foreach ($descs as $desc) {
				if ($desc['model'] === $model['model']) {
					echo  $desc['description'] . "<br>";
				}
			}
			echo "<br>";

        	}
    	}
	echo '<hr class="hr-success" /><br>';
}

/*
foreach ($brands as $brand) {
    echo "<p><b>Бренд: </b>" . $brand['brand'] . "<br><b>Модели бренда:</b><br>";
    mysqli_data_seek($result_model, 0); 
    while ($j = mysqli_fetch_assoc($result_model)) {
        if ($j['brand'] === $brand['brand']) {
            echo $j['model'] . "<br>";
        }
    }
    echo "</p>";
}
 */
mysqli_close($link);
?>


<p>
<h5><p><b>Добавить модель: </b></p></h5>
<form action="add_model.php" method="POST">
        <input type="text" placeholder="Введите бренд" name="brand" class="form-control"><br>
	<input type="text" placeholder="Введите модель" name="model" class="form-control"><br>	
	<input type="submit" value="Добавить" class="btn btn-success">
	<hr class="hr-success" /><br>
</form>
</p>


<h5><p><b>Добавить характеристику к модели: </b></p></h5>
<form action="add_spec.php" method="POST">

<label for="brandDropdown">Выберите бренд:</label>
<select id="brandDropdown" name="selectedBrand">
<?php

	include 'connect_to_mysql.php';

        $result = mysqli_query($link, "SELECT DISTINCT brand FROM table_brand");

        while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['brand'] . "'>" . $row['brand'] . "</option>";
        }

?>
</select>


<label for="modelDropdown">Выберите модель:</label>
<select id="modelDropdown" name="selectedModel">
<?php
	$result = mysqli_query($link, "SELECT DISTINCT model FROM table_model");

        while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['model'] . "'>" . $row['model'] . "</option>";
        }

	mysqli_close($link);

?>
</select>


<hr class="hr-success" /><br>
<input type="text" placeholder="Введите название характеристики" name="name_spec" class="form-control"><br>
<input type="text" placeholder="Введите характеристику" name="spec" class="form-control"><br>
<input type="submit" value="Добавить" class="btn btn-success"><br>
</form>
</div>
</body>
</html>
