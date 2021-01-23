$(function () {
    // $('.js-example-basic-single').select2({
    //     dropdownParent: $('#update-modal'),
    //     theme: 'classic'
    // })
    configdatetime($('.datetimepicker-update'), $('#update-modal'))
    getcvupdate()
})

function closeModalUpdate() {
    $('#update-modal').modal('hide')
}

/**
 * lấy dữ liệu chức vụ
 */
function getcvupdate() {
    $.ajax({
        type: 'get',
        url: '/quanlitaikhoan.getdatacv',
    }).then(function (res) {
        $('#chucvu-update option').remove()
        $('#chucvu-update').append(res)
    })
}

/**
 * Get data
 */
function getdataUpdate(id) {
    $('#update-modal input').val("")
    $('#update-modal').modal('show')
    $.ajax({
        type: 'get',
        url: '/quanlitaikhoan.getdataupdate',
        data: {id: id}
    }).then(function (res) {
        $('#giaovien').val(res.id);
        $('#mataikhoan').val(res.mataikhoan);
        $('#hovaten-update').val(res.hovaten)
        $('#gioitinh-update').val(res.gioitinh).trigger('change')
        $('#ngaysinh-update').val(res.ngaysinh)
        $('#cmnd-update').val(res.cmnd)
        $('#diachi-update').val(res.diachi)
        $('#hokhau-update').val(res.hokhau)
        $('#bangcap-update').val(res.bangcap)
        $('#dantoc-update').val(res.dantoc)
        $('#tongiao-update').val(res.tongiao)
        $('#sdt-update').val(res.sdt)
        $('#ngayvaotruong-update').val(res.ngayvaotruong)
        $('#chucvu-update').val(res.roles[0]['id']).trigger('change')
        $('#email-update').val(res.email)
    })
}

/**
 * Update
 */
function update() {
    let tengv = $('#hovaten-update').val(),
        id = $('#giaovien').val(),
        gioitinh = $('#gioitinh-update').val(),
        ngaysinh = $('#ngaysinh-update').val(),
        chucvu = $('#chucvu-update').val(),
        cmnd = $('#cmnd-update').val(),
        ngayvaotruong = $('#ngayvaotruong-update').val(),
        diachi = $('#diachi-update').val(),
        hokhau = $('#hokhau-update').val(),
        dantoc = $('#dantoc-update').val(),
        tongiao = $('#tongiao-update').val(),
        bangcap = $('#bangcap-update').val(),
        email = $('#email-update').val(),
        sdt = $('#sdt-update').val(),
        mataikhoan=$('#mataikhoan').val()
        checktengv = checkRequire('Tên giáo viên', tengv),
        checkngaysinh = checkDate('ngày sinh giáo viên', ngaysinh),
        checkcmnd = checkCMND('Chứng minh nhân dân', cmnd),
        checkngayvaotruong = checkDate('ngày vào trường', ngayvaotruong),
        checkdiachi = checkRequire('Địa chỉ', diachi),
        checkhokhau = checkRequire('Hộ khẩu', hokhau),
        checkdantoc = checkRequire('Dân tộc', dantoc),
        checkemail = checkEmail('Email giáo viên', email),
        checksdt = checkPhone('SĐT giáo viên', sdt),
        checkbangcap = checkRequire('Bằng cấp', bangcap);
    if (checktengv == false || checkngaysinh == false || checkcmnd == false || checkngayvaotruong == false ||
        checkdiachi == false || checkhokhau == false || checkdantoc == false ||
        checkemail == false || checksdt == false || checkbangcap == false) {
        return false;
    }
    $.ajax({
        type: 'post',
        url: '/quanlitaikhoan.update',
        data: {
            id: id,
            tengv: tengv,
            gioitinh: gioitinh,
            ngaysinh: ngaysinh,
            chucvu: chucvu,
            cmnd: cmnd,
            ngayvaotruong: ngayvaotruong,
            diachi: diachi,
            hokhau: hokhau,
            dantoc: dantoc,
            tongiao: tongiao,
            email: email,
            sdt: sdt,
            bangcap: bangcap,
            mataikhoan:mataikhoan
        }
    }).then(function (res) {
        if (res == 1) {
            text = 'Sửa tài khoản thành công';
            Success(text);
            reloadtabel()
            closeModalUpdate()
        } else {
            text = 'Có lỗi trong quá trình tạo';
            ErrorNotify(text);
            return false;
        }
    })
}
function status(id) {
    $.ajax({
        type:'post',
        url:'/quanlitaikhoan.changestatus',
        data:{id:id}
    }).then(function (res) {
        if(res==1){
            text='Thay đổi trạng thái thành công';
            Success(text)
        }else{
            text='Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }
    })
}
