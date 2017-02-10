<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="UTF-8">
<head><title>BBS2</title></head>
{literal}
<style type="text/css">
    <!--
    textarea {
        width:300px;
        height:100px;
    }
    -->
</style>
{/literal}
<body>
<h1 aligin="center">BBS2</h1>
<hr />
<a  href="logout.php">ログアウト</a>
<form method="post" action="contents_insert.php" >
    <div style="text-align: center">
        <p>ユーザ名：{$name}</p>
        <textarea class="textarea" name="contents" cols="24" rows="5" id="ta2" wrap="hard" placeholder="本文を入力してください。"></textarea>
        <p><input type="submit" value="投稿する"></p>
    </div>
</form>
<br>

<div style="text-align: left">
    {foreach from = $data item = data}
        <p>{$data.id}：{$data.name} {$data.datetime}</p>
        <div style="float: left">
        <form method="post" action="contents_modify.php">
            <input type="hidden" name="id" value="{$data.id}">
            <input type="submit" value="編集">
        </form>
        </div>
        <div style="float: left">
        <form method="post" action="contents_delete.php">
            <input type="hidden" name="id" value="{$data.id}">
            <input type="submit" value="削除">
        </form>
        </div>
        <div style="clear:both;">
        <p>{$data.contents|nl2br}</p>
        </div>
        <br>
    {/foreach}
</div>
</body>
</html>