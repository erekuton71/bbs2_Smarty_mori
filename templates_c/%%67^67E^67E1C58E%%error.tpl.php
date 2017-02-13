<?php /* Smarty version 2.6.30, created on 2017-02-13 16:33:40
         compiled from error.tpl */ ?>
<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="UTF-8">
<head><title>BBS2エラー</title></head>
<body>
<?php if ($this->_tpl_vars['err'] == login): ?>
    <ul style="color:Red">
        <li>ユーザ名とパスワードが一致しません。</li>
    </ul>
<?php endif; ?>

<?php if ($this->_tpl_vars['err'] == user): ?>
    <h1 aligin="center">BBS2エラー</h1>
    <hr />
    <a  href="bbs2.php">BBS2に戻る</a>
    <ul style="color:Red">
        <li>他のユーザの投稿は編集できません。</li>
    </ul>
<?php endif; ?>

<?php if ($this->_tpl_vars['err'] == password): ?>
    <ul style="color:Red">
        <li>パスワードが違います。</li>
    </ul>
<?php endif; ?>
</body>
</html>