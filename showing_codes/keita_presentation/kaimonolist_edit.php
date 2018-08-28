<?php
  //ファイル読み込み
  $file_data = file_get_contents("kaimonolist.txt");
  // ここで追記できる
//  file_put_contents("kaimonolist.txt", $file_data . "すきな言葉を入れる" . PHP_EOL);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>買い物リスト編集｜牧戸慶太の就職作品プレゼンテーション</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="wrapper">

  <form action="kaimonolist_koushin.php" method="post">
<table>
  <tr><th><textarea name="kaimonolist" cols="30" rows="20"><?php echo $file_data; ?></textarea></th></tr>
  <tr><th><input type="submit" value="更新する"></tr></th>
</table>
  </form>

</div>

<?php
require("./footer.html");
?>

</body>
</html>
