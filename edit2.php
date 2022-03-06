<?php
session_start();


?>
<?php

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
$_SESSION['1'] = $_POST['1'];

} elseif (
$_SERVER["REQUEST_METHOD"] === 'GET' &&
!isset(
$_SESSION['1'],

)
) {
throw new Exception();
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>更新追加</title>
<link rel="stylesheet" href="css/edit2.css">

</head>
<body>


<?php
switch ($_SESSION['1']) {

case 'person':

echo'<div class="th0">';
echo'<div class="th1">単語</div>';
echo'<div class="th1">～は</div>';
echo'<div class="th1">～の</div>';
echo'<div class="th1">～に</div>';
echo'<div class="th1">～のもの</div>';
echo'</div>';

$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['word2'])
                  || empty($_REQUEST['word3']) || empty($_REQUEST['word4'])) break;
		$sql=$pdo->prepare('insert into person_table values(?,?,?,?,?)');
		$sql->execute([htmlspecialchars($_REQUEST['word']), $_REQUEST['mean'], $_REQUEST['past']
			, $_REQUEST['past participle'], $_REQUEST['ing']]);break;
 	case 'update':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['word2'])
                  || empty($_REQUEST['word3']) || empty($_REQUEST['word4'])) break;
		$sql=$pdo->prepare(
			'update person_table  set mean=?, word2=?, word3=?, word4=?   where id=word');
		$sql->execute(
			[htmlspecialchars($_REQUEST['mean']), $_REQUEST['word2'],
			$_REQUEST['word3'], $_REQUEST['word4'], $_REQUEST['word']]);
		break;
       }
}
 foreach($pdo->query('select * from person_table') as $row) {
	echo '<form class="ib" action="edit2.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="word" value="', $row['word'], '">';
	echo '<div class="td0">';
	echo $row['word'];
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="mean" value="', $row['mean'], '">';
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['word2'], '">';
	echo '</div> ';

      echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['word3'], '">';
	echo '</div> ';

      echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['word4'], '">';
	echo '</div> ';

	echo '<div class="td2">';
	echo '<input type="submit" value="更新">';
	echo '</div> ';
	echo "\n";
}

echo '<form action="edit2.php" method="post">';
echo '<input type="hidden" name="command" value="insert">';

echo '<div class="td1"><input type="text" name="word"></div>';
echo '<div class="td1"><input type="text" name="mean"></div>';
echo '<div class="td1"><input type="text" name="word2"></div>';
echo '<div class="td1"><input type="text" name="word3"></div>';
echo '<div class="td1"><input type="text" name="word4"></div>';
echo '<div class="td2"><input type="submit" value="追加"></div>';
echo '</form>';

      break;

case 'verb':
echo'<div class="th0">単語</div>';
echo'<div class="th1">～する</div>';
echo'<div class="th2">～した</div>';
echo'<div class="th3">～られる</div>';
echo'<div class="th4">～している</div>';

$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['past'])
                  || empty($_REQUEST['past participle']) || empty($_REQUEST['ing'])) break;
		$sql=$pdo->prepare('insert into verb_table values(?,?,?,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['word']), $_REQUEST['mean'], $_REQUEST['past']
			, $_REQUEST['past participle'], $_REQUEST['ing']]);
			break;
 	case 'update':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['past'])
                  || empty($_REQUEST['past participle']) || empty($_REQUEST['ing'])) break;
		$sql=$pdo->prepare(
			'update verb_table  set mean=?, past=?, past participle=?, ing=?   where id=word');
		$sql->execute(
			[htmlspecialchars($_REQUEST['mean']), $_REQUEST['past'],
			$_REQUEST['past participle'], $_REQUEST['ing'], $_REQUEST['word']]);
		break;

     }
   }
foreach ($pdo->query('select * from verb_table') as $row) {
	echo '<form class="ib" action="edit2.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
  echo '<input type="hidden" name="word" value="', $row['word'], '">';
	echo '<div class="td0">';
	echo $row['word'];
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="mean" value="', $row['mean'], '">';
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['past'], '">';
	echo '</div> ';

      echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['past participle'], '">';
	echo '</div> ';

      echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['ing'], '">';
	echo '</div> ';

	echo '<div class="td2">';
	echo '<input type="submit" value="更新">';
	echo '</div> ';
	echo "\n";
}

echo '<form action="edit2.php" method="post">';
echo '<input type="hidden" name="command" value="insert">';

echo '<div class="td1"><input type="text" name="word"></div>';
echo '<div class="td1"><input type="text" name="mean"></div>';
echo '<div class="td1"><input type="text" name="past"></div>';
echo '<div class="td1"><input type="text" name="past participle"></div>';
echo '<div class="td1"><input type="text" name="ing"></div>';
echo '<div class="td2"><input type="submit" value="追加"></div>';
echo '</form>';

	break;

case 'interrogative':

echo'<div class="th0">単語</div>';
echo'<div class="th1">意味</div>';
echo'<div class="th2">例文</div>';
echo'<div class="th3">和訳</div>';


$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['example'])
                  || empty($_REQUEST['Japanese'])) break;
		$sql=$pdo->prepare('insert into interrogative_table values(?,?,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['word']), $_REQUEST['mean'], $_REQUEST['example']
			, $_REQUEST['Japanese']]);
			break;
 	case 'update':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['example'])
                  || empty($_REQUEST['Japanese'])) break;
		$sql=$pdo->prepare(
			'update interrogative_table  set mean=?, example=?, Japanese=?  where id=word');
		$sql->execute(
			[htmlspecialchars($_REQUEST['mean']), $_REQUEST['example'],
			$_REQUEST['Japanese'], $_REQUEST['word']]);
		break;

    }
   }
