let idrp='';
function openModalUpdate(id) {
    idrp=id;
    $('#update-modal').modal('show')
    $('.editor1').ckeditor({
        entities_latin: false,
        entities_greek: false,
        extraPlugins: 'easyimage',
        language: 'vi',
        cloudServices_tokenUrl: 'b148fd2bae20f665f3b2e5303b30d567/cs-token-endpoint',
        cloudServices_uploadUrl: 'https://api.imgbb.com/1/upload'
    })
    $.ajax({
        type:'get',
        url:'/baocaohoatdongHT.getdatabyid',
        data:{id:id}
    }).then(function (res) {
        console.log(res)
        $('input[type=radio][value='+res.status+']').prop('checked',true);
        $('input[type=radio]').prop('disabled',true);
        $('#editorgv').val(res.noidung)
        $('#editorbgh').val(res.nhanxet)
        $('#editorgv').prop('disabled',true)
    })
}
function CloseModalUpdate() {
    $('#update-modal').modal('hide')
}
function update() {
    let nhanxet=$('#editorbgh').val(),
        checknhanxet=checkRequire('Nhận xét của BGH',nhanxet);
    if(checknhanxet==false){
        return false;
    }
    $.ajax({
        type:'post',
        url:'/baocaohoatdongHT.update',
        data:{id:idrp,nhanxet:nhanxet}
    }).then(function (res) {
        if(res==1){
            text='Cập nhật thành công';
            Success(text)
            CloseModalUpdate()
            reloadtable()
        }else {
            text='Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }
    })
}
