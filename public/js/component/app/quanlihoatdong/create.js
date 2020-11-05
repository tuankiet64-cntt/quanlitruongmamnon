function OpenModalCreate() {
    $('#create-modal').modal('show')
    getloptuoi()
}
function CloseModalCreate() {
    $('#create-modal').modal('hide')
}
function getloptuoi() {
    $.ajax({
        type:'get',
        url:'/quanlihoatdong.getdataloptuoi'
    }).then(function (res) {
        $('#type-class option').remove();
        $('#type-class').append(res);
    })
}
