<?php
	// エラーチェック
	$errorMessage = "";

	if( isset( $_GET["errno"] ) ){
		$errno = $_GET["errno"];
		if( $errno == "1" ){
			$errorMessage = "<p style='color :red'>未入力項目があります。</p>";
		}
	}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>レシピ追加｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="wrapper">

	<p>空白は入れないでください。</p>

	<?php echo $errorMessage; ?>

<form action="recipe_add_redirect.php" method="POST">
  <table>
    <tr>
      <th>料理名</th>
      <th><input type="text" name="name_of_ryouri"></th>
    </tr>
    <tr>
      <th>材料</th>
      <th><input type="text" name="zairyou"></th>
    </tr>
    <tr>
      <th>調理時間</th>
      <th><input type="text" name="time_of_cooking"></th>
    </tr>
		<tr>
      <th>分量</th>
      <th><input type="text" name="bunryou"></th>
    </tr>

		<tr>
		<th>作り方</th>
		<th><textarea rows="4" cols="40" name="tsukurikata"></textarea></th>
		</tr>


    <tr>
      <th colspan="2"><input type="submit" value="登録"></th>
    </tr>
  <table>
</form>

</div>

<?php
require("./footer.html");
?>

  </body>
</html>
