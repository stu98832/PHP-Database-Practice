<?php 
    /* 載入資料庫 */
    include("database.php");
    
    /* 透過GET取得頁面名稱(默認為index.php) */
    $page = (isset($_GET["page"]) ? $_GET["page"] : "index.php");
    
    /* 載入網頁頭端 */
    include("template/header.php");
    
    /* 載入網頁頁面 */
    if (file_exists("page/$page.php"))
    {
        include("page/$page.php");
    }
    else
    {
        include("page/index.php");
    }
    
    /* 載入網頁尾端 */
    include("template/footer.php");
?>