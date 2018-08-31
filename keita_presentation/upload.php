<?php
	// エラーチェック
	$errorMessage = "";

	if( isset( $_GET["errno"] ) ){
		$errno = $_GET["errno"];
		if( $errno == "1" ){
			$errorMessage = "<p style='color :red'>写真をアップロードするところからやり直してください。</p>";
		}else if( $errno == "2" ) {
			//errnoが2の時のメッセージ
			$errorMessage = "<p style='color :red'>写真をアップロードしてください。</p>";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src='https://cdn.rawgit.com/naptha/tesseract.js/1.0.7/dist/tesseract.js'></script>
	<title>購入商品画像アップロード</title>
	<script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="wrapper">

	<?php echo $errorMessage; ?>

<?php


if(isset($_FILES["file"])){
//	print_r($_FILES);

//	echo "<hr>";
//	echo $_FILES["file"]["name"];
	//アップロードしたファイル名　をフォルダ指定してする
// move_upload_file(一時的に付けられたファイルパス,自分が保存したいファイルパス);というふうにやる
	move_uploaded_file($_FILES["file"]["tmp_name"],"./img/".$_FILES["file"]["name"]);


    //アップした画像を表示
	// echo "<img src=\"{$filename}\">";
	$filename = "./img/".$_FILES["file"]["name"];


	echo "<h2>この写真でよろしいですか？</h2>";
	echo "<div id='upload_img'>";
	echo "<img src=\"{$filename}\">";
	echo "</div>";

	//Exif情報を表示
	$data = exif_read_data("{$filename}");
	//	print_r($data);

	//日時を取得
	$time = $data["DateTimeOriginal"];

	$time = str_replace(":","",$time);

	$substr_time = substr($time, 0, 4);
	$substr2_time = substr($time, 4, 2);
	$substr3_time = substr($time, 6, 2);
	$substr4_time = substr($time, 0, 8);

	echo "<div id='upload_result'>";
	echo "<p class='upload_date'>購入年月日</p>";
	echo "<p class='upload_date'>".$substr_time."年".$substr2_time."月".$substr3_time."日</p>";
	echo "</div>";

	echo "<p>この写真・購入年月日でよろしければ、送信ボタンを押してください。<br>食品リストには、この購入年月日で追加されます。変更する場合は、次のページのフォームから編集してください。<br>また、写真を変更する場合は、このページ一番下のフォームから再アップロードしてください。</p>";
	echo "<form action='./new2.php' method='post'>";
	echo "<input type='hidden' name='year_month_and_day_of_purchase' value=".$substr4_time.">";
	echo "<div id='pro_name'></div>";
	echo "<input type='submit'>";
	echo "</form>";

	echo "<hr>";

}
?>
<div id="upload">
	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<p>カメラでレシートを撮影・もしくはレシートを撮影した画像ファイルをアップロードしてください。</p>
		<label for="file_photo">写真を選択<input type="file" name="file" id="file_photo" style="display:none;"></label>
	  <input type="submit" value="アップロード">
	</form>
</div>

<!-- /*****************************************************************************/ -->

<div class="msg"></div>
	<script>


Tesseract
  // (読み込む画像, 言語) jpeg || png
  .recognize('<?php echo $filename; ?>', {lang: 'jpn'}) //exp: jpn, eng
  //.ImageLike('media', lang)  //* browser only img || video || canvas
  .progress(function(p) {
    // 進歩状況の表示
    // console.log('progress', p)
    $('.msg').html('now analysing');
  })
  // 結果のコールバック
  .then(function(result) {

  	var msg = "";
  	$(result.words).each(function(){
  		msg += this.choices[0].text + "<br>";
  		// console.log(this.choices[0].text);
  	});
  	$('.msg').html(msg);
    // console.log(result.words[1].choices[0].text);

$('#pro_name').append('<input type=\'hidden\' name=\'name_of_product\' value='+$('.msg').text()+'>');

});

	</script>

<!-- /*****************************************************************************/ -->

</div>

<?php
require("./footer.html");
?>

</body>
</html>
