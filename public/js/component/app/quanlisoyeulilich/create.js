$('#create-modal').on('shown.bs.modal', function () {
    configdatetime($('.datetimepicker'),$(this))
})
function createhs() {
    let tenhs = $('#tenhs').val(),
        idhs=$('#idnknhaphoc').val(),
        tenthuonggoi = $('#tenthuonggoi').val(),
        ngaysinh_hs = $('#ngaysinh').val(),
        diachi = $('#diachi').val(),
        hokhauthuongtru = $('#hokhau').val(),
        hokhautamtru = $('#hokhautamtru').val(),
        dantoc = $('#dantoc').val(),
        tongiao = $('#tongiao').val(),
        suckhoehientai = $('#suckhoehientai').val(),
        hotenac = $('#hotenac').val(),
        sdtac = $('#sdtac').val(),
        hotenbo = $('#hotenbo').val(),
        ngaysinh_bo = $('#ngaysinh_bo').val(),
        sdt_bo = $('#sdtbo').val(),
        email_bo = $('#emailbo').val(),
        nghenghiep_bo = $('#nghenghiep_bo').val(),
        tencongty_bo = $('#tencongty_bo').val(),
        hotenme = $('#hotenme').val(),
        ngaysinh_me = $('#ngaysinh_me').val(),
        sdt_me = $('#sdtme').val(),
        email_me = $('#emailme').val(),
        nghenghiep_me = $('#nghenghiep_me').val(),
        tencongty_me = $('#tencongty_me').val(),
        hotenph = $('#hotenph').val(),
        ngaysinh_ph = $('#ngaysinh_ph').val(),
        sdt_ph = $('#sdt_ph').val(),
        email_ph = $('#email_ph').val(),
        nghenghiep_ph = $('#nghenghiep_ph').val(),
        tencongty_ph = $('#tencongty_ph').val(),
        quanhe = $('#quanhe_ph').val(),
        gioitinh=$('#gioitinh').val(),
        ngayvaotruong=$('#ngayvaotruong').val();
    let checktenhs = checkRequire('Tên học sinh', tenhs),
        checkngaysinh = checkDate('Ngày sinh của bé',ngaysinh_hs),
        checkdiachi = checkRequire('Chỗ ở hiện tại', diachi),
        checkhokhau = checkRequire('Hộ khẩu thường trú', hokhauthuongtru),
        checkdantoc = checkRequire('Dân tộc', dantoc),
        checkngayvao=checkDate('Ngày vào trường',ngayvaotruong);
    if ($('#phuhuynh').val() == 1) {
        let checktenph = checkRequire('Họ tên phụ huynh', hotenph),
            checkngaysinhph = checkDate('Ngày sinh của phụ huynh', ngaysinh_ph),
            checksdtph = checkPhone('Số điện thoại phụ huynh', sdt_ph),
            checkemailph = checkEmail('Email phụ huynh', email_ph),
            checknghenghiepph = checkRequire('Nghề nghiệp của phụ huynh', nghenghiep_ph),
            checkquanhe = checkRequire('Quan hệ với bé', quanhe);
        if (checktenhs == false || checkngaysinh == false || checkdiachi == false || checkhokhau == false ||
            checkdantoc == false || checktenph == false || checkngaysinhph == false || checksdtph == false || checkemailph == false || checknghenghiepph == false || checkquanhe == false||checkngayvao==false) {
            return false;
        }
    } else {
        let checktenbo = checkRequire('Họ tên bố', hotenbo),
            checkngaysinhbo = checkDate('Ngày sinh của bố', ngaysinh_bo),
            checksdtbo = checkPhone('Số điện thoại bố', sdt_bo),
            checkemailbo = checkEmail('Email bố', email_bo),
            checknghenghiepbo = checkRequire('Nghề nghiệp của bố', nghenghiep_bo),
            checktenme = checkRequire('Họ tên mẹ', hotenme),
            checkngaysinhme = checkDate('Ngày sinh của mẹ', ngaysinh_me),
            checksdtme = checkPhone('Số điện thoại mẹ', sdt_me),
            checkemailme = checkEmail('Email mẹ', email_me),
            checknghenghiepme = checkRequire('Nghề nghiệp của mẹ', nghenghiep_me);
        if (checktenhs == false || checkngaysinh == false || checkdiachi == false || checkhokhau == false ||
            checkdantoc == false || checktenbo == false || checkngaysinhbo == false || checksdtbo == false ||
            checkemailbo == false || checknghenghiepbo == false || checktenme == false || checkngaysinhme == false ||
            checksdtme == false || checkemailme == false || checknghenghiepme == false||checkngayvao==false) {
            return false;
        }
    }
    // console.log(hotenph)
   $.ajax({
       type:'post',
       url:'/qlsyll.create',
       data:{
       tenhs:tenhs,tenthuonggoi:tenthuonggoi,ngaysinh_hs:ngaysinh_hs,diachi:diachi,idhs:idhs,
       hokhauthuongtru:hokhauthuongtru,hokhautamtru:hokhautamtru,dantoc:dantoc,gioitinh:gioitinh,
       suckhoehientai:suckhoehientai,hotenac:hotenac,sdtac:sdtac,tongiao:tongiao,ngayvaotruong:ngayvaotruong,
       hotenbo:hotenbo,email_bo:email_bo,ngaysinh_bo:ngaysinh_bo,nghenghiep_bo:nghenghiep_bo,sdt_bo:sdt_bo,tencongty_bo:tencongty_bo,
       hotenme:hotenme,ngaysinh_me:ngaysinh_me,sdt_me:sdt_me,email_me:email_me,nghenghiep_me:nghenghiep_me,tencongty_me:tencongty_me,
       hotenph:hotenph,ngaysinh_ph:ngaysinh_ph,sdt_ph:sdt_ph,email_ph:email_ph,nghenghiep_ph:nghenghiep_ph,tencongty_ph:tencongty_ph,quanhe:quanhe
       }
   }).then(function (res) {
       if(res==1){
           reloadTable();
           text='Bạn đã bổ sung thông tin thành công';
           Success(text);
           closemodal();
       }
       else {
           text='Có lỗi trong quá trình thực hiện';
           ErrorNotify(text)
           return false;
       }
   })

}
