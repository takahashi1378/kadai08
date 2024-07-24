<?php
require_once('funcs.php');

$id = $_GET['id'];
$pdo = db_conn();
//2. DB接続します
//*** function化する！  *****************


//３．データ登録SQL作成
$stmt = $pdo->prepare('DELETE FROM gs_an_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    sql_error($stmt);
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
}