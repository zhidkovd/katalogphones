<?php

        $mysql_host = "localhost";
        $mysql_login = "root";
        $mysql_password = "P@ssw0rd";
        $mysql_db = "katalogphones";

        # Connect to MySQL Server:
        $link = mysqli_connect($mysql_host, $mysql_login, $mysql_password, $mysql_db);

        if ($link == false) {
                die('Ошибка подключения ('.$link->connect_errno.') '.$link->connect_error);
	}
?>
