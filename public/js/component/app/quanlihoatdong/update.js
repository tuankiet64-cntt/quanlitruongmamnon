let $idold = '';

function OpenModalupdate(id, r) {
    $('#update-modal').modal('show')
    $idold = id;
    getloptuoiupdate()
    $.ajax({
        type: 'get',
        url: '/quanlihoatdong.getdatabyid',
        data: {id: id}
    }).then(function (res) {
        $('input[type=checkbox]').prop('checked', false)
        $('#name-active-update').val(res['tenhoatdong'])
        $('#type-active-update').val(res['iddm']).trigger('change')
        $('#note-active-update').val(res['ghichu'])
        $.each(res['ngaygiangday'], function (index, v) {
            $('input[type=checkbox][value=' + v + ']').prop('checked', true)
        })
    })
}

function CloseModalupdate() {
    $('#update-modal').modal('hide')
}

function getloptuoiupdate() {
    $.ajax({
        type: 'get',
        url: '/quanlihoatdong.getdataloptuoi'
    }).then(function (res) {
        $('#type-active-update option').remove();
        $('#type-active-update').append(res);
    })
}

function update() {
    let ten = $('#name-active-update').val(),
        type = $('#type-active-update').val(),
        nametype = $('#type-active-update option:selected').text(),
        note = $('#note-active-update').val(),
        checkten = checkRequire('Tên', ten),
        ngayday = [];
    if (checkten == false) {
        return false;
    }
    $.each($('input[type=checkbox]:checked'), function (index, value) {
        ngayday[index] = $(this).val()
    })
    if(ngayday==null||ngayday==''){
        text='Vui lòng chọn ngày dạy';
        ErrorNotify(text);
        return false
    }
    $.ajax({
        type: 'post',
        url: '/quanlihoatdong.update',
        data: {nametype:nametype,id: $idold, ten: ten, type: type, ngayday: ngayday, note: note}
    }).then(function (res) {
        if (res == 1) {
            text = 'Đã tạo hoạt động thành công';
            Success(text)
            CloseModalupdate()
            reloadtable()
        } else if (res == 0) {
            text = 'Đã có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        } else {
            ErrorNotify(res)
        }
    })
}
