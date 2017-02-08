<?php
require_once('Smarty.class.php');
require_once('Smarty_connect.php');
require_once 'DbManager.php';
require_once 'Encode.php';
session_start();
// ログイン状態のチェック
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

//入力データの受け取り
$id = $_SESSION["id"];
$user_id = $_SESSION["user_id"];

try {
//データベースへの接続を確立
    $db = getDb();
    $stt = $db->prepare("SELECT * FROM post WHERE id = '$id'");
    $stt->execute();
    $row = $stt->fetch(PDO::FETCH_NAMED);
    if (!($user_id == $row['user_id'])) {
        print '<ul style="color:Red">';
        print "<li>他のユーザの投稿は編集できません。</li>";
        print '</ul>';
        exit;
    }
//結果セットの内容を順に割当て
    $data = array();
    $data[] = $row;
    $smarty->assign('data',$data);
    $db = NULL;
}   catch (PDOException $e) {
    die("エラーメッセージ: {$e->getMessage()}");
}
$smarty->display('contents_delete.tpl');
?>