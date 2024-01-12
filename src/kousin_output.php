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
    // SQL発行準備 prepareメソッド　作成２
    if (empty($_POST['name'])) {
        echo '県名を入力してください。';
    } elseif (empty($_POST['kanko_name'])) {
        echo '観光地名を入力してください。';
    } elseif (empty($_POST['Specialty'])) {
        echo '名物を入力してください。';
    } elseif (empty($_POST['exp'])) {
        echo '説明を入力してください。';
    } else {
        //SQL文を作成
        // SQL文を作成
        $sql = $pdo->prepare('UPDATE tourism SET kanko_name=?, Specialty=?, exp=? WHERE name=?');

        // SQLを発行 excuteメソッド 作成３
        if ($sql->execute([htmlspecialchars($_POST['kanko_name']), htmlspecialchars($_POST['Specialty']), $_POST['exp'], htmlspecialchars($_POST['name'])])) {
            echo '更新に成功しました。';
        } else {
            echo '更新に失敗しました。';
        }
    }
    ?>
    <hr>
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
    <button onclick="location.href='top.php'">更新画面へ戻る</button>
</body>

</html>