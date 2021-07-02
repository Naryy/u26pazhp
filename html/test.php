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

        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
            print $row['image_path'];
        }
        // クエリの実行
        //$query = "SELECT * FROM TABLE_NAME";
        //$stmt = $dbh->query($query);

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
?>