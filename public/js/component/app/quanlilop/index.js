let table='';
$(function () {
    loadtable()
})
function loadtable() {
    table = $('#quanlilop').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/quanlilop.getdata',
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenlop', className: 'text-center'},
            {data: 'loptuoi', className: 'text-center'},
            {data: 'soluong', name: 'gioitinh', className: 'text-center'},
            // {data: 'hokhau', name: 'hokhau', className: 'text-center'},
            // {data: 'suckhoehientai', name: 'suckhoehientai', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function openModalCreate() {
    $('#create-modal').modal('show')
}
function closeModalCreate() {
    $('#create-modal').modal('hide')
}

function reloadtable() {
    table.ajax.reload(null,false)
}
