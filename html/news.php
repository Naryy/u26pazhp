<?php
    include './db.php';
    $i = 0;

    // DBへ接続
    try{
        $dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT title, content, image_path FROM CONTENTS WHERE news_category AND process_status = 2";
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
        <div class="news_wrap">
            <h1>NEWS</h1>
        <?php
                while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                    $content = $row['content'];
                    $image_path = $row['image_path'];
                    if($image_path == ""){
                        $image_path = "./img/noimages.png";
                    }
                    $title = $row['title'];
                    //中央に表示されるコンテンツ
                    if($i % 2 == 0){
                        echo '<div class="news_center">
                        <div class="news_content">';
                        //<a href="./cm.html">
                    }
                    //左側表示されるコンテンツ
                    else{
                        echo '<div class="news_left">
                        <div class="news_content">';
                        //<a href="#" class="news_left">
                    }
                    //コンテンツ内容
                    echo "<img src='$image_path' alt='icon'>
                            <div class='title_content'>
                                <p class='news_title'>$title</p>
                                <p class='news_content'>$content</p>
                            </div>
                            </div>
                            </div>
                            </a>
                        ";
                    $i++;
                }
            }catch(PDOException $e){
                print("データベースの接続に失敗しました".$e->getMessage());
                die();
            }
            // 接続を閉じる
            $dbh = null;
        ?>
            <!--<a href="#">
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
            </a>-->

        </div>
    </div>
    <!--
    <div class="footer">
        ©︎footer
    </div>-->
</body>
</html>