<?php
session_start();
session_regenerate_id(true);

$loginmail = "";

// もしindex.phpでログインがうまくいってたら
if(isset($_SESSION["mail"])){
	$loginmail = $_SESSION["mail"];
}else{
	// ログインしていなかったら
	// またはセッションの有効期限がきれてたら
	header("Location:index.php");
	exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>mypage</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>mypage</h1>
<p>
<?php echo $loginmail; ?>さんログイン中
</p>
<a href="logout.php">ログアウト</a>

</body>
</html>
