$(document).on('shown.bs.modal', $('#create-modal'), function () {
    $('#type-class').select2({
        dropdownParent: $('#create-modal'),
        theme: 'classic'
    })
    loadlophoc()
})

function loadlophoc() {
    $.ajax({
        type: 'get',
        url: '/quanlilop.gettypelop',
    }).then(function (res) {
        $('#type-class option').remove()
        $('#type-class').append(res)
    })
}

function createlophoc() {
    let tenlop = $('#name-class').val(),
        loptuoi = $('#type-class').val(),
        soluong = $('#total-class').val(),
        checktenlop = checkRequire('Tên lớp', tenlop),
        checksoluong=checkRequire('Số lượng',soluong);
    if(checktenlop==false||checksoluong==false){
        return false
    }
    $.ajax({
        type:'post',
        url:'/quanlilop.insert',
        data:{tenlop:tenlop,loptuoi:loptuoi,soluong:soluong}
    }).then(function (res) {
        if(res==1){
            text='Thêm lớp mới thành công';
            Success(text);
            closeModalCreate()
            reloadtable()
            $('#create-modal input').val('')
        }else{
            ErrorNotify(res);
        }
    })

}
