let position = '',
    lophoctruoc = '';
function Createlich(id, r) {
    $('#update-modal').modal('show')
    $('input[type=checkbox]').parents('label').find('span').removeClass('text-primary')
    position = r;
    $.ajax({
        type: 'get',
        url: '/lichday.getdatagvbyid',
        data: {id: id}
    }).then(function (res) {
        $('#idgv').val(res.idgv)
        $('#idlichhoc').val(res.id)
        if (res['ngayday'] == null && res != 0) {
            $('input[type=checkbox]').prop('checked', false)
            text = 'Giáo viên chưa có lịch dạy'
            tengv = r.parents('tr').find('td:eq(1)').text()
            $('#tengv').text(tengv)
            ErrorNotify(text)
            checkngay()
            return false
        } else if (res == 0) {
            $('input[type=checkbox]').prop('checked', false)
            text = 'Giáo viên chưa có lịch dạy và lớp dạy'
            tengv = r.parents('tr').find('td:eq(1)').text()
            $('#tengv').text(tengv)
            ErrorNotify(text)
            return false
        }
        $('input[type=checkbox]').prop('checked', false)
        tengv = r.parents('tr').find('td:eq(1)').text()
        $('#tengv').text(tengv)
        lophoctruoc = res.idlophoc;
        $('#chonlop').val(res.idlophoc).trigger('change.select2')
        $.each(res['ngayday'], function (index, value) {
            $('input[type=checkbox][value=' + value + ']').prop('checked', true)
        })
    })
}

function updateAgain(id, r) {
    $('#primary').addClass('d-none')
    $('#chonlop').val('').trigger('change');
    $('input[type=checkbox]').parents('label').find('span').removeClass('text-primary')
    position = r;
    $.ajax({
        type: 'get',
        url: '/lichday.getlichday',
        data: {id: id}
    }).then(function (res) {
        $('#idgv').val(id)
        $('#idlichhoc').val(res.id)
        if (res['ngayday'] == null && res != 0) {
            $('input[type=checkbox]').prop('checked', false)
            text = 'Giáo viên chưa có lịch dạy'
            $('#chonlop').val(res.idlophoc).trigger('change.select2')
            tengv = r.parents('tr').find('td:eq(1)').text()
            $('#tengv').text(tengv)
            ErrorNotify(text)
            checkngay()
            return false
        } else if (res == 0) {
            $('input[type=checkbox]').prop('checked', false)
            text = 'Giáo viên chưa có lịch dạy và lớp dạy'
            tengv = r.parents('tr').find('td:eq(1)').text()
            $('#tengv').text(tengv)
            ErrorNotify(text)
            $('#chonlop').on('select2:select', function () {
                checkngay()
            })
            return false
        }
        tengv = r.parents('tr').find('td:eq(1)').text()
        $('#tengv').text(tengv)
        lophoctruoc = res.idlophoc;
        $('#chonlop').val(res.idlophoc)
        $.each(res['ngayday'], function (index, value) {
            $('input[type=checkbox][value=' + value + ']').prop('checked', true)
        })
    })
}

function updatexeplop() {
    let data = [], i = 0;
    $('input:checked').each(function (index, value) {
        data[i] = $(this).val()
        i++;
    })
    let idlophoc = $('#chonlop').val(),
        idgv = $('#idgv').val(),
        idlichhoc = $('#idlichhoc').val();
    if (idlophoc == "" || idlophoc == null) {
        text = 'Vui lòng chọn lớp học';
        ErrorNotify(text)
        return false
    }
    if (idgv == "" || idgv == null) {
        text = 'Vui lòng chọn giáo viên';
        ErrorNotify(text)
        return false
    }

    $.ajax({
        type: 'post',
        url: '/lichday.updatelichday',
        data: {data: data, idlophoc: idlophoc, idlichhoc: idlichhoc, idgv: idgv}
    }).then(function (res) {
        if (res == 1) {
            $('#idgv').val('');
            $('input[type=checkbox]').prop('checked', false)
            $('#tengv').text('')
            text = 'Xếp lịch học thành công';
            reloadTable()
            closeModalUpdateXL()
            Success(text);
        } else {
            text = 'Xếp lịch học không thành công';
            ErrorNotify(text)
        }
    })
}

let change = 0;
$('input[type=checkbox]').on('click', function () {
    let idlophoc = $('#chonlop').val(),
        idgv = $('#idgv').val(),
        day = $(this).val(),
        idlichhoc = $('#idlichhoc').val();
    if ($(this).is(':checked')) {
        $.ajax({
            type: 'get',
            url: '/lichday.checklichday',
            data: {idlophoc: idlophoc, day: day}
        }).then(function (res) {
            if (res[0] == 1) {
                text = 'Hiện tại đã có giáo viên dạy ngày này';
                ErrorNotify(text)
                $('input[type=checkbox][value=' + day + ']').prop('checked', false)
                if (change == 1) {
                    $('input[type=checkbox][value=' + day + ']').prop('checked', true)
                    change = 0
                }
                return false;
            }
        })
    } else {
        change = 1
    }
})

function closeModalUpdateXL() {
    $('#update-modal').modal('hide');
}

function checkngay() {
    id = $('#chonlop').val();
    $.ajax({
        type: 'get',
        url: '/lichday.checkday',
        data: {id: id}
    }).then(function (res) {
        $('input[type=checkbox]').prop('checked', false)
        $('#primary').removeClass('d-none')
        $.each(res, function (index, value) {
            $.each(JSON.parse(value['ngayday']), function (i, v) {
                $('input[type=checkbox][value=' + v + ']').parents('label').find('span').addClass('text-primary')
            })
        })
    })
}

function Delete() {
    let idlichhoc = $('#idlichhoc').val(),
        text='Xóa lịch dạy này sẽ xóa dữ liệu điểm danh của lịch dạy này ! Bạn chắc chứ !',
        title = 'Bạn chắc chắn xóa lịch dạy này';
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
                type:'post',
                url:'/lichday.delete',
                data:{idlichhoc:idlichhoc}
            }).then(function (res) {
                if(res==1){
                    text = 'Xếp lịch học thành công';
                    reloadTable()
                    closeModalUpdateXL()
                    Success(text);
                }
            })
        } else {
            return false;
        }
    })
}


