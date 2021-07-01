<?php
    $dsn      = 'mysql:dbname=AEON;host=localhost';
    $user     = 'root';
    $password = 'root';

    // DBへ接続
    try{
        $dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT title, content, image_path FROM CONTENTS WHERE news_category";
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
    <link rel="stylesheet" href="./scss/news.css">
    <title>Aeon Financial Service U26 パズドラカップ</title>
</head>
<body>
    <div class="header">
        <nav class="nav_pc">
            <ul>
                <li><a href="./index.html">TOP</a></li>
                <li><a href="./index.html">TOP</a></li>
                <li><a href="./news.php">NEWS</a></li>
                <li><a href="./cm.html">CM</a></li>
                <li><a href="aeonshohin.html">AEON商品</a></li>
                <li><a href="https://www.aeonfinancial.co.jp/esportsevent" target="_brank">ランディングページ</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">YouTube</a></li>
            </ul>
        </nav>
    </div>
    <div class="content_wrap">
        <div class="news_wrap">
            <h1>NEWS</h1>
        <?php
                while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                    $content = $row['content'];
                    $image_path = $row['image_path'];
                    $title = $row['title'];
                    $i = 0;
                    if($i % 2 == 0){
                        echo '<a href="#" class="news_content">
                            <div class="news_content">';
                    }
                    else{
                        echo '<a href="#" class="news_left">
                        <div class="news_content">';
                    }

                    echo "<img src='$image_path' alt='icon'>";
                    echo "<p>$title</p>";
                    echo '</div>
                            </a>';
                    $i ++;
                }
            }catch(PDOException $e){
                print("データベースの接続に失敗しました".$e->getMessage());
                die();
            }
            // 接続を閉じる
            $dbh = null;
        ?>
            <a href="#">
                <div class="news_content">
                    <img src="./images/youngman_25.png" alt="icon">
                    <p>こんなコンテンツですよみたいな文章</p>
                </div>
            </a>
            <a href="#" class="news_left">
                <div class="news_content">
                    <img src="./images/youngman_25.png" alt="icon">
                    <p>こんなコンテンツですよみたいな文章</p>
                </div>
            </a>

        </div>
    </div>
    <!--
    <div class="footer">
        ©︎footer
    </div>-->
</body>
</html>