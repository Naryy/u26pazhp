<?php
    include 'db.php';

    // DBへ接続
    try{
        $dbh = new PDO($dsn, $user, $password);

        $sql = "SELECT title, content, image_path FROM CONTENTS WHERE contents_category = 3 AND process_status = 2";
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
                <li><a href="./cm.php">学生制作CM</a></li>
                <li><a href="./product.php">企業商品紹介</a></li>
                <li><a href="https://twitter.com/AFS_HAL" target="_brank"><img src="./img/TwitterLogo.png" alt="Twitter" class="navimg"></a></li>
                <li><a href="https://www.youtube.com/channel/UCPEZdHwxxmCB0IEiOUZ5Eug" target="_brank"><img src="./img/YouTubeLogo.png" alt="YouTube" class="navimg"></a></li>
            </ul>
        </nav>
    </div>
    <div class="content_wrap">
        <h1>企業商品紹介</h1>
        <div class="flexbox">
        <?php
                while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                    $content = $row['content'];
                    $image_path = $row['image_path'];
                    if($image_path == ""){
                        $image_path = "./img/noimages.png";
                    }
                    $title = $row['title'];
                    echo "<div class=box>
                             <div class=imagebox>
                                <div class='boximg_wrap'>
                                <img src='$image_path' alt='icon' class='product_img'>
                                </div>
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
</body>
</html>