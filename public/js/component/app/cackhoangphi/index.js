let d = new Date(),table='';
$(function () {
    $('#calendar-month,#month-fee,#month-fee-update').datetimepicker({
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
$('#calendar-month').on('dp.change',function () {
    let date = d.getDate() + '-' + $(this).val();
    loadtablekhoangphi(date)
})

function loadtablekhoangphi(date) {
    table = $('#hocsinhtb').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/cackhoangphi.getdatabymonth',
            data:{date:date}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenkhoangphi', className: 'text-center'},
            {data: 'thangapdung', className: 'text-center'},
            {data: 'sotien', name: 'gioitinh', className: 'text-center'},
            {data: 'loaiphi', name: 'tenlop', className: 'text-center'},
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
