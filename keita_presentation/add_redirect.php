<?php


//空白エラーチェック
if( $_POST["name_of_product"] == null || $_POST["year_month_and_day_of_purchase"] == null || $_POST["expiration_date"] == null || $_POST["keywords"] == null || $_POST["keywords2"] == null ) {
//リダイレクト(画面遷移)
header( "Location: ./new.php?errno=1" );
exit;
}



	//ここでデータを受け取る

	$id = $_POST["id"];
	$name_of_product = $_POST["name_of_product"];
	$year_month_and_day_of_purchase = $_POST["year_month_and_day_of_purchase"];
	$expiration_date = $_POST["expiration_date"];
	$keywords = $_POST["keywords"];
	$keywords2 = $_POST["keywords2"];


	/* 商品名 */
	$mugai_name_of_product = htmlspecialchars($_POST["name_of_product"]);
	$tagjokyo_mugai_name_of_product = strip_tags($mugai_name_of_product);
	$name_of_product = trim($tagjokyo_mugai_name_of_product);

	/* 購入年月日 */
	$mugai_year_month_and_day_of_purchase = htmlspecialchars($_POST["year_month_and_day_of_purchase"]);
	$tagjokyo_mugai_year_month_and_day_of_purchase = strip_tags($mugai_year_month_and_day_of_purchase);
	$year_month_and_day_of_purchase = trim($tagjokyo_mugai_year_month_and_day_of_purchase);
	/* ここで全角で入力された場合、半角に変換する */
	$year_month_and_day_of_purchase = mb_convert_kana($year_month_and_day_of_purchase, 'n');
	$str1 = strlen($year_month_and_day_of_purchase);

	/* 消費期限 */
	$mugai_expiration_date = htmlspecialchars($_POST["expiration_date"]);
	$tagjokyo_mugai_expiration_date = strip_tags($mugai_expiration_date);
	$expiration_date = trim($tagjokyo_mugai_expiration_date);
	/* ここで全角で入力された場合、半角に変換する */
	$expiration_date = mb_convert_kana($expiration_date, 'n');
	$str2 = strlen($expiration_date);

	/* keywords */
	$mugai_keywords = htmlspecialchars($_POST["keywords"]);
	$tagjokyo_mugai_keywords = strip_tags($mugai_keywords);
	$keywords = trim($tagjokyo_mugai_keywords);

	/* keywords2 */
	$mugai_keywords2 = htmlspecialchars($_POST["keywords2"]);
	$tagjokyo_mugai_keywords2 = strip_tags($mugai_keywords2);
	$keywords2 = trim($tagjokyo_mugai_keywords2);


/**************************************
ここで空白入力チェック
*****************************************/

	//getparameterの取得
	if( ( $name_of_product == null || $year_month_and_day_of_purchase == null || $expiration_date == null ) || ( $str1 != 8 || $str2 != 8 ) ){
	//indexへリダイレクト(画面遷移)
	header( "Location: ./new.php" );
}else{
  session_start();
    //セッションにデータを格納する。
  $_SESSION["name_of_product"] = $name_of_product;
  $_SESSION["year_month_and_day_of_purchase"] = $year_month_and_day_of_purchase;
  $_SESSION["expiration_date"] = $expiration_date;
  $_SESSION["keywords"] = $keywords;
  $_SESSION["keywords2"] = $keywords2;
	header( "Location: ./add.php" );
    }

?>

  </body>
</html>
