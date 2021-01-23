$('#create-modal').on('shown.bs.modal', function () {
    configdatetime($('.datetimepicker'), $(this))
    $.each($(this).find('.need'), function () {
        if ($(this).val() == "") {
            $(this).addClass('errorclass')
        }
    })
})
$('#create-modal').on('hide.bs.modal', function () {
    $.each($(this).find('input'), function () {
        $(this).removeClass('errorclass')

    })
})
var status = 0;
$('#add_ph').on('click', function () {
    console.log(status)
    if(status == 1){
        $('.ph-add').addClass("d-none");
        $(this).text("Thêm người thân")
        status=0;
        return
    }
    $('.ph-add').removeClass("d-none");
    $(this).text("Xóa người thân")
    status = 1;
})
$('.datetimepicker').on('change', function () {
    if ($(this).val() != "") {
        $(this).removeClass('errorclass')
        return
    }
    $(this).removeClass('errorclass')
})
$('#create-modal .need').on('input', function () {
    if ($(this).val() != "") {
        $(this).removeClass('errorclass')
        return
    }
    $(this).addClass('errorclass')
})

function createhs() {
    let tenhs = $('#tenhs').val(),
        idhs = $('#idnknhaphoc').val(),
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
        hotenph = $('#hotenph').val(),
        ngaysinh_ph = $('#ngaysinh_ph').val(),
        sdt_ph = $('#sdt_ph').val(),
        email_ph = $('#email_ph').val(),
        nghenghiep_ph = $('#nghenghiep_ph').val(),
        tencongty_ph = $('#tencongty_ph').val(),
        hotenph_add = $('#hotenph-add').val(),
        ngaysinh_ph_add = $('#ngaysinh_ph-add').val(),
        sdt_ph_add = $('#sdt_ph-add').val(),
        email_ph_add = $('#email_ph-add').val(),
        nghenghiep_ph_add = $('#nghenghiep_ph-add').val(),
        tencongty_ph_add = $('#tencongty_ph-add').val(),
        gioitinh = $('#gioitinh').val(),
        quanhe = $('#quanhe_ph').find('option:selected').val(),
        quanhe_ph = $('#quanhe_ph_add').find('option:selected').val(),
        ngayvaotruong = $('#ngayvaotruong').val();
    let checktenhs = checkRequire('Tên học sinh', tenhs),
        checkngaysinh = checkDate('Ngày sinh của bé', ngaysinh_hs),
        checkdiachi = checkRequire('Chỗ ở hiện tại', diachi),
        checkhokhau = checkRequire('Hộ khẩu thường trú', hokhauthuongtru),
        checkdantoc = checkRequire('Dân tộc', dantoc),
        checkngayvao = checkDate('Ngày vào trường', ngayvaotruong);
    if (status == 1) {
        let checktenph_add = checkRequire('Họ tên phụ huynh', hotenph_add),
            checkngaysinhph_add = checkDate('Ngày sinh của phụ huynh', ngaysinh_ph_add),
            checktenph = checkRequire('Họ tên phụ huynh', hotenph),
            checkngaysinhph = checkDate('Ngày sinh của phụ huynh', ngaysinh_ph),
            checksdtph = checkPhone('Số điện thoại phụ huynh', sdt_ph),
            checkemailph = checkEmail('Email phụ huynh', email_ph),
            checknghenghiepph = checkRequire('Nghề nghiệp của phụ huynh', nghenghiep_ph);
        if (checktenhs ==false||checkngaysinh==false||checkdiachi==false||checkhokhau==false||checkdantoc==false||checkngayvao==false||
        checktenph_add==false||checkngaysinhph_add==false||checktenph==false||checkngaysinhph==false||checksdtph==false||checkemailph==false||checknghenghiepph)
        {
            return false;
        }
    } else {
        let checktenph = checkRequire('Họ tên phụ huynh', hotenph),
            checkngaysinhph = checkDate('Ngày sinh của phụ huynh', ngaysinh_ph),
            checksdtph = checkPhone('Số điện thoại phụ huynh', sdt_ph),
            checkemailph = checkEmail('Email phụ huynh', email_ph);
        if (checktenhs ==false||checkngaysinh==false||checkdiachi==false||checkhokhau==false||checkdantoc==false||checkngayvao==false
           ||checktenph==false||checkngaysinhph==false||checksdtph==false||checkemailph==false)
        {
            return false;
        }
    }
    $.ajax({
        type: 'post',
        url: '/qlsyll.create',
        data: {
            tenhs: tenhs,
            tenthuonggoi: tenthuonggoi,
            ngaysinh_hs: ngaysinh_hs,
            diachi: diachi,
            idhs: idhs,
            hokhauthuongtru: hokhauthuongtru,
            hokhautamtru: hokhautamtru,
            dantoc: dantoc,
            gioitinh: gioitinh,
            suckhoehientai: suckhoehientai,
            hotenac: hotenac,
            sdtac: sdtac,
            tongiao: tongiao,
            ngayvaotruong: ngayvaotruong,
            hotenme: hotenph_add,
            ngaysinh_me: ngaysinh_ph_add,
            sdt_me: sdt_ph_add,
            email_me: email_ph_add,
            nghenghiep_me: nghenghiep_ph_add,
            tencongty_me: tencongty_ph_add,
            hotenph: hotenph,
            ngaysinh_ph: ngaysinh_ph,
            sdt_ph: sdt_ph,
            email_ph: email_ph,
            nghenghiep_ph: nghenghiep_ph,
            tencongty_ph: tencongty_ph,
            quanhe: quanhe,
            quanhe_ph: quanhe_ph
        }
    }).then(function (res) {
        if (res == 1) {
            reloadTable();
            text = 'Bạn đã bổ sung thông tin thành công';
            Success(text);
            closemodal();
        } else {
            text = 'Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
            return false;
        }
    })

}
