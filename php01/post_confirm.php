<?php
$flg=1;
$name = $_POST["name"];
$mail = $_POST["mail"];
if($name==""){
    $name = "未入力です";
    $flg =0;
}
if($mail==""){
    $mail = "未入力です";
    $flg =0;
}


?>
<html>
<head>
<meta charset="utf-8">
<title>POST（受信）</title>
</head>
<body>
お名前：<?php echo $name; ?>
EMAIL：<?php echo $mail; ?>
    
<?php
    if($flg == 1){
    <button>登録</button>
    }
?>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>