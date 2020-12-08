$(function () {
    loadluongnv()
    loadrecordtb()
})
let table='';
function loadluongnv() {
    table=$('#luongtb').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/quanliluong.getdata',
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaylamviec', className: 'text-center'},
            {data: 'sotienhangngay', name: 'gioitinh', className: 'text-center'},
            {data: 'tongtien', name: 'tenlop', className: 'text-center'},
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
function loadrecordtb(month) {
    table=$('#luongrecordtb').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/quanliluong.getdata2',
            data:{month:month}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaylamviec', className: 'text-center'},
            {data: 'sotienhangngay', name: 'gioitinh', className: 'text-center'},
            {data: 'tongtien', name: 'tenlop', className: 'text-center'},
            {data: 'trangthai', name: 'ghichu', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function reload() {
table.ajax.reload(null,false)
}
$('#calendar-month').on('dp.change',function () {
    loadrecordtb($(this).val())
})
