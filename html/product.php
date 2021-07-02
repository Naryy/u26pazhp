<?php
    include 'db.php';

    // DBへ接続
    try{
        $dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT title, content, image_path FROM CONTENTS WHERE contents_category = 3";
        $sth = $dbh -> query($sql);
        //$row = $sth->fetch(PDO::FETCH_ASSOC);
        $count = $sth -> rowCount();
        //echo $count;
        //echo $sth;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=yes">
    <link rel="stylesheet" href="./css/destyle.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/product.css">
    <title>Aeon Financial Service U26 パズドラカップ</title>
</head>
<body>
    <div class="header">
        <nav class="nav_pc">
            <ul>
                <li><a href="./index.html">TOP</a></li>
                <li><a href="./news.php">NEWS</a></li>
                <li><a href="./cm.php">CM</a></li>
                <li><a href="./product.php">AEON商品</a></li>
                <li><a href="https://www.aeonfinancial.co.jp/esportsevent" target="_brank">ランディングページ</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">YouTube</a></li>
            </ul>
        </nav>
    </div>
    <div class="content_wrap">
        <h1>AEON商品</h1>
        <div class="flexbox">
        <?php
                while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                    $content = $row['content'];
                    $image_path = $row['image_path'];
                    $title = $row['title'];
                    echo "<div class=box>
                             <div class=imagebox>
                                <img src='$image_path' alt='icon' class='product_img'>
                                <div class='product_title'>$title</div>
                                <div class='product_content'>$content</div>
                             </div>
                          </div>";
                }
            }catch(PDOException $e){
                print("データベースの接続に失敗しました".$e->getMessage());
                die();
            }
            // 接続を閉じる
            $dbh = null;
        ?>
        </div>
    </div>
    <!---->
    <div class="footer">
        ©︎footer
    </div>
</body>
</html>