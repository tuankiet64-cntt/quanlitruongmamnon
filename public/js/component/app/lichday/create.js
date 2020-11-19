function openmodalCreate() {
    idlophoc=$('#idlophoc').val()
    if(idlophoc!=""){
        $('#create-modal').modal('show')
        checkngaycreate()
    }else
    {
        text='Vùi lòng chọn lớp học ở trên để xem lịch và tạo lịch'
        ErrorNotify(text)
        return false;
    }
}
function closemodalCreate() {
    $('#create-modal').modal('hide')
}
function checkngaycreate() {
    id = $('#idlophoc').val();
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
$('#create-modal input[type=checkbox]').on('click', function () {
    let idlophoc = $('#idlophoc').val(),
        day = $(this).val(),
        idlichhoc = $('#idlichhoc').val();
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
                return false;
            }
        })
    } else {
        change = 1
    }
})
function Createlichday() {
    let data = [], i = 0;
    $('input:checked').each(function (index, value) {
        data[i] = $(this).val()
        i++;
    })
    let idlophoc = $('#idlophoc').val(),
        idgv = "";
    $.ajax({
        type: 'post',
        url: '/lichday.updatelichday',
        data: {data: data, idlophoc: idlophoc, idgv: idgv}
    }).then(function (res) {
        if (res == 1) {
            $('#idgv').val('');
            $('input[type=checkbox]').prop('checked', false)
            $('#tengv').text('')
            text = 'Xếp lịch học thành công';
            reloadTable()
            closemodalCreate()
            Success(text);
        } else {
            text = 'Xếp lịch học không thành công';
            ErrorNotify(text)
        }
    })
}
