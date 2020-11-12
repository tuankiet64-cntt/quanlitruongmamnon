$(function () {
    getdata()
})
let table='';
function getdata() {
        table = $('#reporttb').DataTable({
            destroy: true,
            responsive: true,
            processing: true,
            language: {
                processing: 'Đang tải ....'
            },
            ajax: {
                type:'get',
                url:'/baocaohoatdongHT.getdata',
            },
            serverSide: false,
            ordering: true,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
                {data: 'tenhoatdong', className: 'text-center'},
                {data: 'hovaten', className: 'text-center'},
                {data: 'created', name: 'gioitinh', className: 'text-center'},
                {data: 'status', name: 'tenlop', className: 'text-center'},
                // {data: 'ghichu', name: 'ghichu', className: 'text-center'},
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
