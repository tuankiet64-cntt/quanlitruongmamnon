$(function () {
    loadmonhoc()
    $('#editor').ckeditor({
        uiColor: '#9AB8F3'
    })
})
function loadmonhoc() {
    idtk = $('#idgv').val()
    // console.log(idgv)
    $.ajax({
        type: 'get',
        url: '/baocaohoatdongGV.getdata',
        data: {id: idtk}
    }).then( function (res) {
        $('#content').html(res)
        $('textarea.editor1').ckeditor({
            entities_latin: false,
            entities_greek: false,
            extraPlugins: 'easyimage',
            language: 'vi',
            cloudServices_tokenUrl: 'b148fd2bae20f665f3b2e5303b30d567/cs-token-endpoint',
            cloudServices_uploadUrl: 'https://api.imgbb.com/1/upload'
        })
        loadUpdate()
    })

}
function report(id) {
    idtk = $('#idgv').val()
    let status = $('input[type=radio][name='+id+']:checked').val(),
        data = $('#' + id + '').val();
    if (status == ''||status==null) {
        text='Vui lòng chọn trạng thái';
        ErrorNotify(text)
        return false
    }
    $.ajax({
        type:'post',
        url:'/baocaohoatdongGV.insert',
        data:{status:status,data:data,idtk:idtk,idhd:id}
    }).then(function (res) {
        if(res==1){
            text='Cập nhật báo cáo thành công';
            Success(text)
        }else{
            text='Có lỗi trong quá trình báo cáo';
            ErrorNotify(text)
        }
    })
}
function loadUpdate() {
    idtk = $('#idgv').val()
    $.ajax({
        type:'get',
        url:'/baocaohoatdongGV.getdatabyid',
        data:{idtk:idtk}
    }).then(function (res) {
       $.each(res,function (index,value) {
           $('input[type=radio][name='+value.idhd+'][value='+value.status+']').prop('checked',true)
           $('#' + value.idhd + '').val(value.noidung);
       })
    })
}

