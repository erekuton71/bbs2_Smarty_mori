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

//入力データの受け取り
if (!(isset($_SESSION["id"]))) {
    $_SESSION["id"] = $_POST["id"];
    $id = $_SESSION["id"];
}
//$id = $_SESSION["id"];
$user_id = $_SESSION["user_id"];

try {
//データベースへの接続を確立
    $db = getDb();
    $stt = $db->prepare("SELECT * FROM post WHERE id = '$id'");
    $stt->execute();
    $row = $stt->fetch(PDO::FETCH_NAMED);
    $name = $row['name'];
    $smarty->assign('name',$name);
    if (!(isset($_SESSION["contents"]))) {
        $_SESSION["contents"] = $row['contents'];
        $smarty->assign('contents',$_SESSION["contents"]);
    }
    if (!($user_id == $row['user_id'])) {
        $smarty->display('different_user.tpl');
        print '<ul style="color:Red">';
        print "<li>他のユーザの投稿は編集できません。</li>";
        print '</ul>';
        exit;
    }
    $db = NULL;
}   catch (PDOException $e) {
    die("エラーメッセージ: {$e->getMessage()}");
}
$smarty->display('contents_modify.tpl');
?>