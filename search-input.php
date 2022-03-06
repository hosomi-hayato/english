<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>英単語検索</title>
<link rel="stylesheet" href="css/search.css">
</head>
<body>
<div class="box1">
  <br>
  <br>
 <p>チェックボタンをチェックしてください</p>
</div>
<br>

<form action="search-output.php" method="post"  autocomplete="off">

<p><input type="radio" name="1" value="person" checked>人</p>
<br>
<p><input type="radio" name="1" value="verb">動詞</p>
<br>
<p><input type="radio" name="1" value="interrogative">疑問詞</p>
<br>
<p><input type="radio" name="1" value="ajective">形容詞</p>
<br>
<p><input type="radio" name="1" value="others">その他</p>

  <br>
  
<div class="box2">
 <p>英単語又は英単語の意味を入力してください</p>
</div>

<p><input type="text" name="keyword" ></p>
<p><input type="submit" value="検索"></p>

<br>

<div class="box">
     <a href="main.php">メイン画面に戻る</a>
</div>

</form>
</body>
</html>




