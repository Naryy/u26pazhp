<?php
    $dsn      = 'mysql:dbname=p;host=localhost';
    $user     = 'root';
    $password = 'root';

    // DBへ接続
    try{
        $dbh = new PDO($dsn, $user, $password);

        // クエリの実行
        //$query = "SELECT * FROM TABLE_NAME";
        //$stmt = $dbh->query($query);
        $sql = "SELECT * FROM contents";
        $sth = $pdo -> query($sql);
        $count = $sth -> rowCount();

        // 表示処理
        /*while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo $row["name"];
        }*/

    }catch(PDOException $e){
        print("データベースの接続に失敗しました".$e->getMessage());
        die();
    }

// 接続を閉じる
$dbh = null;

    // 接続状況をチェックします
    if (mysqli_connect_errno()) {
        die("データベースに接続できません:" . mysqli_connect_error() . "\n");
    } else {
        echo "データベースの接続に成功しました。\n";
    }
    $sql = "SELECT * FROM users";
    $sth = $pdo -> query($sql);
    $count = $sth -> rowCount();
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