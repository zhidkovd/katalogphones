<?php
        $brand_query = $link->query("SELECT * FROM `table_brand`");

        while ($array_brand_query = mysqli_fetch_assoc($brand_query)) {
                echo "Brand: " . $array_brand_query["brand"];
        }

?>
