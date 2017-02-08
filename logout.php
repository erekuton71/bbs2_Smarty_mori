<?php
require_once('Smarty.class.php');
require_once('Smarty_connect.php');
$smarty->display('logout.tpl');

//セッション開始
session_start();
if (isset($_SESSION["user_id"])) {
    echo "ログアウトしました。";
} else {
    echo "セッションがタイムアウトしました。";
}
// セッション変数のクリア
$_SESSION = array();
session_destroy();
?>

