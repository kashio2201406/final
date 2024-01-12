<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>県情報</title>
</head>

<body>
    <p>新たな情報を追加します。</p>
    <form action="toroku_output.php" method="post">
        県名<input type="text" name="name"><br>
        観光地名<input type="text" name="kanko_name"><br>
        名物<input type="text" name="Specialty"><br>
        説明<input type="text" name="exp"><br>
        <button type="submit">追加</button>
    </form>
</body>

</html>