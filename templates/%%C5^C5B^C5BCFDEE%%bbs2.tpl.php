<?php /* Smarty version 2.6.30, created on 2017-02-08 15:59:32
         compiled from bbs2.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'bbs2.tpl', 36, false),)), $this); ?>
<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="UTF-8">
<head><title>BBS2</title></head>
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
<h1 aligin="center">BBS2</h1>
<hr />
<a  href="logout.php">ログアウト</a>
<form method="post" action="contents_insert.php" >
    <div style="text-align: center">
        <p>ユーザ名：<?php echo $this->_tpl_vars['name']; ?>
</p>
        <textarea class="textarea" name="contents" cols="24" rows="5" id="ta2" wrap="hard" placeholder="本文を入力してください。"></textarea>
        <p><input type="submit" value="投稿する"></p>
    </div>
</form>
<br>

<div style="text-align: left">
    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
    <p><?php echo $this->_tpl_vars['data']['id']; ?>
：<?php echo $this->_tpl_vars['data']['name']; ?>
 <?php echo $this->_tpl_vars['data']['datetime']; ?>
</p>
    <form method="post" action="contents_modify.php">
        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['data']['id']; ?>
">
        <input type="submit" value="編集">
    </form>
    <p><?php echo ((is_array($_tmp=$this->_tpl_vars['data']['contents'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
    <br>
    <?php endforeach; endif; unset($_from); ?>
</div>
</body>
</html>