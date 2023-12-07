<?php
//DB接続情報を設定。
$pdo = new PDO(
    "mysql:dbname=hitokoto_bbs;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
);
//ここで「DB接続NG」だった場合、接続情報に誤りがあります。
/*
if ($pdo) {
    echo "DB接続OK";
} else {
    echo "DB接続NG";
}
*/
$regist = $pdo->prepare("SELECT * FROM post");
$regist->execute();
//ここで「登録失敗」だった場合、SQL文に誤りがあります。
/*
if ($regist) {
    echo "登録成功";
} else {
    echo "登録失敗";
}
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/src/css/index.css">
        <title>一言BBS</title>
    </head>
    <body>
        <div id="main_container">
            <h1>一言BBS</h1>
            <p>新規投稿</p>
            <form action="send.php" method="post">
                e-mail : <input type="text" name="email" value="">
                ニックネーム : <input type="text" name="name" value=""><br>
                投稿内容 : <br><textarea cols="100" rows="8" name="contents"></textarea><br>
                <button type="submit">投稿</button>
            </form>
            <h2>投稿内容一覧</h2>
                <?php foreach($regist as $loop):?>
                    <div>No : <?php echo $loop['id']?></div>
                    <div>メールアドレス : <?php echo $loop['email']?></div>
                    <div>ニックネーム : <?php echo $loop['name']?></div>
                    <div>投稿内容 : <?php echo $loop['contents']?></div>
                <?php endforeach;?>
        </div>
    </body>
</html>