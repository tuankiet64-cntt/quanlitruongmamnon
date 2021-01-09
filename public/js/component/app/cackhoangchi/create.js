var idchi='';
function OpenModalCreate() {
    $('#create-modal').modal('show')
}

function CloseModalCreate() {
    $('#create-modal').modal('hide')
}
function createchi() {
    let ten = $('#name-chi').val(),
        total = removeformatNumber($('#total-chi').val()),
        note = $('#note-chi').val(),
        ghichu = $('#note-chi').val(),
        checkten = checkRequire('Tên chi phí', ten),
        checktien = checkRequire('Số tiền', total);
    if(checkten==false||checkten==false){
        return false;
    }
    $.ajax({
        type:'post',
        url:'/cackhoangchi.insert',
        data:{ten:ten,sotien:total,note:note}
    }).then(function (res) {
        if(res==1){
            text='Tạo khoảng chi thành công'
            Success(text)
            reload()
            CloseModalCreate()
            deleteinput()
        }else if(res==0) {
            text='Có lỗi trong quá trình thực hiện'
            ErrorNotify(text)
        }else {
            text='Bạn không phải người tạo , không thực hiên được thao tác'
            ErrorNotify(text)
        }
    })
}

$('#total-chi').on('input', function () {
    value = removeformatNumber($(this).val())
    if (value > 10000000000) {
        ErrorNotify('Không được lớn hơn 10,000,000,000')
        $(this).val('10,00,0000,000')
        return false
    }
    $(this).val(formatNumber(value))
})
function deleteinput() {
    $('#create-modal input').val("")
}
