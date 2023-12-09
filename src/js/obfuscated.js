function randomString(length) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function updateText() {
    var elements = document.getElementsByClassName('obfuscated');
    for (var i = 0; i < elements.length; i++) {
        elements[i].textContent = randomString(20); // 5文字のランダムな文字列を生成
    }
    requestAnimationFrame(updateText);
}

updateText();