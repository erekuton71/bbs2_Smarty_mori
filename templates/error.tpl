<!DOCTYPE html>
<html lang="ja">
<html>
<meta charset="UTF-8">
<head><title>BBS2エラー</title></head>
<body>
{if $err == login}
    <ul style="color:Red">
        <li>ユーザ名とパスワードが一致しません。</li>
    </ul>
{/if}

{if $err == user}
    <h1 aligin="center">BBS2エラー</h1>
    <hr />
    <a  href="bbs2.php">BBS2に戻る</a>
    <ul style="color:Red">
        <li>他のユーザの投稿は編集できません。</li>
    </ul>
{/if}

{if $err == password}
    <ul style="color:Red">
        <li>パスワードが違います。</li>
    </ul>
{/if}
</body>
</html>
