var idchi='';
function OpenModalUpdate(id, r) {
    idchi=id
    $.ajax({
        type: 'get',
        url: '/cackhoangchi.getdatabyid',
        data: {id: id}
    }).then(function (res) {
        $('#name-chi-update').val(res['tenkhoangchi'])
        $('#total-chi-update').val(formatNumber(res['sotien']))
        $('#note-chi-update').val(res['ghichu'])
    })
    $('#update-modal').modal('show')
}

function CloseModalUpdate() {
    $('#update-modal').modal('hide')
}

function updatechi() {
    let ten = $('#name-chi-update').val(),
        total = removeformatNumber($('#total-chi-update').val()),
        note = $('#note-chi-update').val(),
        ghichu = $('#note-chi-update').val(),
        checkten = checkRequire('Tên chi phí', ten),
        checktien = checkRequire('Số tiền', total);
    $.ajax({
        type:'post',
        url:'/cackhoangchi.update',
        data:{id:idchi,ten:ten,sotien:total,note:note}
    }).then(function (res) {
        if(res==1){
            text='Chỉnh sửa khoảng chi thành công'
            Success(text)
            reload()
            CloseModalUpdate()
        }else if(res==0) {
            text='Có lỗi trong quá trình thực hiện'
            ErrorNotify(text)
        }else {
            text='Bạn không phải người tạo , không thực hiên được thao tác'
            ErrorNotify(text)
        }
    })
}

$('#total-chi-update').on('input', function () {
    value = removeformatNumber($(this).val())
    if (value > 10000000000) {
        ErrorNotify('Không được lớn hơn 10,000,000,000')
        $(this).val('10,00,0000,000')
        return false
    }
    $(this).val(formatNumber(value))
})
function updatestatus(id,status) {
    $.ajax({
        type:'post',
        url:'/cackhoangchi.updatestatus',
        data:{id:id,status:status}
    }).then(function (res) {
        if(res==1){
            text='Đổi trạng thái thành công'
            Success(text)
            reload()
        }else if(res==0) {
            text='Có lỗi trong quá trình thực hiện'
            ErrorNotify(text)
        }
    })
}
