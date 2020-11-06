let table='';
$(function () {
    loadtableHD()
})
function loadtableHD() {
    table = $('#quanlihoatdong').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/quanlihoatdong.getdata',
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenhoatdong', className: 'text-center'},
            {data: 'loptuoi', name: 'loptuoi', className: 'text-center'},
            {data: 'lichday', name: 'lichday', className: 'text-center'},
            {data: 'ghichu', name: 'ghichu', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function reloadtable() {
    table.ajax.reload(null,false)
}
