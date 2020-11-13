function modaldone(id,r,idhs,tongtien) {
    $('#done-modal').modal('show');
    let ten = r.parents('tr').find('td:eq(1)').text(),
        lop = r.parents('tr').find('td:eq(4)').text();
    $.ajax({
        type: 'get',
        url: '/quanlihocphi.getdatahocsinhbyid',
        data: {id: idhs,idhp:id}
    }).then(function (res) {
        $('#total-fee-done').text('')
        $('#name-done').text("");
        $('#class-done').text("");
        $('#datestart-done').text("")
        $('#dateend-done').text("")
        $('#dateon-done').text("")
        $('#dateoff-done').text("")
        loadtable([])
        if (res != 3) {
            $('#total-fee-done').text(formatNumber(tongtien))
            $('#name-done').text(ten);
            $('#class-done').text(lop);
            $('#datestart-done').text(res[0])
            $('#dateend-done').text(res[1])
            $('#dateon-done').text(res[2])
            $('#dateoff-done').text(res[3])
            loadtableph2(res[4].original.data)
            loadtablephidone2(res[5]['idphi'])
        } else {
            text = 'Học sinh này hiện chưa điểm danh '
            ErrorNotify(text);
        }
    })
}
function closemodaldone() {
    $('#done-modal').modal('hide')
}
function loadtablephidone2(data) {
    tabledt1 = $('#tablephi-done').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/quanlihocphi.getdatakhoanphi'
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'checkbox', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenkhoangphi', className: 'text-center'},
            {data: 'thangapdung', className: 'text-center'},
            // {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'sotien', name: 'sdt', className: 'text-center'},
            {data: 'loaiphi', name: 'quanhe', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'ghichu', name: 'email', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
        initComplete:function () {
            tabledt1.rows().every(function (index, element) {
                var row = $(this.node());
                $('#total-fee').text('')
                // console.log(row.find('td:eq(0)').find('input').is(':checked'))
                row.find('td:eq(0)').find('input').prop('disabled',true)
                $.each(JSON.parse(data),function (i,v) {
                    if (row.find('td:eq(0)').find('input').data('id')==v) {
                        row.find('td:eq(0)').find('input').prop('checked', true).prop('disabled',true)
                    }
                })

            })
        }
    });
}
function loadtableph2(data) {
    table = $('#tableph-done').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data: data,
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            // {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'sdt', name: 'sdt', className: 'text-center'},
            {data: 'quanhe', name: 'quanhe', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'email', name: 'email', className: 'text-center'},
        ],
        scrollX:'100%',
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function bill() {
    $('input[type=checkbox]').parents('tr').find('td:eq(0)').addClass('d-none')
    $('input[type=checkbox]').parents('thead').find('th:eq(0)').addClass('d-none')
    $('#tablephi-done_wrapper').find('.row').eq(0).addClass('d-none')
    $('#tablephi-done_wrapper').find('.row:last').addClass('d-none')
    $('#hide').addClass('d-none')
    $('#done-modal .container').printThis({
        afterPrint:function () {
            $('#hide').removeClass('d-none')
            $('input[type=checkbox]').parents('tr').find('td:eq(0)').removeClass('d-none')
            $('input[type=checkbox]').parents('thead').find('th:eq(0)').removeClass('d-none')
            $('#tablephi-done_wrapper').find('.row').eq(0).removeClass('d-none')
            $('#tablephi-done_wrapper').find('.row:last').removeClass('d-none')

        }
    })
}
