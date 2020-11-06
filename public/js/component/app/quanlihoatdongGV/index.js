$(function () {
    loadmonhoc()
    $('#editor').ckeditor({
        uiColor: '#9AB8F3'
    })
})
function loadmonhoc() {
    idtk=$('#idgv').val()
    // console.log(idgv)
    $.ajax({
        type:'get',
        url:'/baocaohoatdongGV.getdata',
        data:{id:idtk}
    }).then(  function (res) {
        $('#content').html(res)
        $( 'textarea.editor1' ).ckeditor({
            extraPlugins: 'easyimage',
            language: 'vi',
            cloudServices_tokenUrl: 'b148fd2bae20f665f3b2e5303b30d567/cs-token-endpoint',
            cloudServices_uploadUrl: 'https://api.imgbb.com/1/upload'
        })
    })

}
