$(function () {
    getdataUser()
})

function getdataUser() {
    $('.input').addClass('d-none col-6')
    $('.buttonload').addClass('d-none float-right col-3')
    let id = $('#idUser').val();
    $.ajax({
        type: 'get',
        url: '/user.getdata',
        data: {id: id}
    }).then(function (res) {
        $('#ten').text(res['hovaten'])
        $('#gioitinh').text(res['gioitinh'])
        $('#ngaysinh').text(res['ngaysinh'])
        $('#CMND').text(res['cmnd'])
        $('#hokhau').text(res['hokhau'])
        $('#diachi').text(res['diachi'])
        $('#chucvu').text(res['tenchucvu'])
        $('#Email').text(res['email'])
        $('#sdt').text(res['sdt'])
        $('#dantoc').text(res['dantoc'])
        $('#tongiao').text(res['tongiao'])
        $('#ngayvaotruong').text(res['ngayvaotruong'])
        $('#lopdangday').text(res['tenlop'])
        $('#ngayday').text(res['ngayday'])
        $('#ten-input').val(res['hovaten'])
        $('#gioitinh-input').val(res['idgioitinh']).trigger('select2:select')
        $('#ngaysinh-input').val(res['ngaysinh'])
        $('#CMND-input').val(res['cmnd'])
        $('#hokhau-input').val(res['hokhau'])
        $('#diachi-input').val(res['diachi'])
        $('#sdt-input').val(res['sdt'])
        $('#dantoc-input').val(res['dantoc'])
        $('#tongiao-input').val(res['tongiao'])
    })
}

$('#edit').click(function () {
    $('.text').toggleClass('d-none')
    $('.input').toggleClass('d-none')
    $('.buttonload').toggleClass('d-none')
    $.datetimepicker.setLocale('vi');
    $('#ngaysinh-input').datetimepicker({
        format: 'd-m-Y',
        timepicker: false,
        scrollInput: false
    })
    $('#ngaysinh-input').on('keydown', function () {
        return false
    })
})

function updateUser() {
    let ten = $('#ten-input').val(),
        gioitinh = $('#gioitinh-input').val(),
        ngaysinh = $('#ngaysinh-input').val(),
        cmnd = $('#CMND-input').val(),
        hokhau = $('#hokhau-input').val(),
        diachi = $('#diachi-input').val(),
        sdt = $('#sdt-input').val(),
        dantoc = $('#dantoc-input').val(),
        tongiao = $('#tongiao-input').val(),
        id = $('#idUser').val(),
        checkhokhau = checkRequire('Hộ khẩu', hokhau),
        checkdantoc = checkRequire('Dân tộc', dantoc),
        checkdiachi = checkRequire('Địa chỉ', diachi),
        checksdt = checkRequire('SỐ điện thoại', sdt),
        checkCMND = checkRequire('Chứng minh nhân dân', cmnd),
        checkngaysinh = checkRequire('Ngày sinh', ngaysinh),
        checkten = checkRequire('Tên', ten);
    if (checkhokhau == false || checkdantoc == false || checkdiachi == false || checksdt == false || checkCMND == false || checkten == false || checkngaysinh == false) {
        return false
    }
    $.ajax({
        type: 'post',
        url: '/User.update',
        data: {
            id:id,ten: ten, gioitinh: gioitinh, ngaysinh: ngaysinh, cmnd: cmnd,
            hokhau: hokhau, diachi: diachi, sdt: sdt, dantoc: dantoc, tongiao: tongiao
        }
    }).then(function (res) {
        if(res==1){
            text='Bạn đã update thành công';
            Success(text);
            $('.text').removeClass('d-none')
            $('.input').addClass('d-none')
            $('.buttonload').addClass('d-none')
            getdataUser()
        }else {
            text='Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }
    })
}
