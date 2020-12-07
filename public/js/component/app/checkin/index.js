function checkin() {
    let idacc=$('#idacc').val();
    $.ajax({
        type:'post',
        url:'checkin.insert',
        data:{idacc:idacc}
    }).then(function (res) {
        if(res==1){
            location.reload()
        }else{
            text='Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }
    })
}
