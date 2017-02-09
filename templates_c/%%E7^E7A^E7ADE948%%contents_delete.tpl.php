<?php /* Smarty version 2.6.30, created on 2017-02-09 01:15:14
         compiled from contents_delete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'contents_delete.tpl', 12, false),)), $this); ?>
<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="UTF-8">
<head><title>BBS2投稿削除ページ</title></head>
<body>
<h1 aligin="center">BBS2投稿削除ページ</h1>
<a  href="contents_modify.php">BBS2投稿編集ページに戻る</a>
<div style="text-align: left">
    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
        <p><?php echo $this->_tpl_vars['data']['id']; ?>
：<?php echo $this->_tpl_vars['data']['name']; ?>
 <?php echo $this->_tpl_vars['data']['datetime']; ?>
</p>
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['contents'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
        <form method="post" action="post_delete.php">
            <p><input type="hidden" name="id" value="<?php echo $this->_tpl_vars['data']['id']; ?>
"></p>
            <p><input type="password" name="password" placeholder="パスワードを入力"></p>
            <p><input type="submit" value="この投稿を削除する"></p>
        </form>
    <?php endforeach; endif; unset($_from); ?>
</div>
</body>
</html>