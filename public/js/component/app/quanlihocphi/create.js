let idhs = '';

function Modalhocphi(id, r) {
    tienngay = 0;
    tienthang = 0;
    idhs = id;
    loadtablephi()
    $('#create-modal').modal('show');
    let ten = r.parents('tr').find('td:eq(1)').text(),
        lop = r.parents('tr').find('td:eq(4)').text();
    $.ajax({
        type: 'get',
        url: '/quanlihocphi.getdatahocsinhbyid',
        data: {id: id}
    }).then(function (res) {
        $('#total-fee').text('')
        $('#name').text("");
        $('#class').text("");
        $('#datestart').text("")
        $('#dateend').text("")
        $('#dateon').text("")
        $('#dateoff').text("")
        loadtable([])
        if (res != 3) {
            $('.buttonload').removeClass('btn-danger')
            $('.buttonload').prop('disabled', false)
            $('#name').text(ten);
            $('#class').text(lop);
            $('#datestart').text(res[0])
            $('#dateend').text(res[1])
            $('#dateon').text(res[2])
            $('#dateoff').text(res[3])
            loadtable(res[4].original.data)
        } else {
            text = 'Học sinh này hiện chưa điểm danh '
            ErrorNotify(text);
            $('.buttonload').prop('disabled', true)
            $('.buttonload').addClass('btn-danger')
        }
    })
}
function closemodal() {
    $('#create-modal').modal('hide')
}

function loadtable(data) {
    table = $('#tableph').DataTable({
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
            // {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'sdt', name: 'sdt', className: 'text-center'},
            {data: 'quanhe', name: 'quanhe', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'email', name: 'email', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],

    });
}

let tabledt = '';

function loadtablephi() {
    tabledt = $('#tablephi').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/quanlihocphi.getdatakhoanphi'
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'checkbox', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenkhoangphi', className: 'text-center'},
            {data: 'thangapdung', className: 'text-center'},
            // {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'sotien', name: 'sdt', className: 'text-center'},
            {data: 'loaiphi', name: 'quanhe', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'ghichu', name: 'email', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
let tienngay = 0,
    tienthang = 0;
$(document).on('click', '#checkfee', function () {
    tien = $(this).parents('tr').find('td:eq(3)').text()
    type = $(this).parents('tr').find('td:eq(4)').find('label').data('value')
    total = $('#total-fee').text()
    if ($(this).is(':checked')) {
        if (type == 1) {
            tienngay = tienngay + (feeday(removeformatNumber(tien)))
        } else {
            tienthang = tienthang + (feemonth(removeformatNumber(tien)))
        }
        tongtien()
    } else {
        if (total != 0 || total != null) {
            if (type == 1) {
                tienngay = tienngay - (feeday(removeformatNumber(tien)))
            } else {
                tienthang = tienthang - (feemonth(removeformatNumber(tien)))
            }
            tongtien()
        }
    }
})
$(document).on('click', '#checkall', function () {
    if ($(this).is(':checked')) {
        getdatapcongallhp()
    } else {
        getdataptruallhp()
    }
})

function tongtien() {
    let total = parseFloat(tienngay + tienthang)
    $('#total-fee').text(formatNumber(total))
}

function feeday(number) {
    if ($('#dateon').text != null || $('#dateon').text != 0) {
        tong = number * $('#dateon').text()
        return tong;
    } else {
        text = 'Học sinh chưa học ngày nào'
        ErrorNotify(text)
        return false;
    }
}

function feemonth(number) {
    if ($('#dateon').text != null || $('#dateon').text != 0) {
        tong = number * 1
        return tong;
    } else {
        text = 'Học sinh chưa học ngày nào'
        ErrorNotify(text)
        return false;
    }
}

function getdatapcongallhp() {
    tienngay = 0
    tienthang = 0;
    tabledt.rows().every(function (index, element) {
        var row = $(this.node());
        $('#total-fee').text('')
        row.find('td:eq(0)').find('input').prop('checked', true)
        // console.log(row.find('td:eq(0)').find('input').is(':checked'))
        if (row.find('td:eq(0)').find('input').is(':checked')) {
            tien = row.find('td:eq(3)').text()
            type = row.find('td:eq(4)').find('label').data('value')
            if (type == 1) {
                tienngay = tienngay + (feeday(removeformatNumber(tien)))
            } else {
                tienthang = tienthang + (feemonth(removeformatNumber(tien)))
            }
            tongtien()
        }
    })
}

function getdataptruallhp() {
    tabledt.rows().every(function (index, element) {
        var row = $(this.node());
        total = $('#total-fee').text()
        $('#total-fee').text('')
        // console.log(row.find('td:eq(0)').find('input').is(':checked'))
        if (row.find('td:eq(0)').find('input').is(':checked')) {
            tien = row.find('td:eq(3)').text()
            type = row.find('td:eq(4)').find('label').data('value')
            if (total != 0 || total != null) {
                if (type == 1) {
                    tienngay = tienngay - (feeday(removeformatNumber(tien)))
                } else {
                    tienthang = tienthang - (feemonth(removeformatNumber(tien)))
                }
                row.find('td:eq(0)').find('input').prop('checked', false)
                tongtien()
            }
            tongtien()
        }
    })
}

function createhp() {
    let idcanbo = $('#idcanbo').val(),
        cackhoanphi = [],
        tongtien = removeformatNumber($('#total-fee').text());
    // checkphi=checkRequire(cackhoanphi),
    // checktongtien=checkRequire(tongtien);
    if (tongtien == '' || tongtien == 0) {
        ErrorNotify('Chưa chọn phí để đóng')
        return false;
    } else if (cackhoanphi == []) {
        ErrorNotify('Chưa chọn phí để đóng')
        return false;
    }
    tabledt.rows().every(function (index, element) {
        var row = $(this.node());
        // console.log(row.find('td:eq(0)').find('input').is(':checked'))
        if (row.find('td:eq(0)').find('input').is(':checked')) {
            cackhoanphi[index] = row.find('td:eq(0)').find('input').data('id')
        }
    })
    $.ajax({
        type: 'post',
        url: '/quanlihocphi.insert',
        data: {idcanbo: idcanbo,
            id: idhs,
            cackhoanphi: cackhoanphi,
            tongtien:tongtien
        }
    }).then(function (res) {
        if (res == 1) {
            text = 'Đã đóng học phí thành công';
            Success(text)
            reloadtable()
            closemodal()
        } else {
            text = 'Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }
    })
}
