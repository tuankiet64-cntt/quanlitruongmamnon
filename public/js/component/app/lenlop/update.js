let realtotal = '',
    oldClass = '';

function openModalUpdate(id,idclassold, r) {
    oldClass = idclassold;
    $('#update-modal').modal('show')
    loadtable(id)
    realtotal = r.parents('tr').find('td:eq(2)').text()
}

function closeModalUpdate(id, r) {
    $('#update-modal').modal('hide')
}

function loadtable(id) {
    $('#nextclass').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/lenlop.getdataclass',
            data: {id: id}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'loptuoi', className: 'text-center'},
            {data: 'dotuoi', className: 'text-center'},
            // {data: 'sotien', name: 'gioitinh', className: 'text-center'},
            // {data: 'loaiphi', name: 'tenlop', className: 'text-center'},
            // {data: 'ghichu', name: 'ghichu', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center p-0'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}

function update() {
    let soluongcualop = $('input[type=radio]:checked').data('soluong'),
        id = $('input[type=radio]:checked').data('id'),
        checktontai = '';
        let title='Cảnh báo',
            text = 'Lịch dạy của lớp sẽ xóa giáo viên.Hãy thêm giáo viên vào lịch dạy sau khi thực hiện thao tác';
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary btn-sweet-alert',
                cancelButton: 'btn btn-default btn-sweet-alert'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: title,
            text:text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy',
            reverseButtons: true,
            focusConfirm: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'post',
                    url: '/lenlop.update',
                    data: {id: id, oldClass: oldClass}
                }).then(function (res) {
                    if (res = 1) {

                        text = 'Đã lên lớp thành công';
                        Success(text)
                        closeModalUpdate()
                        reloadtable()
                    } else {
                        text = 'Có lỗi trong quá trình thực hiền';
                        ErrorNotify(text)
                    }
                })
            } else {
                return false;
            }
        })



}
