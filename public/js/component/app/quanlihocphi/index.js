$(function () {
    $('#lop').select2({
        theme: 'classic'
    })
    loadlophoc()
})
let table1='',
    table2='';
function loadhocsinh(id) {
    table1 = $('#hocsinhtb').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/quanlihocphi.getdatahocsinh',
            data: {id: id}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'tenlop', name: 'tenlop', className: 'text-center'},
            // {data: 'suckhoehientai', name: 'suckhoehientai', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}

function loadhocsinhdatadongtien(id) {
    table2 = $('#hocsinhdtdone').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/quanlihocphi.getdatahocsinhdadongtien',
            data: {id: id}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'tenlop', name: 'tenlop', className: 'text-center'},
            // {data: 'suckhoehientai', name: 'suckhoehientai', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}

function loadlophoc() {
    $.ajax({
        type: 'get',
        url: '/quanlihocphi.getdatalophoc'
    }).then(function (res) {
        $('#lop option').remove()
        $('#lop').append('<option value="">Hãy chọn lớp</option>' + res)
    })
}

$('#lop').on('select2:select', function () {
    if ($(this).val() != null) {
        loadhocsinh($(this).val())
        loadhocsinhdatadongtien($(this).val())
    }
})
function reloadtable() {
    table1.ajax.reload(null,false)
    table2.ajax.reload(null,false)
}
