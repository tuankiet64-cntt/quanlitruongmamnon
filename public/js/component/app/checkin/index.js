function checkin() {
    let idgv=$('#idgv').val();
    $.ajax({
        type:'post',
        url:'checkin.insert',
        data:{idgv:idgv}
    }).then(function (res) {
        if(res==1){
            $('#on').removeClass('d-none');
            $('#off').addClass('d-none');
        }else{
            text='Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }
    })
}
