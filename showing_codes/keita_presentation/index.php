<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>ＴＯＰ｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.1.0.min.js"></script>
</head>
<body>

<div id="wrapper">
<!--
<div id="size1">１３６６px以上</div>
<div id="size2">６００～１０８０pxだよ</div>
<div id="size3">５９９px以下だよ</div>
-->

<div id="menu_select">
<form action="index.php" method="POST" role="">
	<ul>
		<li onclick="tab1();">料理から検索</li>
		<li onclick="tab2();">材料から検索</li>
	</ul>

<?php
  require_once("search1.php");
?>
<?php
  require_once("search2.php");
?>
</form>
</div>

<div id="message"></div>


<?php
if( !empty($_POST["keywords"]) && empty($_POST["keywords2"]) ){
	require_once("search1_result.php");
}
if( empty($_POST["keywords"]) && !empty($_POST["keywords2"]) ){
	require_once("search2_result.php");
}
?>

</div>

<?php
require("./footer.html");
?>

		<script type="text/javascript">
		//<![CDATA[
			document.getElementById('cont1').style.display = 'block';
			document.getElementById('cont2').style.display = 'none';
			var li = document.getElementsByTagName('li');
			var content = document.getElementsByClassName('content');
					li[0].style.backgroundColor = "#ff8e24";
					li[1].style.backgroundColor = "#1af";
					content[0].style.backgroundColor = "#ff8e24";

			function tab1(){
			document.getElementById('cont1').style.display = 'block';
			document.getElementById('cont2').style.display = 'none';
			var li = document.getElementsByTagName('li');
			var content = document.getElementsByClassName('content');
					li[0].style.backgroundColor = "#ff8e24";
					li[1].style.backgroundColor = "#1af";
					content[0].style.backgroundColor = "#ff8e24";
			}

			function tab2(){
			document.getElementById('cont1').style.display = 'none';
			document.getElementById('cont2').style.display = 'block';
			var li = document.getElementsByTagName('li');
			var content = document.getElementsByClassName('content');
					li[0].style.backgroundColor = "#ff8e24";
					li[1].style.backgroundColor = "#1af";
					content[1].style.backgroundColor = "#11aaff";
			}

		//]]>
		</script>

</body>
</html>
