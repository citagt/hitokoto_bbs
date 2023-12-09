<?php
function tripcode($string) {
    /*
    使い方: トリップキーとなる文字列を渡す。
    ----------------------------------------
    12文字分をトリップキーとしてトリップを生成する。
    sha3-256でハッシュ化しbase64で符号化する。
    先頭の12文字をトリップとして扱う。
    */
    return "◆".substr(base64_encode(hash("sha3-256", $string)), 0, 12);
}

function tripcodekey_extract($string) {
    /*
    使い方: 文字列を渡す。
    ----------------------------------------
    文字列に含まれる'#'以降の文字列を抽出する。
    トリップキー用途。
    */
    return substr(strstr($string, "#", false), 1);
}

function hashdelete($string) {
    /*
    使い方: 文字列を渡す
    ----------------------------------------
    文字列に含まれる'#'より前の文字列を抽出する。
    トリップキーが含まれる名前欄用。
    */
    return strstr($string, "#", true);
}
?>