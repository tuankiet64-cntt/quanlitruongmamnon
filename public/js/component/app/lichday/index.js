let table1='';
$(function () {
    getdata()
})
function getdata() {
    table = $('#tableclass').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/lichday.getdata',
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenlop', className: 'text-center'},
            {data: 'danhmuc.loptuoi', className: 'text-center'},
            {data: 'lichday', name: 'gioitinh', className: 'text-center'},
            // {data: '', name: 'tenlop', className: 'text-center'},
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
function getdatabyid(id) {
    table1 = $('#tablelichday').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/lichday.getdatabyid',
            data:{id:id}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'lichday', className: 'text-center'},
            // {data: 'lichday', name: 'gioitinh', className: 'text-center'},
            // {data: '', name: 'tenlop', className: 'text-center'},
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
function reloadTable() {
    table1.ajax.reload(null,false)
}
