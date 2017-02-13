<?php
require_once('Smarty_connect.php');
require_once 'DbManager.php';
require_once 'Encode.php';
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
unset($_SESSION["id"]);
unset($_SESSION["contents"]);
$user_id = $_SESSION["user_id"];

try {
//データベースへの接続を確立
    $db = getDb();
    $stt = $db->prepare("SELECT * FROM member WHERE id = '$user_id'");
    $stt->execute();
    $row = $stt->fetch(PDO::FETCH_NAMED);
    $smarty->assign('name',$row['name']);
//SELECT命令の実行
    $stt = $db->prepare('SELECT * FROM post ORDER BY id DESC');
    $stt->execute();
//結果セットの内容を順に割当て
    $data = $stt->fetchAll();
    $smarty->assign('data',$data);
    $db = NULL;
}   catch (PDOException $e) {
    die("エラーメッセージ: {$e->getMessage()}");
}
$smarty->display('bbs2.tpl');





