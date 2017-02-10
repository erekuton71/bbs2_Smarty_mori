<?php
require_once('Smarty_connect.php');
$smarty->display('signUp_insert.tpl');
require_once 'DbManager.php';
require_once 'bbs2Validator.php';

//入力データの受け取り
$name = $_POST['name'];
$password = $_POST['password'];

//エラー表示
$v = new bbs2Validator();
$v->signUp_requiredCheck($name, 'ユーザ名');
$v->signUp_alnumTypeCheck($name, 'ユーザ名');
$v->signUp_lengthCheck($name, 'ユーザ名', 20);
$v->signUp_duplicateCheck($name, $name, 'SELECT name FROM member WHERE name = :value');
$v->signUp_requiredCheck($password, 'パスワード');
$v->signUp_alnumTypeCheck($password, 'パスワード');
$v->signUp_rangeCheck($password, 'パスワード', 20, 6);
$v();

//passwordのハッシュ化
$hashpassword = password_hash($_POST['password'],PASSWORD_DEFAULT);

try {
    //データベースへの接続を確立
    $db = getDb();
    //INSERT命令の準備
    $stt = $db->prepare('INSERT INTO member (name, password) VALUES (:name, :password)');
    //INSERT命令にポストデータの内容をセット
    $stt->bindValue(':name', $name);
    $stt->bindValue(':password', $hashpassword);
    //INSERT命令を実行
    $stt->execute();
    $db = NULL;
}   catch (PDOException $e) {
    die("エラーメッセージ: {$e->getMessage()}");
}
//処理後は新規会員登録成功ページにリダイレクト
header('Location: signUp_success.php');

