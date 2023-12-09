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
        <!--Fonts-->
        <link rel="stylesheet" type="text/css" href="/src/css/font.css">
        <!--CSS Stylesheet-->
        <link rel="stylesheet" type="text/css" href="/src/css/index.css">
        <!--Javascript-->
        <script type="text/javascript" src="/src/js/obfuscated.js" async></script>
        <title>一言BBS</title>
    </head>
    <body>
        <div id="main_container">
            <header>
                <span class="obfuscated"></span>
                <h1>一言BBS</h1>
                <span class="obfuscated"></span>
                <marquee>名前欄に「#<トリップキー>」と入力すると、トリップが生成されます。トリップキーは12文字のみ受け付けます。</marquee>
            </header>
            <h2>新規投稿</h2>
            <form action="send.php" method="post">
                名前 : <input type="text" name="name" value="" maxlength="30"><br>
                e-mail : <input type="text" name="email" value="" maxlength="50"><br>
                投稿内容 : <br><textarea cols="100" rows="8" name="contents" maxlength="500"></textarea><br>
                <button type="submit">投稿</button>
            </form>
            <h3>投稿内容一覧</h3>
            <div id="uploads_list">
                <?php foreach($regist as $loop):?>
                    <div class="upload">
                        <?php echo $loop['id']?> 名前 : <?php echo $loop['name']?> <?php echo $loop['email']?> : <?php echo $loop['created_at']?><br>
                        投稿内容 : <?php echo $loop['contents']?>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </body>
</html>