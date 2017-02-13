<?php
require_once('Smarty_connect.php');
$smarty->display('login_check.tpl');
require_once 'DbManager.php';
require_once 'bbs2Validator.php';
//セッション開始
session_start();

//入力データの受け取り
$name = $_POST['name'];
$password = $_POST['password'];

//エラー表示
$v = new bbs2Validator();
$v->login_requiredCheck($name, 'ユーザ名');
$v->login_requiredCheck($password, 'パスワード');
$v();

try {
//データベースへの接続を確立
    $db = getDb();
    $stt = $db->prepare("SELECT * FROM member WHERE name = '$name'");
    $stt->execute();
    $row = $stt->fetch(PDO::FETCH_NAMED);
    if (password_verify($password, $row['password'])) {
        //セッションIDを新規に発行
        session_regenerate_id(true);
        $_SESSION['user_id'] = $row['id'];
        header('Location: bbs2.php');
    } else {
        print '<ul style="color:Red">';
            print "<li>ユーザ名とパスワードが一致しません。</li>";
        print '</ul>';
    }
    $db = NULL;
}   catch (PDOException $e) {
    die("エラーメッセージ: {$e->getMessage()}");
}
