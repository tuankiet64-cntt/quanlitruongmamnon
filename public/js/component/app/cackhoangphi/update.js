let idfee='',change=0;
function openModalUpdate(id, r) {
    idfee=id;
    $('#update-modal').find('input').not($('#month-fee-update')).val('')
    $('#update-modal').modal('show')
    ten=r.parents('tr').find('td:eq(1)').text()
    thang=r.parents('tr').find('td:eq(2)').text()
    sotien=r.parents('tr').find('td:eq(3)').text()
    type=r.parents('tr').find('td:eq(4)').find('label').data('value')
    note=r.parents('tr').find('td:eq(5)').text()
    $('#name-fee-update').val(ten)
    $('#month-fee-update').val(thang)
    $('#total-fee-update').val(sotien)
    $('#type-fee-update').val(type).trigger('change')
    $('#note-fee-update').val(note)
}
$('#update-modal input').on('input',function () {
    change=1
})
function closeModalUpdate() {
    $('#update-modal').modal('hide')
}

$('#total-fee-update').on('input', function () {
    val = $(this).val()
    $(this).val(formatNumberCurrency(val))
})

function Updatefee() {
    if(change==0){
        text='Bạn chưa thay đổi dữ liệu';
        ErrorNotify(text)
        return false
    }
    let tenphi = $('#name-fee-update').val(),
        thangapdung = d.getDate() + '-' + $('#month-fee-update').val(),
        sotien = $('#total-fee-update').val(),
        loaiphi = $('#type-fee-update').val(),
        note = $('#note-fee-update').val(),
        checktenphi = checkRequire('Tên phí', tenphi),
        checkthang = checkRequire('Tháng áp dụng', thangapdung),
        checksotien = checkRequire('Số tiền', sotien),
        checkloaiphi = checkRequire('Loại phí', loaiphi);
    if (checkloaiphi == false || checktenphi == false || checksotien == false || checkthang == false) {
        return false;
    }
    $.ajax({
        type: 'post',
        url: '/cackhoangphi.update',
        data: {
            id:idfee,
            tenphi: tenphi,
            thangapdung: thangapdung,
            sotien: removeformatNumber(sotien),
            loaiphi: loaiphi,
            note: note
        }
    }).then(function (res) {
        if (res == 1) {
            text = 'Bạn đã tạo khoản phí thành công';
            change=0;
            Success(text);
            reloadtable();
            closeModalUpdate()
        } else {
            text = 'Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }
    })
}

