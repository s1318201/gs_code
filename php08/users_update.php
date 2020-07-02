<?php
//(8)回目授業)
//PHP:コード記述/修正の流れ
//1. [insert.php]の処理をマルっとコピー！！
//   [処理の流れ：POSTデータ受信 → DB接続 → SQL実行 → 前ページへ戻る]
//2. $id = POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root', XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}


//２．POST値取得（POST数に合わせて増やす）
$name       = $_POST["name"];
$lid        = $_POST["lid"];
$lpw        = $_POST["lpw"];
$kanari_flg = $_POST["kanari_flg"];
$life_flg   = $_POST["life_flg"];
$id         = $_POST["id"];  //追加


//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw, kanari_flg=:kanari_flg, life_flg=:life_flg, id=:id WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(":name", $name);
$stmt->bindValue(":lid", $lid);
$stmt->bindValue(":lpw", $lpw);
$stmt->bindValue(":kanari_flg", $kanari_flg);
$stmt->bindValue(":life_flg", $life_flg);
$stmt->bindValue(":id", $id);

//5. SQL実行
$status = $stmt->execute();

//6. 画面遷移(select.php)
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //header("Location: 行き先ファイル名");
    header("Location: users_select.php");
    exit();
}







?>
