/**
 * create đơn nhập học
 * @returns {boolean}
 */
$('#ngay-sinh').daterangepicker({
    singleDatePicker: true,
    locale: {
        format: 'DD-MM-YYYY'
    }
});

function create() {
    let tenhs = $('#ten-hocsinh').val(),
        ngaysinh = $('#ngay-sinh').val(),
        gioitinh = $('#gender').val(),
        hokhau = $('#ho-khau-thuong-tru').val(),
        diachi = $('#dia-chi').val(),
        suckhoe = $('#suc-khoe').val(),
        tenph = $('#ho-ten-ph').val(),
        sdtph = $('#sdt-ph').val(),
        mailph = $('#mail-ph').val(),
        checked = $('#nguoithan').find('input[type="radio"]:checked').val();

    let checktenph = checkRequire('Tên phụ huynh', tenph),
        checksdtph = checkPhone('Số điện thoại phụ huynh', sdtph),
        checkmailph = checkEmail('Mail phụ huynh', mailph),
        mailme = $('#mail-me').val(),
        checktenhs = checkRequire('Tên của bé', tenhs),
        checkngaysinh = checkRequire('Ngày sinh', ngaysinh),
        checkgioitinh = checkRequire('Giới tính', gioitinh),
        checkhokhau = checkRequire('Hộ khẩu thường trú', hokhau),
        checkdiachi = checkRequire('Chỗ ở hiện nay', diachi),
        checksuckhoe = checkRequire('Tình trạng sức khỏe', suckhoe);
    console.log(checkgioitinh,gioitinh)

    if (checktenhs == false) {
        $('#ten-hocsinh').parent().find('span i').removeClass('d-none')
    }
    if (checkngaysinh == false) {
        $('#ngay-sinh').parent().find('span i').removeClass('d-none')
    }
    if (checkhokhau == false) {
        $('#ho-khau-thuong-tru').parent().find('span i').removeClass('d-none')
    }
    if (checkdiachi == false) {
        $('#dia-chi').parent().find('span i').removeClass('d-none')
    }
    if (suckhoe == false) {
        $('#suc-khoe').parent().find('span i').removeClass('d-none')
    }
    if (checktenph == false) {
        $('#ho-ten-ph').parent().find('span i').removeClass('d-none')
    }
    if (checksdtph == false) {
        $('#sdt-ph').parent().find('span i').removeClass('d-none')
    }
    if (checkmailph == false) {
        erroricon($('#mail-ph'))
    }
    if (checktenhs == false || checkngaysinh == false || checkgioitinh == false || checkhokhau == false || checkdiachi == false || checksuckhoe == false || checktenph == false || checksdtph == false || checkmailph == false) {
        $('#submit').prop('disabled', false)
        return false;
    }


    $.ajax({
        type: 'post',
        url: '/nhaphoc.dangky',
        data: {
            tenhs: tenhs,
            ngaysinh: ngaysinh,
            gioitinh: gioitinh,
            hokhau: hokhau,
            diachi: diachi,
            suckhoe: suckhoe,
            tenph: tenph,
            mailph: mailph,
            sdtph: sdtph,
        }
    }).then(function (res) {
        if (res == 1) {
            $('#dangkinhaphoc').addClass('d-none')
            $('#camon').removeClass('d-none')
            /**
             * Sau khi đăng kí thành công mới gửi mail
             */
            $.ajax({
                type: 'post',
                url: '/mail.camon',
                data: {mailph: mailph}
            })
        } else {
            $('#submit').prop('disabled', false)
            ErrorNotify('Có lỗi trong quá trình tạo')
        }
    })
}

$('input').on('input', function () {
    if ($(this).val()) {
        $(this).parent().find('span i').addClass('d-none')
    }
})
let option = "";
/**
 * event check nguoithan
 */
$('#nguoithan').find('input[type="radio"]').on('change', function () {
    if ($(this).val() == 1) {
        $('#phuhuynh').addClass('d-none')
        $('#phuhuynh input').val("");
        $('#chavame').removeClass('d-none')
    } else {
        $('#chavame').addClass('d-none');
        $('#chavame input').val("");
        $('#phuhuynh').removeClass('d-none')
    }
    console.log($(this).val())
})
/**
 * Event off autocomplete
 */
$('#ngay-sinh').on('input', function () {
    $(this).val("")
    ErrorNotify('Hãy chọn ngày')
})
$('.sdt').on('input', function () {

})
