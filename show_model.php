<?php
        $model_query = $link->query("SELECT * FROM `table_model`");

        while ($array_model_query = mysqli_fetch_assoc($model_query)) {
                echo "Модель: " . $array_model_query["model"];
        }
