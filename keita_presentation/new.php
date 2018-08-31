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
	<title>食品追加｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="wrapper">

	<p>空白は入れないでください。</p>
	<p>購入年月日・消費期限は、８桁で入力してください。</p>
	<p>例)　　2016年8月15日 → 20160815</p>

	<?php echo $errorMessage; ?>

<form action="add_redirect.php" method="POST">
  <table>
    <tr>
      <th>品名</th>
      <th><input type="text" name="name_of_product"></th>
    </tr>
    <tr>
      <th>購入年月日</th>
      <th><input type="text" name="year_month_and_day_of_purchase"></th>
    </tr>
    <tr>
      <th>消費期限</th>
      <th><input type="text" name="expiration_date"></th>
    </tr>
		<tr>
      <th>商品の説明</th>
      <th><input type="text" name="keywords"></th>
    </tr>
		<tr>
      <th>材料</th>
      <th><input type="text" name="keywords2"></th>
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
