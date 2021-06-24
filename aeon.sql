/* DB作成 */
CREATE DATABASE AEON;
/* DB使用 */
USE AEON;

/* テーブル作成 */
/* 管理者ユーザテーブル */
DROP TABLE USERS;
CREATE TABLE USERS(
    id INT PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(50) NOT NULL ,
    password VARCHAR(255) NOT NULL,
    mail VARCHAR(255) ,
    authority INT(1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at DATETIME
)DEFAULT CHARSET=utf8;

/* コンテンツ区分テーブル */
DROP TABLE CONTENTS_CATEGORY;
CREATE TABLE CONTENTS_CATEGORY(
    id INT PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(20) NOT NULL
)DEFAULT CHARSET=utf8;

/* お知らせ区分テーブル */
DROP TABLE NEWS_CATEGORY;
CREATE TABLE NEWS_CATEGORY(
    id INT PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(20) NOT NULL
)DEFAULT CHARSET=utf8;

/* 処理状態テーブル */
DROP TABLE PROCESS_STATUS;
CREATE TABLE PROCESS_STATUS(
    id INT PRIMARY KEY AUTO_INCREMENT ,
    name VARCHAR(10) NOT NULL
)DEFAULT CHARSET=utf8;

/* コンテンツテーブル */
DROP TABLE CONTENTS;
CREATE TABLE CONTENTS(
    id INT PRIMARY KEY AUTO_INCREMENT ,
    contents_category INT,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    news_category INT,
    image_path VARCHAR(255),
    video_url VARCHAR(255),
    applicant_id INT,
    process_status INT,
    already_read_status BOOLEAN,
    approver_id INT,
    trace_contents_id INT,
    reason_disapproval VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    released_at DATETIME,
    deleted_at DATETIME,
    FOREIGN KEY (contents_category)
    REFERENCES contents_category(id),
    FOREIGN KEY(news_category)
    REFERENCES news_category(id),
    FOREIGN KEY(process_status)
    REFERENCES process_status(id),
    FOREIGN KEY(applicant_id)
    REFERENCES users(id),
    FOREIGN KEY(approver_id)
    REFERENCES users(id)
)DEFAULT CHARSET=utf8;

/* ログテーブル */
DROP TABLE LOGS;
CREATE TABLE LOGS(
    id INT PRIMARY KEY AUTO_INCREMENT ,
    process_status VARCHAR(10) NOT NULL,
    contents_title VARCHAR(255),
    log_comment VARCHAR(255),
    updater_id INT,
    updated_at TIMESTAMP
)DEFAULT CHARSET=utf8;

/* デモデータ追加 */
/* users */
/* 編集者 */
INSERT INTO users (name, password, mail, authority) VALUES ("異音太郎","パスワード" , "aeon@edit-mail.com", 0);
/* マスター */
INSERT INTO users (name, password, mail, authority) VALUES ("異音二郎","パス" , "aeon@master-mail.com", 0);

/* contents_category */
INSERT INTO contents_category (name) VALUES ("お知らせ");
INSERT INTO contents_category (name) VALUES ("HAL学生制作");
INSERT INTO contents_category (name) VALUES ("企業商品紹介");

/* news_category */
INSERT INTO news_category (name) VALUES ("イオンフィナンシャル");
INSERT INTO news_category (name) VALUES ("パズドラ");
INSERT INTO news_category (name) VALUES ("e-Sports");

/* process_status */
INSERT INTO process_status (name) VALUES ("申請");
INSERT INTO process_status (name) VALUES ("承認");
INSERT INTO process_status (name) VALUES ("未承認");
INSERT INTO process_status (name) VALUES ("再申請");
INSERT INTO process_status (name) VALUES ("公開停止");

/* contents */
/* お知らせ申請時 */
/* 改行付きだと レコードが見辛いため短い文章のダミーデータ*/
/* pager less -n -i -S */
/* ↑カラムが多いためlessで見るよう */
/* 
    ファイルを閉じる場合
    :q 
*/
/* 
    戻す場合 
    pager
*/
INSERT INTO contents (
    contents_category,
    title,
    content,
    news_category,
    image_path,
    applicant_id,
    process_status,
    already_read_status
) VALUES (
    1,
    "【Android/",
    "いつも",
    2,
    "../img/img.jpg",
    1,
    1,
    false
);
INSERT INTO contents (
    contents_category,
    title,
    content,
    news_category,
    image_path,
    applicant_id,
    process_status,
    already_read_status
) VALUES (
    1,
    "【Android/Fireタブレット】対応OSの変更およびFireタブレット版推奨端末の変更のお知らせ",
    "いつも、パズル＆ドラゴンズをお楽しみいただきまして、ありがとうございます。
    パズル＆ドラゴンズでは、今後のアップデートを進めていくにあたり、公開から時間が経過したOSに対応し続けることが難しいため、以下の日程で対応OSを変更させていただきます。
    また、Fireタブレット版につきましては、推奨端末の変更を行わせていただきます。
    ",
    2,
    "../img/img.jpg",
    1,
    1,
    false
);
/* HAL学生制作申請時 */
INSERT INTO contents (
    contents_category,
    title,
    content,
    video_url,
    applicant_id,
    process_status,
    already_read_status
) VALUES (
    2,
    "イオンクレジットCM",
    "イオンクレジットCMをHAL東京の学生が制作",
    "http://youtube...",
    1,
    1,
    false
);
/* 企業商品情報申請時 */
INSERT INTO contents (
    contents_category,
    title,
    content,
    image_path,
    applicant_id,
    process_status,
    already_read_status
) VALUES (
    3,
    "新規カード入会キャンペーン",
    "今入ると...",
    "../img/img.jpg",
    1,
    1,
    false
);
/* logs */
INSERT INTO logs (
    process_status,
    contents_title,
    log_comment,
    updater_id
) VALUES (
    "申請",
    "お知らせ",
    "お知らせ情報が申請されました",
    1
);

/* 更新 */
UPDATE contents
SET approver_id = 2
WHERE id = 1;