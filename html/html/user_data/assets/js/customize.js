/* カスタマイズ用Javascript */
$('#target_btn').click(function (e) {

    var action = this.getAttribute("data-redirect");
    if(action == 'logout'){
        var x = confirm("本当にログアウトしますか？");
        if(!x) return false;
    }
});