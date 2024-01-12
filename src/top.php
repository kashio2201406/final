<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1518127-final';
const USER = 'LAA1518127';
const PASS = 'PASS0317';

$connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';

try {
    // データベースに接続し、エラーモードを例外に設定する
    $pdo = new PDO($connect, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("データベース接続エラー：" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/top.css" />
    <title>県情報</title>
</head>

<body>
    <h1>県情報</h1>
    <hr>
    <button onclick="location.href='ren6-5-input.php'">商品を登録する</button>
    <table>
        <tr>
            <th>県名</th>
            <th>観光地名</th>
            <th>名物</th>
            <th>説明</th>
        </tr>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        foreach ($pdo->query('select * from tourism') as $row) {
            echo '<tr>';
            echo '<td>', $row['name'], '</td>';
            echo '<td>', $row['kanko_name'], '</td>';
            echo '<td>', $row['Specialty'], '</td>';
            echo '<td>', $row['exp'], '</td>';
            echo '<td>';
            echo '<form action="kousin.php" method="post">';
            echo '<input type="hidden" name="id" value="', $row['name'], '">';
            echo '<button type="submit">更新</button>';
            echo '</form>';
            echo '</td>';
            echo '<td>';
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="id" value="', $row['name'], '">';
            echo '<button type="submit">削除</button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
</body>

</html>