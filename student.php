<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>生徒更新追加削除</title>
<link rel="stylesheet" href="css/student.css">

</head>
<body>
<br>
<table>
<tr><th>年</th>
<th>組</th>
<th>出席番号</th>
<th>名前</th>
<th>パスワード</th>
</tr>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');
if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (!preg_match('/[0-9]+/', $_REQUEST['year']) ||!preg_match('/[0-9]+/', $_REQUEST['class'])
                || !preg_match('/[0-9]+/', $_REQUEST['number_id'])
                || empty($_REQUEST['name']) || empty($_REQUEST['password'])) break;
		$sql=$pdo->prepare('insert into user_table values(?,?,?,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['year']), $_REQUEST['class'], $_REQUEST['number_id']
, $_REQUEST['name'], $_REQUEST['password']]);
		break;

	case 'update':
		if (!preg_match('/[0-9]+/', $_REQUEST['year']) || !preg_match('/[0-9]+/', $_REQUEST['year'])
                || !preg_match('/[0-9]+/', $_REQUEST['number_id'])|| empty($_REQUEST['password'])) break;
		$sql=$pdo->prepare(
			'update user_table set year=?, class=?, number_id=?, password=? where name=?');
		$sql->execute(
			[htmlspecialchars($_REQUEST['year']), $_REQUEST['class'], $_REQUEST['number_id']
, $_REQUEST['password'], $_REQUEST['name']]);
		break;
	case 'delete':
		$sql=$pdo->prepare('delete from user_table where name=?');
		$sql->execute([$_REQUEST['name']]);
		break;
	}
}
foreach ($pdo->query('select * from user_table') as $row) {




	echo '<form class="ib" action="student.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
      echo'<tr>';


      echo'<th>';
	echo '<input type="number" name="year" value="', $row['year'], '">';
      echo'</th>';

      echo'<th>';
	echo '<input type="number" name="class" value="', $row['class'], '">';
      echo'</th>';

      echo'<th>';
      echo '<input type="number" name="number_id" value="', $row['number_id'], '">';
      echo'</th>';

      echo'<th>';
	echo '<input type="hidden" name="name" value="', $row['name'], '">';
	echo $row['name'];
      echo'</th>';

      echo'<th>';
	echo '<input type="number" name="password" value="', $row['password'], '">';
      echo'</th>';

      echo'<th>';
	echo '<input type="submit" value="更新">';
      echo'</th>';

	echo '</form> ';
	echo '<form class="ib" action="student.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="name" value="', $row['name'], '">';

      echo'<th>';
	echo '<input type="submit" value="削除">';
      echo'</th>';

      echo'</tr>';
	echo '</form>';
	echo "\n";

}
?>
<form action="student.php" method="post">

<input type="hidden" name="command" value="insert">
<tr>
<th><input type="number" name="year"></th>
<th><input type="number" name="class"></th>
<th><input type="number" name="number_id"></th>
<th><input type="text" name="name"></th>
<th><input type="text" name="password"></th>
<th><input type="submit" value="追加"></th>
</tr>
</table>
</form>

<br>

<div class="box1">
     <a href="main.php">メイン画面に戻る</a>
</div>

</body>
</html>
