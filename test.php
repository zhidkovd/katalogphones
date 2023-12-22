<?php
include 'connect_to_mysql.php';

// Получение списка брендов из таблицы table_brand
$sql_brands = "SELECT * FROM table_brand";
$result_brands = $link->query($sql_brands);

// Обработка выбора бренда
if (isset($_POST['brand'])) {
    $selected_brand = $_POST['brand'];

    // Получение списка моделей для выбранного бренда из таблицы table_model
    $sql_models = "SELECT * FROM table_model WHERE brand = '$selected_brand'";
    $result_models = $link->query($sql_models);
} else {
    $selected_brand = null;
    $result_models = null;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Выбор бренда и модели</title>
</head>
<body>
    <form method="post" action="">
        <label for="brand">Бренд:</label>
        <select name="brand" id="brand">
            <option value="">Выберите бренд</option>
            <?php while ($row = $result_brands->fetch_assoc()): ?>
                <option value="<?php echo $row['brand']; ?>" <?php if ($selected_brand == $row['brand']) echo 'selected'; ?>><?php echo $row['brand']; ?></option>
            <?php endwhile; ?>
        </select>

        <label for="model">Модель:</label>
        <select name="model" id="model">
            <option value="">Выберите модель</option>
            <?php if ($result_models && $result_models->num_rows > 0): ?>
                <?php while ($row = $result_models->fetch_assoc()): ?>
                    <option value="<?php echo $row['model']; ?>"><?php echo $row['model']; ?></option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>

        <input type="submit" value="Отправить">
    </form>
</body>
</html>

<?php
// Закрытие соединения с базой данных
$link->close();
?>
