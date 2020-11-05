/**
 * create đơn nhập học
  * @returns {boolean}
 */
function create() {
    let tenhs=$('#ten-hocsinh').val(),
        ngaysinh=$('#ngay-sinh').val(),
        gioitinh=$('#gender').find('option:selected').val(),
        hokhau=$('#ho-khau-thuong-tru').val(),
        diachi=$('#dia-chi').val(),
        suckhoe=$('#suc-khoe').val(),
        tenbo=$('#ho-ten-bo').val(),
        sdtbo=$('#sdt-bo').val(),
        mailbo=$('#mail-bo').val(),
        tenme=$('#ho-ten-me').val(),
        sdtme=$('#sdt-me').val(),
        mailme=$('#mail-me').val(),
        tenph=$('#ho-ten-ph').val(),
        sdtph=$('#sdt-ph').val(),
        mailph=$('#mail-ph').val(),
        checked=$('#nguoithan').find('input[type="radio"]:checked').val();
    $('#submit').prop('disabled',true)
    if(checked==1){
        let checktenhs=checkRequire('Tên của bé',tenhs),
            checkngaysinh=checkRequire('Ngày sinh',ngaysinh),
            checkgioitinh=checkRequire('Giới tính',gioitinh),
            checkhokhau=checkRequire('Hộ khẩu thường trú',hokhau),
            checkdiachi=checkRequire('Chỗ ở hiện nay',diachi),
            checksuckhoe=checkRequire('Tình trạng sức khỏe',suckhoe),
            checktenbo=checkRequire('Họ và tên bố',tenbo),
            checksdtbo=checkPhone('Số điện thoại của bố',sdtbo),
            checkmailbo=checkEmail('Email của bố',mailbo),
            checktenme=checkRequire('Họ và tên của mẹ',tenme),
            checksdtme=checkPhone('Số điện thoại của bố',sdtme),
            checkmailme=checkEmail('Email của mẹ',mailme);
        if(checktenhs==false||checkngaysinh==false||checkgioitinh==false||checkhokhau==false||checkdiachi==false||checksuckhoe==false||checktenbo==false||
            checksdtbo==false||checkmailbo==false||checktenme==false||checksdtbo==false||checktenme==false||checksdtme==false||checkmailme==false){
            $('#submit').prop('disabled',false)
            return false;
        }
    }else{
        let checktenph=checkRequire('Tên phụ huynh',tenph),
            checksdtph=checkPhone('Số điện thoại phụ huynh',sdtph),
            checkmailph=checkEmail('Mail phụ huynh',mailph);
        if(checktenph==false||checksdtph==false||checkmailph==false){
            $('#submit').prop('disabled',false)
            return false;
        }
    }
    $.ajax({
        type:'post',
        url:'/nhaphoc.dangky',
        data:{tenhs:tenhs,ngaysinh:ngaysinh,gioitinh:gioitinh,hokhau:hokhau,diachi:diachi,suckhoe:suckhoe,tenbo:tenbo, sdtbo:sdtbo,mailbo:mailbo,tenme:tenme,sdtme:sdtme,mailme:mailme,tenph:tenph,mailph:mailph,sdtph:sdtph,checked:checked}
    }).then(function (res) {
       if(res==1){
           $('#dangkinhaphoc').addClass('d-none')
           $('#camon').removeClass('d-none')
           /**
            * Sau khi đăng kí thành công mới gửi mail
            */
           $.ajax({
               type:'post',
               url:'/mail.camon',
               data:{status:checked,tenhs:tenhs,mailbo:mailbo,mailme:mailme,mailph:mailph}
           })
       }else {
           $('#submit').prop('disabled',false)
           ErrorNotify('Có lỗi trong quá trình tạo')
       }
    })
}
let option="";
/**
 * event check nguoithan
 */
$('#nguoithan').find('input[type="radio"]').on('change',function () {
    if($(this).val()==1){
        $('#phuhuynh').addClass('d-none')
        $('#phuhuynh input').val("");
        $('#chavame').removeClass('d-none')
    }else {
        $('#chavame').addClass('d-none');
        $('#chavame input').val("");
        $('#phuhuynh').removeClass('d-none')
    }
    console.log($(this).val())
})
/**
 * Event off autocomplete
 */
$('#ngay-sinh').on('input',function () {
    $(this).val("")
    ErrorNotify('Hãy chọn ngày')
})
$('.sdt').on('input',function () {

})
