<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="UTF-8">
<head><title>BBS2投稿編集ページ</title></head>
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
<h1 aligin="center">BBS2投稿編集ページ</h1>
<hr />
<a  href="bbs2.php">BBS2に戻る</a>
<form method="post" action="editedContents_insert.php" >
    <div style="text-align: center">
        <p>ユーザ名：{$name}</p>
        <textarea class="textarea" name="contents" cols="24" rows="5" id="ta2" wrap="hard" >{$smarty.session.contents}</textarea>
        <input type="hidden" name="id" value="{$id}">
        <p><input type="password" name="password" placeholder="パスワード"</p>
        <p><input type="submit" value="投稿する"></p>
    </div>
</form>
</body>
</html>
