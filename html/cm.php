<?php
include 'db.php';

// DBへ接続
try{
    $dbh = new PDO($dsn, $user, $password);

    $sql = "SELECT title, content, video_url FROM CONTENTS WHERE contents_category = 2 and contents_category is not null AND process_status = 2";
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
    <link rel="stylesheet" href="./css/cmstyle.css">
    <title>Aeon Financial Service U26 パズドラカップ</title>
</head>
<body>
<div class="header">
    <nav class="nav_pc">
        <ul>
            <li><a href="./index.html">TOP</a></li>
            <li><a href="./news.php">NEWS</a></li>
            <li><a href="./cm.php">学生制作CM</a></li>
            <li><a href="./product.php">企業商品紹介</a></li>
            <li><a href="https://twitter.com/AFS_HAL" target="_brank"><img src="./img/TwitterLogo.png" alt="Twitter" class="navimg"></a></li>
            <li><a href="https://www.youtube.com/channel/UCPEZdHwxxmCB0IEiOUZ5Eug" target="_brank"><img src="./img/YouTubeLogo.png" alt="YouTube" class="navimg"></a></li>
        </ul>
    </nav>
</div>
<div class="content_wrap">
    <div class="cm_wrap">
        <div class="CM01">
            <h2 class="cmtitle">CM</h2>
        </div>
        <?php
        $i = 0;
        $video_url = "";
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        while($i < count($row)) {
            $content = $row[$i]['content'];
            if (isset($row[$i]['video_url'])) {
                $video_url = $row[$i]['video_url'];
            }
            $title = $row[$i]['title'];
            echo "
                <div class='CM02'>
                <h1 class='catch'>$title</h1>
                <div class='cmyoutube_wrap'>
                    <iframe width='560' height='315' src='$video_url'
                                title='YouTube video player'
                                frameborder='0'
                                allow='accelerometer;
                                autoplay;
                                clipboard-write;
                                encrypted-media;
                                gyroscope;
                                picture-in-picture'allowfullscreen
                                class='cmyoutube'>
                    </iframe>
                </div>
                <p>$content</p>
                </div>";
            $i++;
        }
        }catch(PDOException $e){
            print("データベースの接続に失敗しました".$e->getMessage());
            die();
        }
        // 接続を閉じる
        ?>
    </div>
</div>
<!---->
</body>
</html>
