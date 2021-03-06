$(function () {
    getdatachamcong()
    $('#calendar-month').datetimepicker({
        viewMode: 'years',
        format: 'MM-YYYY',
        locale: 'vi',
        // minDate:'10-1-2020',
        icons: {
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        }
    })
})
let table='';
function getdatachamcong() {
    let month=$('#calendar-month').val();
    table=$('#chamcongtb').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/quanlichamcong.getdata',
            data:{month:month}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'songaylam', className: 'text-center'},
            {data: 'songaynghi', name: 'gioitinh', className: 'text-center'},
            // {data: 'loaiphi', name: 'tenlop', className: 'text-center'},
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
$('#calendar-month').on('dp.change',function () {
    getdatachamcong()
})

