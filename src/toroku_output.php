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
</head>

<body>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('INSERT INTO tourism (name, kanko_name, Specialty, exp) VALUES (?, ?, ?, ?)');

    if (empty($_POST['name']) || empty($_POST['kanko_name']) || empty($_POST['Specialty']) || empty($_POST['exp'])) {
        echo '全ての項目を入力してください。';
    } else {
        if ($sql->execute([htmlspecialchars($_POST['name']), htmlspecialchars($_POST['kanko_name']), htmlspecialchars($_POST['Specialty']), htmlspecialchars($_POST['exp'])])) {
            echo '登録に成功しました。';
        } else {
            echo '登録に失敗しました。';
        }
    }
    ?>

    <br>
    <hr><br>
    <table>
        <tr>
            <th>県名</th>
            <th>観光地名</th>
            <th>名物</th>
            <th>説明</th>
        </tr>
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
    </table>
    <form action="top.php" method="post">
        <button type="submit">追加画面へ戻る</button>
    </form>
</body>

</html>