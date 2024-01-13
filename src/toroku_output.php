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
    <title>県情報</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('INSERT INTO tourism (name, kanko_name, Specialty, exp) VALUES (?, ?, ?, ?)');

    if (empty($_POST['name']) || empty($_POST['kanko_name']) || empty($_POST['Specialty']) || empty($_POST['exp'])) {
        echo '<h2 class="is-size-4">全ての項目を入力してください。</h2>';
    } else {
        if ($sql->execute([htmlspecialchars($_POST['name']), htmlspecialchars($_POST['kanko_name']), htmlspecialchars($_POST['Specialty']), htmlspecialchars($_POST['exp'])])) {
            echo '<h2 class="is-size-4 has-text-success">登録に成功しました。</h2>';
        } else {
            echo '<h2 class="is-size-4 has-text-danger">登録に失敗しました。</h2>';
        }
    }
    ?>

    <br>
    <hr><br>
    <table class="table">
        <thead>
            <tr>
                <th>県名</th>
                <th>観光地名</th>
                <th>名物</th>
                <th>説明</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($pdo->query('SELECT * FROM tourism') as $row) {
                echo '<tr>';
                echo '<td>', $row['name'], '</td>';
                echo '<td>', $row['kanko_name'], '</td>';
                echo '<td>', $row['Specialty'], '</td>';
                echo '<td>', $row['exp'], '</td>';
                echo '</tr>';
                echo "\n";
            }
            ?>
        </tbody>
    </table>
    <form action="top.php" method="post">
        <button class="button is-info" type="submit">追加画面へ戻る</button>
    </form>
</body>

</html>