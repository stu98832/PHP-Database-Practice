<?php 
    /* database 設定 */
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "12345678";
    $db_database = "member";
    
    /* 連接 database */
    $db_connect = @mysql_connect($db_host, $db_user, $db_password) or die("Could not link to database.");
    $db_db_connect = @mysql_select_db($db_database, $db_connect) or die("Could not get database.");
?>