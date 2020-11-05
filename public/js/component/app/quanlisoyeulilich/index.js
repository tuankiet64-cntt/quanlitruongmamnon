table='';
table_1='';
$(function () {
    loadtablehs()
    loadtable()
    //datetime
    // $('#datetimepicker').datetimepicker();
    //end

})
function loadtable() {
    table = $('#quanlinhaphocTB').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/qlsyll.successtudent',
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenhs', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'hokhau', name: 'hokhau', className: 'text-center'},
            {data: 'suckhoehientai', name: 'suckhoehientai', className: 'text-center'},
            {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}

function createSYLL(id) {
    $('#create-modal').modal('show')
    $.ajax({
        type: 'get',
        url: '/qlsyll.getdata',
        data: {id: id}
    }).then(function (res) {
        $('#create-modal input').val('');
        $('#idnknhaphoc').val(id);
        $('#tenhs').val(res.tenhs);
        $('#suckhoehientai').val(res.suckhoehientai);
        $('#ngaysinh').val(res.ngaysinh)
        $('#diachi').val(res.diachi)
        $('#hokhau').val(res.hokhau)
        $('#hotenbo').val(res.hotenbo)
        $('#sdtbo').val(res.sdtbo)
        $('#emailbo').val(res.emailbo)
        $('#hotenme').val(res.hotenme)
        $('#sdtme').val(res.sdtme)
        $('#emailme').val(res.emailme)
        $('#hotenph').val(res.hovatenph)
        $('#sdt_ph').val(res.sdtph)
        $('#email_ph').val(res.emailph)
        $('#gioitinh').val(res.gioitinh).trigger('change')
        if(res.hovatenph!=""){
            $('#phuhuynh').val(1)
            $('.chame').addClass('d-none')
            $('.ph').removeClass('d-none')

        }else {
            $('#phuhuynh').val(0)
            $('.ph').addClass('d-none')
            $('.chame').removeClass('d-none')
        }
    })
}

function closemodal() {
    $('#create-modal').modal('hide')
}
function reloadTable() {
    table_1.ajax.reload( null, false );
    table.ajax.reload( null, false );
}
function loadtablehs() {
    table_1 = $('#quanlithongtinhs').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/qlsyll.getdatahocsinh',
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'lop', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            // {data: 'hokhau', name: 'hokhau', className: 'text-center'},
            {data: 'tinhtrangsuckhoe', name: 'tinhtrangsuckhoe', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}

function closeModalUpdate() {
    $('#update-modal').modal('hide');
}
