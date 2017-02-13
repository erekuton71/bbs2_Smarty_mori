<?php
require_once('Smarty_connect.php');
$smarty->display('contents_insert.tpl');
require_once 'DbManager.php';
require_once 'bbs2Validator.php';
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

//入力データの受け取り
$user_id = $_SESSION["user_id"];
$contents = $_POST['contents'];

//エラー表示
$v = new bbs2Validator();
$v->contents_requiredCheck($_POST['contents'], '本文');
$v->contents_lengthCheck($_POST['contents'], '本文', 200);
$v();

try {
    //データベースへの接続を確立
    $db = getDb();
    //idが一致するユーザ名の取得
    $stt = $db->prepare("SELECT * FROM member WHERE id = '$user_id'");
    $stt->execute();
    $row = $stt->fetch(PDO::FETCH_NAMED);
    //INSERT命令の準備
    $stt = $db->prepare('INSERT INTO post (contents, user_id, name) VALUES (:contents, :user_id, :name)');
    //INSERT命令にポストデータの内容をセット
    $stt->bindValue(':user_id', $user_id);
    $stt->bindValue(':contents', $contents);
    $stt->bindValue(':name', $row['name']);
    //INSERT命令を実行
    $stt->execute();
    $db = NULL;
}   catch (PDOException $e) {
    die("エラーメッセージ: {$e->getMessage()}");
}
//処理後は掲示板トップページにリダイレクト
header('Location: bbs2.php');
