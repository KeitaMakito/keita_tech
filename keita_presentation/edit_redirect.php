<?php

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


/**************************************
ここで空白入力チェック
*****************************************/

	//getparameterの取得
	if( ( $name_of_product == null || $year_month_and_day_of_purchase == null || $expiration_date == null || $keywords == null || $keywords2 == null ) || ( $str1 != 8 || $str2 != 8 ) ){
	//indexへリダイレクト(画面遷移)
	header( "Location: ./edit.php?id=".$_POST["id"] );
}else{

	// ここで更新処理
			if($_POST){
				//DB接続

				$mysqli = new mysqli("localhost","root","","keita_presentation");

				if($mysqli->connect_error){
					echo "DB接続できません。";
				}
				else{
					//文字コード設定
					$mysqli->set_charset("utf8");
				}

				//更新するSQL
				$sql2 = "UPDATE food SET name_of_product='".$name_of_product."', year_month_and_day_of_purchase='".$year_month_and_day_of_purchase."', expiration_date='".$expiration_date."', keywords='".$keywords."', keywords2='".$keywords2."' WHERE id ='".$id."'";
				$result = $mysqli -> query($sql2);
				header("Location: ./ichiran.php"); //Locationの直後はスペースを入れずに:を書く。
				exit; //ここのexitが大事！これがなきゃ下まで全部動いてしまう。
			}


	header( "Location: ./edit.php" );
}
