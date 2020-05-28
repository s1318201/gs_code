<?php
function h($value){
    return htmlspecialchars($value,ENT_PUOTES);//危ない関数を排除してくれるので毎回入れる
}


$name = $_POST["name"];
$mail = $_POST["mail"];

//******【課題】File書き込み**************************************************
$file = fopen("data/data.txt","a");	// ファイル読み込み
fwrite($file, $name."\r\n".$mail."\r\n");
fclose($file);


?>
<html>
    <head>
        <meta charset="utf-8">
        <title>POST（受信）</title>
    </head>
    <body>
        お名前：<?php echo $name; ?>
        EMAIL：<?php echo $mail; ?>
        <ul>
            <li><a href="index.php">index.php</a></li>
        </ul>
    </body>
</html>


<!--
//課題は
//名前とメールの変数をカンマ区切りの文字列にしてファイルに書き込めるようにしてください。
//確認のURL（必ずここから）localhost/php01/post.php-->
