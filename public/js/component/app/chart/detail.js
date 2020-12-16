function OpenModalDetail(month,r) {
    $('#detail-modal').modal('show')
    $.ajax({
        type:'get',
        url:'/chart.getdatadetail',
        data:{month:month}
    }).then(function (res) {
        loadtablechi(res[0])
        loadtableluonggv(res[1])
        loadtablehp(res[2])
        console.log(res)
    })
}
function CloseModalDetail() {
    $('#detail-modal').modal('hide')
}
function loadtablechi(data) {
    table = $('#chitb').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data:data.original.data,
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenkhoangchi', className: 'text-center'},
            {data: 'sotien' , className: 'text-center'},
            {data: 'ngay' , className: 'text-center'},
            // {data: 'loinhuan', className: 'text-center'},
            // {data: 'trangthai', name: 'tenlop', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            // {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function loadtableluonggv(data) {
    table = $('#luonggv').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data:data.original.data,
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tengv', className: 'text-center'},
            {data: 'ngaylamviec' , className: 'text-center'},
            {data: 'tongtien' , className: 'text-center'},
            {data: 'ngay', className: 'text-center'},
            // {data: 'trangthai', name: 'tenlop', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            // {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function loadtablehp(data) {
    table = $('#tbhp').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data:data.original.data,
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'gioitinh' , className: 'text-center'},
            {data: 'tenlop' , className: 'text-center'},
            {data: 'tongtien', className: 'text-center'},
            {data: 'ngay', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            // {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
