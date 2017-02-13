<?php
require_once('Smarty_connect.php');
$smarty->display('post_delete.tpl');
require_once 'DbManager.php';
require_once 'bbs2Validator.php';
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
//入力データの受け取り
$id = $_SESSION["id"];
$user_id = $_SESSION["user_id"];
$password = $_POST['password'];

//エラー表示
$v = new bbs2Validator();
$v->postDelete_requiredCheck($password, 'パスワード');
$v();

try {
    //データベースへの接続を確立
    $db = getDb();
    //user_idが一致するユーザ名の取得
    $stt = $db->prepare("SELECT * FROM member WHERE id = '$user_id'");
    $stt->execute();
    $row = $stt->fetch(PDO::FETCH_NAMED);
    if (!(password_verify($password, $row['password']))) {
        $smarty->assign('err', 'password');
        $smarty->display('error.tpl');
        exit;
    }
    //DELETE命令の準備
    $stt = $db->prepare("DELETE FROM post WHERE id = '$id'");
    //DELETE命令を実行
    $stt->execute();
    $db = NULL;
}   catch (PDOException $e) {
    die("エラーメッセージ: {$e->getMessage()}");
}
//処理後は掲示板トップページにリダイレクト
header('Location: bbs2.php');
