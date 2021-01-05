function changpassword() {
    let oldpass = $('#oldpass').val(),
        newpass = $('#newpass').val(),
        renew = $('#renew').val(),
        email=$('#emailUser').val(),
        checkoldpass = checkRequire('Mật khẩu cũ', oldpass),
        checknewpass = checkRequire('Mậu khẩu mới', newpass),
        checkrenew = checkRequire('Nhập lại', renew);
    if (checkoldpass == false || checknewpass == false || checkrenew == false) {
        return false
    }
    if (newpass != renew) {
        text = 'Mật khẩu không khớp nhau'
        ErrorNotify(text);
        return false;
    }
    $.ajax({
        type:'post',
        url:'/password.update',
        data:{oldpass:oldpass,newpass:newpass,email:email}
    }).then(function (res) {
        if(res==1){
            text='Đổi mật khẩu thành công';
            Success(text);
            $('.input').val('')
            window.location="http://127.0.0.1:8000/logout";
        }else if(res==2){
            text='Sai mật khẩu cũ'
            ErrorNotify(text)
            return false
        }else{
            text='Có lỗi trong quá trình thực hiện'
            ErrorNotify(text)
            return false
        }
    })

}
$('.toggle-password').click(function(){
    $(this).find('i').toggleClass('fa fa-eye fa fa-eye-slash');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});
