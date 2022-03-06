<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>更新追加</title>
<link rel="stylesheet" href="css/edit2.css">

</head>
<body>
<br>
<table>
<tr><th>単語</th>
<th>～は</th>
<th>～の</th>
<th>～に</th>
<th>～のもの</th>
</tr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');
if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['word2'])
                  || empty($_REQUEST['word3']) || empty($_REQUEST['word4'])) break;
		$sql=$pdo->prepare('insert into person_table values(?,?,?,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['word']), $_REQUEST['mean'], $_REQUEST['word2']
, $_REQUEST['word3'], $_REQUEST['word4']]);
		break;

	case 'update':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) ||  empty($_REQUEST['word2'])
 || empty($_REQUEST['word3'])|| empty($_REQUEST['word4'])) break;
		$sql=$pdo->prepare(
			'update person_table set mean=?, word2=?, word3=?, word4=? where word=?');
		$sql->execute(
			[htmlspecialchars($_REQUEST['mean']), $_REQUEST['word2'], $_REQUEST['word3']
, $_REQUEST['word4'], $_REQUEST['word']]);
		break;

	case 'delete':
		$sql=$pdo->prepare('delete from person_table where word=?');
		$sql->execute([$_REQUEST['word']]);
		break;

	
	}
}
foreach ($pdo->query('select * from person_table') as $row) {
	echo '<form class="ib" action="person-edit.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
      echo'<tr>';

	echo '<th>';
	echo '<input type="hidden" name="word" value="', $row['word'], '">';
	echo $row['word'];
	echo '</th> ';

	echo '<th>';
	echo '<input type="text" name="mean" value="', $row['mean'], '">';
	echo '</th> ';

	echo '<th>';
	echo '<input type="text" name="word2" value="', $row['word2'], '">';
      echo '</th> ';

      echo '<th>';
      echo '<input type="text" name="word3" value="', $row['word3'], '">';
	echo '</th> ';

	echo '<th>';
	echo '<input type="text" name="word4" value="', $row['word4'], '">';
	echo '</th> ';

	echo '<th>';
	echo '<input type="submit" value="更新">';
	echo '</th> ';

	echo '</form> ';
	echo '<form class="ib" action="person-edit.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="word" value="', $row['word'], '">';
      echo '<th>';
	echo '<input type="submit" value="削除">';
      echo '</th>';

      echo '</tr>';
	echo '</form>';
	echo "\n";

}
?>
<form action="person-edit.php" method="post">
<input type="hidden" name="command" value="insert">
<tr>
<th><input type="text" name="word"></th>
<th><input type="text" name="mean"></th>
<th><input type="text" name="word2"></th>
<th><input type="text" name="word3"></th>
<th><input type="text" name="word4"></th>
<th><input type="submit" value="追加"></th>
</tr>
</table>
</form>

<br>

<div class="box1">
     <a href="edit.php">前の画面に戻る</a>
</div>
<br>
<div class="box1">
     <a href="main.php">メイン画面に戻る</a>
</div>

</body>
</html>
