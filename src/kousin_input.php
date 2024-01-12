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
	<table>
		<tr>
			<th>県名</th>
			<th>観光地名</th>
			<th>名物</th>
			<th>説明</th>
		</tr>
		<?php
		$pdo = new PDO($connect, USER, PASS);
		$sql = $pdo->prepare('select * from tourism where name=?');
		$sql->execute(array($_POST['id']));
		foreach ($sql as $row) {
			echo '<tr>';
			echo '<form action="kousin_output.php" method="post">';
			echo '<td> ';
			echo '<input type="text" name="name" value="', $row['name'], '">';
			echo '</td> ';
			echo '<td>';
			echo '<input type="text" name="kanko_name" value="', $row['kanko_name'], '">';
			echo '</td> ';
			echo '<td>';
			echo ' <input type="text" name="Specialty" value="', $row['Specialty'], '">';
			echo '</td> ';
			echo '<td>';
			echo ' <input type="text" name="exp" value="', $row['exp'], '">';
			echo '</td> ';
			echo '<td><input type="submit" value="更新"></td>';
			echo '</form>';
			echo '</tr>';
			echo "\n";
		}
		?>
	</table>
	<button onclick="location.href='ren6-8-top.php'">トップへ戻る</button>
</body>

</html>