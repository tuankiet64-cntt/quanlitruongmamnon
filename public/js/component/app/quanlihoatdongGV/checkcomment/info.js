$(function () {
    $('.editor1').ckeditor({
        entities_latin: false,
        entities_greek: false,
        extraPlugins: 'easyimage',
        language: 'vi',
        cloudServices_tokenUrl: 'b148fd2bae20f665f3b2e5303b30d567/cs-token-endpoint',
        cloudServices_uploadUrl: 'https://api.imgbb.com/1/upload'
    })
})
function openModalInfo(id) {
    $('#info-modal').modal('show')
    $.ajax({
        type:'get',
        url:'/baocaohoatdongHT.getdatabyid',
        data:{id:id}
    }).then(function (res) {
        $('input[type=radio][value='+res.status+']').prop('checked',true);
        $('input[type=radio]').prop('disabled',true);
        $('#editorgv').val(res.noidung)
        $('#editorbgh').val(res.nhanxet)
        $('#editorgv').prop('disabled',true)
        $('#editorbgh').prop('disabled',true)
    })
}
function closeModalInfo() {
    $('#info-modal').modal('hide')
}
