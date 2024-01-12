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

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = $pdo->prepare('DELETE FROM tourism WHERE name = ?');
    if ($sql->execute([$id])) {
        echo '削除に成功しました。';
    } else {
        echo '削除に失敗しました。';
    }
} else {
    echo '削除するデータがありません。';
}
?>

<br>
<hr><br>
<table>
    <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>価格</th>
    </tr>
    <?php
    foreach ($pdo->query('select * from tourism') as $row) {
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
<button onclick="location.href='top.php'">トップへ戻る</button>
</body>

</html>