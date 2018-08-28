<?php

//getparameterの取得
if( isset( $_POST["year_month_and_day_of_purchase"]) ) {
//	$id = $_POST["id"];
// 正しいルートで来てない場合のエラー処理をここからを書く
//indexへリダイレクト(画面遷移)
header( "Location: ./upload.php?errno=1" );
exit;
}else{
	header( "Location: ./new2.php" );
}
