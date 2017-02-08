<?php /* Smarty version 2.6.30, created on 2017-02-08 14:17:01
         compiled from contents_modify.tpl */ ?>
<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="UTF-8">
<head><title>BBS2投稿編集ページ</title></head>
<?php echo '
<style type="text/css">
    <!--
    textarea {
        width:300px;
        height:100px;
    }
    -->
</style>
'; ?>

<body>
<h1 aligin="center">BBS2投稿編集ページ</h1>
<a  href="bbs2.php">BBS2に戻る</a>
<form method="post" action="editedContents_insert.php" >
    <div style="text-align: center">
        <p>ユーザ名：<?php echo $this->_tpl_vars['name']; ?>
</p>
        <textarea class="textarea" name="contents" cols="24" rows="5" id="ta2" wrap="hard" ><?php echo $_SESSION['contents']; ?>
</textarea>
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
">
        <p><input type="password" name="password" placeholder="パスワード"</p>
        <p><input type="submit" value="投稿する"></p>
    </div>
</form>
<a  href="contents_delete.php">投稿を削除する</a>
</body>
</html>