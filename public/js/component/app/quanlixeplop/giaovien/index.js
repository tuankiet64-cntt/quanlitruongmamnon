let table2='';
$(function () {
    tableGV()
})
function tableGV() {
    table2 = $('#tablegv').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/quanlixeplop-giaovien.getdatagv',
        },
        serverSide: false,
        ordering: false,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'lichday', name: 'lichday', className: 'text-center'},
            {data: 'lophoc', name: 'lophoc', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: '65vh',
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function reloadTable() {
    table2.ajax.reload(null,false)
}
