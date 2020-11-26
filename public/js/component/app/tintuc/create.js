function OpenModalTintuc() {
    $('#create-modal').modal('show')
}
function CloseModalTintuc() {
    $('#create-modal').modal('hide')
}
$(function () {
    configCkeditor($('textarea.editor1'))
})
function create() {
    let title=$('#title').val(),
        avatar=$('#avatar')[0].files,
        description=$('#description').val(),
        content=$('#content').val(),
        checktitle=checkRequire('Tiêu đề',title),
        checkdescription=checkRequire('Mô tả',description),
        checkcontent=checkRequire('Nội dung',content);

    if(checktitle==false||checkdescription==false||checkcontent==false){
        return false;
    }
    var fd = new FormData();
    fd.append('file',avatar[0]);
    fd.append('title',title);
    fd.append('description',description);
    fd.append('content',content);
    console.log(fd);
    $.ajax({
        type:'post',
        url:'/quanlitintuc.insert',
        data:fd,
        contentType: false,
        processData: false,
        // data:{title:title,avatar:fd,description:description,content:content}
    }).then(function (res) {
        if(res==1){
            text='Tạo bài viết thành công'
            Success(text)
            $('#create-modal input').val('')
            CloseModalTintuc()
            reloadtable()
        }else {
            text='Có lỗi trong quá trình thực hiện'
            ErrorNotify(text)
        }
    })
}
