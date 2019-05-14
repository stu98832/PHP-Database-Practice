<div id="body">
    <h1>刪除資料</h1>
    <hr>
    
    <?php 
        /* 如果POST的資料已經傳入，就做處理 */
        if (isset($_POST["account"]))
        {
            /* 因為是透過特別的方式紀錄number，所以才用foreach取 $Key => $Value($num => $account) */
            /* 表單的account變數儲存一筆資料，Key是鑰匙，Value是ID和PWD修改後的內容                */
            foreach ($_POST["account"] as $num => $account)
            {
                mysql_query("DELETE FROM `member` WHERE `number`='$num'");
            }

            /* 如果有刪除資料，就印出"刪除成功" */
            if (mysql_affected_rows() > 0)
            {
                echo "刪除成功!<br>";
            }
            else
            {
                echo "刪除失敗<br>";
            }
        }

        /* 先處理完刪除資料的部份後，再來處理搜尋最後一筆資料的部份       */
        /* 為了取得最後一筆資料，所以採用以"number"為排序依據，採降冪排序 */
        /* 由於number採用自動遞增，因此可以確保最後一筆資料的number為最大 */
        /* 搜尋完後所取得的第一筆資料就是最後一筆資料了                  */
        $result = mysql_query("SELECT * FROM `member` ORDER BY `number` DESC");
        $last_data = mysql_fetch_assoc($result);

        if (mysql_num_rows($result) == 0)
        {
            echo "資料庫沒有任何資料";
        } 
        else
        {
            echo "最後一筆資料：";
        }
        
    ?>
    <!-- 這邊採用特別的if判斷                                       -->
    <!-- 如果找不到最後一筆資料(也就是沒有資料了)                     -->
    <!-- 那這個if直到endif的部份都不會被輸出，也就是不會顯示修改表單了 -->
    <?php if ($last_data != null):?>
        <!-- 表單送出前給予確認，避免誤刪資料 -->
        <form method="POST" onsubmit="return confirm('刪除後無法還原，還要繼續？')">
            <!-- 使用Table做簡單的排版                             -->
            <!-- 輸入部份的name為account[number][變數]             -->
            <!-- 表示數值都會存入$_POST["account"][number][變數] 中 -->
            <table>
                <tr>
                    <td> ID : </td>
                    <td> <input type="text" class="inputbox" value="<?php echo $last_data["ID"] ?>" name="account[<?php echo $last_data["number"] ?>]"> </td>
                </tr>
                <tr>
                    <td> Password : </td>
                    <td> <input type="password" class="inputbox" value="<?php echo $last_data["PWD"] ?>" name="account[<?php echo $last_data["number"] ?>]"> </td>
                </tr>
            </table>
            <br>
            <input type="submit" class="inputbutton" value="刪除">
        </form>
    <?php endif?>
    <br>
    <br>
    <a href="index.php?page=index"><button class="inputbutton">回首頁</button></a>
</div>