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
	$name = $_POST['name'];
	$price = $_POST['kanko_name'];
	$exp = $_POST['Specialty'];
	$exp = $_POST['exp'];

	$sql = $pdo->prepare('UPDATE tourism SET kanko_name = ?, Specialty = ?, exp = ? WHERE name = ?');
	if ($sql->execute([$name, $kanko_name, $Specialty, $exp])) {
		echo '更新に成功しました。';
	} else {
		echo '更新に失敗しました。';
	}
} else {
	echo '更新するデータがありません。';
}
?>


</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
</body>

</html>