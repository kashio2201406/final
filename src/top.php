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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="css/top.css" />
    <title>県情報</title>
</head>

<body>
    <section class="section">
        <div class="container">
            <h1 class="title">県情報</h1>
            <hr>
            <button class="custom-button button is-success" onclick="location.href='toroku_input.php'">商品を登録する</button>
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>県名</th>
                        <th>観光地名</th>
                        <th>名物</th>
                        <th>説明</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($pdo->query('select * from tourism') as $row) {
                        echo '<tr>';
                        echo '<td>', $row['name'], '</td>';
                        echo '<td>', $row['kanko_name'], '</td>';
                        echo '<td>', $row['Specialty'], '</td>';
                        echo '<td>', $row['exp'], '</td>';
                        echo '<td>';
                        echo '<form action="kousin_input.php" method="post">';
                        echo '<input type="hidden" name="id" value="', $row['name'], '">';
                        echo '<button class="button is-info" type="submit">更新</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '<td>';
                        echo '<form action="delete.php" method="post">';
                        echo '<input type="hidden" name="id" value="', $row['name'], '">';
                        echo '<button class="button is-danger" type="submit">削除</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';
                        echo "\n";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>