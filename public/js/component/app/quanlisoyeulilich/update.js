$(document).on('shown.bs.modal', $('#update-modal'), function () {
    $('.js-example-basic-single').select2({
        placeholder: 'Hãy chọn lớp',
        dropdownParent: $('#update-modal'),
        theme: 'classic'
    })
    $.each($(this).find('.need'), function () {
        if ($(this).val() == "") {
            $(this).addClass('errorclass')
        }
    })
})
var idparent=0;
function UpdateSYLL(id) {
    configdatetime($('.datetimepicker-update'), $('#update-modal'))
    configdatetime($('.datetimepicker-update-ph'), $('#update-modal-ph'))
    $('#update-modal').modal('show');
    idparent=id
    loadData(id)
}

/**
 * Load data phụ huynh
 */
function loadData(id) {
    $.ajax({
        type: 'get',
        url: '/qlsyll.getdatahocsinhupdate',
        data: {id: id}
    }).then(function (res) {
        $('#update-modal input').val("")
        $('#lop-update option').remove()
        $('#lop-update').append(res[2])
        $('#lop-update').val(res[0].malophoc).trigger('select2.change')
        $('#idhocsinh').val(res[0].id)
        $('#tenhs-update').val(res[0].hovaten);
        $('#gioitinh-update').val(res[0].gioitinh).trigger('change')
        $('#tenthuonggoi-update').val(res[0].tenthuonggoi)
        $('#ngaysinh-update').val(res[0].ngaysinh)
        $('#ngayvaotruong-update').val(res[0].ngayvaotruong);
        $('#diachi-update').val(res[0].diachi);
        $('#hokhau-update').val(res[0].hokhauthuongtru);
        $('#hokhautamtru-update').val(res[0].hokhautamtru);
        $('#dantoc-update').val(res[0].dantoc);
        $('#tongiao-update').val(res[0].tongiao);
        $('#suckhoehientai-update').val(res[0].tinhtrangsuckhoe);
        TBphuhuynh(res[1].original.data)
    })
}

function TBphuhuynh(data) {
    $('#phuhuynhTB').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data: data,
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'sdt', className: 'text-center'},
            {data: 'email', name: 'email', className: 'text-center'},
            // {data: 'hokhau', name: 'hokhau', className: 'text-center'},
            {data: 'quanhe', name: 'quanhe', className: 'text-center'},
            {data: 'tendonvi', name: 'tendonvi', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}

function update() {
    let tenhs = $('#tenhs-update').val(),
        id = $('#idhocsinh').val(),
        tenthuonggoi = $('#tenthuonggoi-update').val(),
        ngaysinh_hs = $('#ngaysinh-update').val(),
        diachi = $('#diachi-update').val(),
        hokhauthuongtru = $('#hokhau-update').val(),
        hokhautamtru = $('#hokhautamtru-update').val(),
        dantoc = $('#dantoc-update').val(),
        tongiao = $('#tongiao-update').val(),
        suckhoehientai = $('#suckhoehientai-update').val(),
        gioitinh = $('#gioitinh-update').val(),
        ngayvaotruong = $('#ngayvaotruong-update').val(),
        lophoc = $('#lop-update').val();
    let checktenhs = checkRequire('Tên học sinh', tenhs),
        checkngaysinh = checkDate('Ngày sinh của bé', ngaysinh_hs),
        checkdiachi = checkRequire('Chỗ ở hiện tại', diachi),
        checkhokhau = checkRequire('Hộ khẩu thường trú', hokhauthuongtru),
        checkdantoc = checkRequire('Dân tộc', dantoc),
        checkngayvao = checkDate('Ngày vào trường', ngayvaotruong);
    if (checktenhs == false || checkngaysinh == false || checkdiachi == false || checkhokhau == false
        || checkdantoc == false || checkngayvao == false) {
        return false;
    }
    $.ajax({
        type: 'post',
        url: '/qlsyll.update',
        data: {
            id: id, tenhs: tenhs, tenthuonggoi: tenthuonggoi, ngaysinh_hs: ngaysinh_hs,
            diachi: diachi, hokhauthuongtru: hokhauthuongtru, hokhautamtru: hokhautamtru, dantoc: dantoc,
            tongiao: tongiao, suckhoehientai: suckhoehientai, gioitinh: gioitinh, lophoc: lophoc
        }
    }).then(function (res) {
        console.log(res);
        if (res == 1) {
            text = 'Chỉnh sửa thông tin học sinh thành công';
            Success(text);
            closeModalUpdate()
            reloadTable();
        } else {
            text = 'Có lỗi trong quá trình thực hiện';
            ErrorNotify(text);
        }
    })

}

function getdataphid(id,r) {
    $('#update-modal-ph').modal('show')
    $.ajax({
        type: "get",
        url: "/qlsyll.getdataphbyid",
        data: {id: id}
    }).then(function (res) {
        $('#save').val(id)
        $('#hotenph-update').val(res.hovaten)
        $('#ngaysinh_ph-update-ph').val(res.ngaysinh)
        $('#sdt_ph-update').val(res.sdt)
        $('#email_ph-update').val(res.email)
        $('#nghenghiep_ph-update').val(res.nghenghiep)
        $('#tencongty_ph').val(res.tendonvi)
        $('#quanhe_ph-update').val(res.quanhe).trigger('change')
    })
}

$("#update-modal-ph").on('hidden.bs.modal', function (e) {
    $(this).find('input').val()
    $.each($(this).find('.need'), function () {
        $(this).removeClass('errorclass')
    })
    $(document).find('body').addClass('modal-open');
});
$("#update-modal-ph").on('shown.bs.modal', function (e) {
    $.each($(this).find('.need'), function () {
        if ($(this).val() == "") {
            $(this).addClass('errorclass')
        }
    })
});

function closeModalph() {
    $("#update-modal-ph").modal("hide");
}

function saveph() {
    id=$('#save').val();
    let hotenph = $('#hotenph-update').val(),
        ngaysinh_ph = $('#ngaysinh_ph-update-ph').val(),
        sdt_ph = $('#sdt_ph-update').val(),
        email_ph = $('#email_ph-update').val(),
        nghenghiep_ph = $('#nghenghiep_ph-update').val(),
        tencongty_ph = $('#tencongty_ph-update').val(),
        quanhe=$('#quanhe_ph-update').val(),
        checktenph = checkRequire('Họ tên phụ huynh', hotenph),
        checkngaysinhph = checkDate('Ngày sinh của phụ huynh', ngaysinh_ph),
        checksdtph = checkPhone('Số điện thoại phụ huynh', sdt_ph),
        checkemailph = checkEmail('Email phụ huynh', email_ph);
    if (checktenph == false || checkngaysinhph == false || checksdtph == false || checkemailph == false) {
        return false;
    }
    $.ajax({
        type:'post',
        url:'/qlsyll.updateph',
        data:{
            id:id,
            hotenph: hotenph,
            ngaysinh_ph: ngaysinh_ph,
            sdt_ph: sdt_ph,
            email_ph: email_ph,
            nghenghiep_ph: nghenghiep_ph,
            tencongty_ph: tencongty_ph,
            quanhe: quanhe,
        }
    }).then(function (res) {
        if (res == 1) {
            loadData(idparent);
            text = 'Bạn đã bổ sung thông tin thành công';
            Success(text);
            closeModalph();
        } else {
            text = 'Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
            return false;
        }
    })
}
$('#update-modal .need').on('input', function () {
    if ($(this).val() != "") {
        $(this).removeClass('errorclass')
        return
    }
    $(this).addClass('errorclass')
})
