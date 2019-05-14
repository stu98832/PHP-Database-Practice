<div id="body">
    <h1>新增資料</h1>
    <hr>
    
    <?php 
        /* 如果POST的資料已經傳入，就做處理 */
        if (isset($_POST["ID"]))
        {
            /* 執行插入指令                                    */
            /* 由於資料庫內的number採自動遞增，因此這邊不填入數值 */
            mysql_query("INSERT INTO `member`(ID, PWD) VALUES('". $_POST["ID"] ."', '". $_POST["PWD"] ."')");
            
            /* 如果有新增資料，就印出"新增成功" */
            if (mysql_affected_rows() > 0)
            {
                echo "新增成功!";
            }
            else
            {
                echo "新增失敗";
            }
        }
    ?>
    <!-- HTML 表單 -->
    <form method="POST">
        <table>
            <tr>
                <td> ID : <td>
                <td>  <input type="text" class="inputbox"  name="ID"> </td>
            </tr>
            <tr>
                <td> Password : <td>
                <td>  <input type="password" class="inputbox"  name="PWD"> </td>
            </tr>
        </table>
        <br>
        <input type="submit" class="inputbutton" value="新增">
    </form>
    <br>
    <a href="index.php?page=index"><button class="inputbutton">回首頁</button></a>
</div>