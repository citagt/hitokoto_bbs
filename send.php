<?php
require_once 'func_trip.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sending Message...</title>
    </head>
    <body>
        <h2>投稿完了</h2>
        <button onclick="location.href='index.php'">戻る</button>
        <?php
        $id = null;
        $email = $_POST["email"];
        $name = $_POST["name"];
        $contents = $_POST["contents"];
        date_default_timezone_set('Asia/Tokyo');
        $created_at = date("Y-m-d H:i:s");

        //入力された文字列をHTMLエンティティ化する。
        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $contents = htmlspecialchars($contents, ENT_QUOTES, 'UTF-8');

        if(empty($name)) {
            $name = "無名者";
        } elseif(strpos($name, "#") === 0) {
            $name = "無名者".$name;
        }

        if(gettype(strpos($name, "#")) == "integer") {
            echo "トリップ記号をを検出しました。";
            echo "<br>";
            $name = hashdelete($name).tripcode(tripcodekey_extract($name));
        }
        //DB接続情報を設定します。
        $pdo = new PDO(
            "mysql:dbname=hitokoto_bbs;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
        );
        //ここで「DB接続NG」だった場合、接続情報に誤りがあります。
        if ($pdo) {
            echo "DB接続OK";
            echo "<br>";
        } else {
            echo "DB接続NG";
            echo "<br>";
        }
        //SQLを実行。
        $regist = $pdo->prepare("INSERT INTO post(id, email, name, contents, created_at) VALUES (:id,:email,:name,:contents,:created_at)");
        $regist->bindParam(":id", $id);
        $regist->bindParam(":email", $email);
        $regist->bindParam(":name", $name);
        $regist->bindParam(":contents", $contents);
        $regist->bindParam(":created_at", $created_at);
        $regist->execute();
        //ここで「登録失敗」だった場合、SQL文に誤りがあります。
        if ($regist) {
            echo "登録成功";
            echo "<br>";
        } else {
            echo "登録失敗";
            echo "<br>";
        }
        ?>
    </body>
</html>