<?php
//DB接続

$mysqli = new mysqli("localhost","root","","keita_presentation");

if($mysqli->connect_error){
	echo "DB接続できません。";
}
else{
	//文字コード設定
	$mysqli->set_charset("utf8");
}

// ここで更新処理
		if($_GET){
			//テキストボックスに入ってきたキーワードで
			//更新するSQL
			$sql2 = "DELETE from food WHERE id ='".$_GET["id"]."'";
			$result = $mysqli -> query($sql2);
			header("Location: ./delete.php"); //Locationの直後はスペースを入れずに:を書く。
			exit; //ここのexitが大事！これがなきゃ下まで全部動いてしまう。
		}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>食品リスト編集｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="wrapper">

	<p>削除しました。</p>
</div>

<?php
require("./footer.html");
?>


</body>
</html>
