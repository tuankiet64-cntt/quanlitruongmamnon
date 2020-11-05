let position = '',
    lophoctruoc='';
$(function () {
    $('#chonlop').select2({
        dropdownParent: $('#update-modal'),
        theme: 'classic'
    })
    getlop()
})

function getlop() {
    $.ajax({
        type: 'get',
        url: '/quanlixeplop.getlophoc',
    }).then(function (res) {
        $('#chonlop option').not('option:eq(0)').remove()
        $('#chonlop').append(res)
    })
}

function Createlich(id, r) {
    $('#primary').addClass('d-none')
    $('#chonlop').val('').trigger('change');
    $('#update-modal').modal('show')
    $('input[type=checkbox]').parents('label').find('span').removeClass('text-primary')
    position = r;
    $.ajax({
        type: 'get',
        url: '/quanlixeplop-giaovien.getlichday',
        data: {id: id}
    }).then(function (res) {
        console.log($('#idgv').val())
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
        lophoctruoc=res.idlophoc;
        $('#chonlop').val(res.idlophoc).trigger('change.select2')
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
        url: '/quanlixeplop-giaovien.createlichday',
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
$('input[type=checkbox]').on('change', function () {
    let idlophoc = $('#chonlop').val(),
        idgv = $('#idgv').val(),
        day = $(this).val(),
        idlichhoc = $('#idlichhoc').val();
    if (idlophoc == "" || idlophoc == null) {
        text = 'Vui lòng chọn lớp học';
        $(this).prop('checked', false)
        ErrorNotify(text)
        return false
    }
    if (idgv == "" || idgv == null) {
        text = 'Vui lòng chọn giáo viên';
        $(this).prop('checked', false)
        ErrorNotify(text)
        return false
    }

    if ($(this).is(':checked')) {
        $.ajax({
            type: 'post',
            url: '/quanlixeplop-giaovien.checklichday',
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
                // Createlich(idgv,position)
                // return false;
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
        url: '/quanlixeplop-giaovien.checklday',
        data: {id: id}
    }).then(function (res) {
        $('input[type=checkbox]').prop('checked',false)
        $('#primary').removeClass('d-none')
        $.each(res, function (index, value) {
            $.each(JSON.parse(value['ngayday']), function (i, v) {
                $('input[type=checkbox][value=' + v + ']').parents('label').find('span').addClass('text-primary')
            })
        })
    })
}

$('#chonlop').on('select2:select', function () {
    let idgv = $('#idgv').val(),
        idlophoc=$(this).val(),
        idlichhoc = $('#idlichhoc').val(),
        options=[];
        if(idlichhoc!=null&&idlophoc!=lophoctruoc){
            $.ajax({
                type:'get',
                url:'/quanlixeplop-giaovien.checkdiemdanh',
                data:{idlichhoc:idlichhoc,lophoctruoc:lophoctruoc,idgv:idgv}
            }).then(function (res) {
                    $.map(res[1],
                        function(o) {
                            options[o.idgv] = o.hovaten;
                        });
                if(res[0]==1){
                    title='Bạn chắc chắn chuyển lớp cho giáo viên này';
                    text='Vui lòng chọn giáo viên đám nhiệm lịch học để chuyển lớp';
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: 'btn btn-primary btn-sweet-alert',
                            cancelButton: 'btn btn-default btn-sweet-alert'
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: title,
                        text: text,
                        icon: 'warning',
                        input: 'select',
                        inputOptions:options,
                        showCancelButton: true,
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy',
                        reverseButtons: true,
                        focusConfirm: true,
                        inputPlaceholder: 'Hãy chọn giáo viên'
                    }).then((result) => {
                        if (result.value) {
                            idgvtt=result.value;
                            $.ajax({
                                type:'post',
                                url:'/quanlixeplop-giaovien.chuyenlop',
                                data:{idgvtt:idgvtt,idgv:idgv,idlichhoc:idlichhoc}
                            }).then(function (res) {
                                if(res==1){
                                    text='Bạn đã chuyển lịch dạy thành công'
                                    $('#idlichhoc').val(null)
                                    Success(text)
                                    checkngay()
                                    reloadTable()
                                }else{
                                    text='Có lỗi trong quá trình thực hiện'
                                    ErrorNotify(text)
                                }
                            })
                        }else{
                            $('#chonlop').val(lophoctruoc).trigger('change.select2')
                        }
                    })
                }
            })
        }
    // $.ajax({
    //     type: 'get',
    //     url: '/quanlixeplop-giaovien.checklop',
    //     data: {idgv:idgv,idlophoc:idlophoc}
    // })
})

