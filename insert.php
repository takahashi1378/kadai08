<?php
require_once('funcs.php');
$pdo = db_conn();


//1. POSTデータ取得
$name   = $_POST['name'];
$email  = $_POST['email'];
$age    = $_POST['age'];
$content = $_POST['content'];

//2. DB接続します
//*** function化する！  *****************


//３．データ登録SQL作成
$stmt = $pdo->prepare(
    'INSERT INTO
        gs_an_table(
            name, email, age, content, indate
        )
    VALUES (
            :name, :email, :age, :content, now()
        );'
);

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT); //PARAM_INTなので注意
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    sql_error($stmt);
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
