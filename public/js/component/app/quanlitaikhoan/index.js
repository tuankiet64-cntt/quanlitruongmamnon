let table_1='';
$(function () {
    getdatagv()
})

function getdatagv() {
    table_1 = $('#gvtable').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/quanlitaikhoan.getdatagv',
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'chucvu', className: 'text-center'},
            {data: 'sdt', name: 'sdt', className: 'text-center'},
            {data: 'email', name: 'email', className: 'text-center'},
            {data: 'ngayvaotruong', name: 'tinhtrangsuckhoe', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function reloadtabel() {
    table_1.ajax.reload(null,false)
}
