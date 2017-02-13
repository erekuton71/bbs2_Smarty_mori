<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="UTF-8">
<head><title>BBS2投稿削除ページ</title></head>
<body>
<h1 aligin="center">BBS2投稿削除ページ</h1>
<hr />
<a  href="bbs2.php">BBS2に戻る</a>
<div style="text-align: left">
    {foreach from = $data item = data}
        <p>{$data.id}：{$data.name} {$data.datetime}</p>
        <p>{$data.contents|nl2br}</p>
        <form method="post" action="post_delete.php">
            <p><input type="hidden" name="id" value="{$data.id}"></p>
            <p><input type="password" name="password" placeholder="パスワードを入力"></p>
            <p><input type="submit" value="この投稿を削除する"></p>
        </form>
    {/foreach}
</div>
</body>
</html>
