function openModalUpdate(id, r) {
    $('#update-modal').modal('show')
    $('#type-class-update').select2({
        dropdownParent: $('#update-modal'),
        theme: 'classic'
    })
    $.ajax({
        type: 'get',
        url: '/quanlilop.getdataupdate',
        data: {id: id}
    }).then(function (res) {
        $('#id-lophoc').val(id)
        $('#name-class-update').val(res.tenlop)
        $('#total-class-update').val(res.soluong)
        loadtypelophoc(res.madanhmuclop)
    })
}

function closeModalUpdate() {
    $('#update-modal').modal('hide')
}

function loadtypelophoc(id) {
    $.ajax({
        type: 'get',
        url: '/quanlilop.gettypelop',
    }).then(function (res) {
        $('#type-class-update option').remove()
        $('#type-class-update').append(res)
        $('#type-class-update').val(id).trigger('change.select2')
    })
}

function updatelophoc() {
    let tenlop = $('#name-class-update').val(),
        loptuoi = $('#type-class-update').val(),
        soluong = $('#total-class-update').val(),
        id = $('#id-lophoc').val(),
    checktenlop = checkRequire('Tên lớp', tenlop),
        checksoluong = checkRequire('Số lượng', soluong);
    if (checktenlop == false || checksoluong == false) {
        return false
    }
    $.ajax({
        type: 'post',
        url: '/quanlilop.update',
        data: {tenlop: tenlop, loptuoi: loptuoi, soluong: soluong, id: id}
    }).then(function (res) {
        if (res == 1) {
            text = 'Thêm lớp mới thành công';
            Success(text);
            closeModalUpdate()
            reloadtable()
            $('#update-modal input').val('')
        } else {
            ErrorNotify(res);
        }
    })
}
