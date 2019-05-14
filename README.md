# Database 練習網頁
一個練習Database用的網站

# 網站結構
```
├ database.php - 連接資料庫
├ index.php - 處理首頁
│
├ css - 樣式表資料夾
│  └ style.css - 網站樣式表
│
├ page - 頁面資料夾
│  ├ delete_data.php - 刪除資料頁面
│  ├ insert_data.php - 插入資料頁面
│  ├ update_data.php - 更新資料頁面
│  └ index.php - 首頁頁面
│
└ template - 模板資料夾
   ├ header.php - 網頁頭端
   └ header.php - 網頁尾端
```

# 頁面實現方式
一開始會進入index.php的頁面，接著載入database.php連接資料庫

然後透過`GET`取得要顯示的頁面，若找不到或是沒輸入，則使用`page/index.php`作為默認頁面

接著依照`header.php`、`指定頁面`、`footer.php`構成一個網頁

# 頁面樣式
頁面樣式都是使用之前寫好的`style.css`樣式表去套用