foreach ($pdo->query('select * from interrogative_table') as $row) {
	echo '<form class="ib" action="edit2.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="word" value="', $row['word'], '">';
	echo '<div class="td0">';
	echo $row['word'];
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="mean" value="', $row['mean'], '">';
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['example'], '">';
	echo '</div> ';

      echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['Japanese'], '">';
	echo '</div> ';



	echo '<div class="td2">';
	echo '<input type="submit" value="更新">';
	echo '</div> ';
      echo '</form> ';
	echo "\n";

}

echo '<form action="edit2.php" method="post">';
echo '<input type="hidden" name="command" value="insert">';

echo '<div class="td1"><input type="text" name="word"></div>';
echo '<div class="td1"><input type="text" name="mean"></div>';
echo '<div class="td1"><input type="text" name="example"></div>';
echo '<div class="td1"><input type="text" name="Japanese"></div>';
echo '<div class="td2"><input type="submit" value="追加"></div>';
echo '</form>';

	break;


case 'ajective':

echo'<div class="th0">単語</div>';
echo'<div class="th1">意味</div>';
echo'<div class="th2">～より</div>';
echo'<div class="th3">いちばん</div>';


$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');
   if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['er'])
                  || empty($_REQUEST['est'])) break;
		$sql=$pdo->prepare('insert into ajective_table values(?,?,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['word']), $_REQUEST['mean'], $_REQUEST['er']
			, $_REQUEST['est']]);
			break;
 	case 'update':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['er'])
                  || empty($_REQUEST['est'])) break;
		$sql=$pdo->prepare(
			'update ajective_table  set mean=?, er=?, est=?  where id=word');
		$sql->execute(
			[htmlspecialchars($_REQUEST['mean']), $_REQUEST['er'],
			$_REQUEST['est'], $_REQUEST['word']]);
		break;

    }
   }
foreach ($pdo->query('select * from ajective_table') as $row) {
	echo '<form class="ib" action="edit2.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="word" value="', $row['word'], '">';
	echo '<div class="td0">';
	echo $row['word'];
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="mean" value="', $row['mean'], '">';
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['er'], '">';
	echo '</div> ';

      echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['est'], '">';
	echo '</div> ';



	echo '<div class="td2">';
	echo '<input type="submit" value="更新">';
	echo '</div> ';
      echo '</form> ';
	echo "\n";

}

echo '<form action="edit2.php" method="post">';
echo '<input type="hidden" name="command" value="insert">';

echo '<div class="td1"><input type="text" name="word"></div>';
echo '<div class="td1"><input type="text" name="mean"></div>';
echo '<div class="td1"><input type="text" name="er"></div>';
echo '<div class="td1"><input type="text" name="est"></div>';
echo '<div class="td2"><input type="submit" value="追加"></div>';
echo '</form>';

	break;






case 'others':

echo'<div class="th0">単語</div>';
echo'<div class="th1">意味</div>';
echo'<div class="th2">例文</div>';
echo'<div class="th3">和訳</div>';


$pdo=new PDO('mysql:host=localhost;dbname=english word;charset=utf8',
	'staff', 'password');if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['example'])
                  || empty($_REQUEST['Japanese'])) break;
		$sql=$pdo->prepare('insert into others_table values(?,?,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['word']), $_REQUEST['mean'], $_REQUEST['example']
			, $_REQUEST['Japanese']]);
			break;
 	case 'update':
		if (empty($_REQUEST['word']) || empty($_REQUEST['mean']) || empty($_REQUEST['example'])
                  || empty($_REQUEST['Japanese'])) break;
		$sql=$pdo->prepare(
			'update others_table  set mean=?, example=?, Japanese=?  where id=word');
		$sql->execute(
			[htmlspecialchars($_REQUEST['mean']), $_REQUEST['example'],
			$_REQUEST['Japanese'], $_REQUEST['word']]);
		break;

     }
   }
foreach ($pdo->query('select * from others_table') as $row) {
	echo '<form class="ib" action="edit2.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="word" value="', $row['word'], '">';
	echo '<div class="td0">';
	echo $row['word'];
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="mean" value="', $row['mean'], '">';
	echo '</div> ';

	echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['example'], '">';
	echo '</div> ';

      echo '<div class="td1">';
	echo '<input type="text" name="word2" value="', $row['Japanese'], '">';
	echo '</div> ';



	echo '<div class="td2">';
	echo '<input type="submit" value="更新">';
	echo '</div> ';
      echo '</form> ';
	echo "\n";

}

echo '<form action="edit2.php" method="post">';
echo '<input type="hidden" name="command" value="insert">';

echo '<div class="td1"><input type="text" name="word"></div>';
echo '<div class="td1"><input type="text" name="mean"></div>';
echo '<div class="td1"><input type="text" name="example"></div>';
echo '<div class="td1"><input type="text" name="Japanese"></div>';
echo '<div class="td2"><input type="submit" value="追加"></div>';
echo '</form>';
	break;








}


echo'<div class="box1">';
     echo'<a href="edit.php">チェック画面に戻る</a>';
echo'</div>';

   print_r('<br>');
   print_r('<br>');

echo'<div class="box1">';
     echo'<a href="main.php">メイン画面に戻る</a>';
echo'</div>';


?>




</form>
</body>
</html>
