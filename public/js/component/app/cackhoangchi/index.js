$(function () {
    $('#calendar-month,#month-fee,#month-fee-update').datetimepicker({
        // viewMode: 'years',
        format: 'MM-YYYY',
        locale: 'vi',
        // minDate:'10-1-2020',
        icons: {
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        }
    })
    loadtable()
})
var table='';
function loadtable() {
    date=$('#calendar-month').val()
    table = $('#chitable').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/cackhoangchi.getdata',
            data:{date:date}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenkhoangchi', className: 'text-center'},
            {data: 'sotien', name: 'gioitinh', className: 'text-center'},
            {data: 'ghichu', name: 'ghichu', className: 'text-center'},
            {data: 'ngaytao', className: 'text-center'},
            {data: 'trangthai', name: 'tenlop', className: 'text-center'},
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
