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

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>作り方｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>


<!--
ずっと編集していたページが、cssを読み込んでくれない場合

リロードしたときに、前のキャッシュが残ってる可能性あり。
SHIFTを押しながら更新ボタンを押す。
-->


<div id="wrapper">

<h3 style="color : red;">新しいウィンドウで開いています。<br>戻りたい場合は、[タブを閉じる]または、お使いのスマートフォンの[戻る]ボタンでお戻りください。</h3>

	<?php


	if($_GET){
		// テキストボックスに入ってた言葉で検索
		$sql = "SELECT * FROM recipe WHERE id =".$_GET["id"];
	}
	// 上のＳＱＬ文を実行
	$result = $mysqli -> query($sql);

	if($result){
		// 実行結果を連想配列で取得
		while($row = $result->fetch_assoc()){
?>

<?php		echo "<h1>".$row{"name_of_ryouri"}."</h1>"; ?>


<h2>☆材料</h2>
<?php		echo "<p class=\"tsukurikata\">".$row{"bunryou"}."</p>"; ?>

<h2>☆順番</h2>



<?php

// $tsukurikata_hyouji2 = explode("。", $row{"tsukurikata"});
	$tsukurikata_hyouji2 = $row{"tsukurikata"};
	$tsukurikata_hyouji = str_replace('。', '。<br>', $tsukurikata_hyouji2);
	echo "<p class=\"tsukurikata\">".$tsukurikata_hyouji;
?>
</p>

<?php
		}

	}
?>

</div>

</body>
</html>
