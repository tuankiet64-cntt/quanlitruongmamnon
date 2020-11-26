let idpt='';
function openModalUpdate(id,r) {
    idpt=id;
    $('#update-modal').modal('show')
    $.ajax({
        type:'get',
        url:'/quanlitintuc.getdatabyid',
        data:{id:id}
    }).then(function (res) {
        $('#title-update').val(res['title'])
        $('#content-update').val(res['content'])
        $('#description-update').val(res['description'])
    })
}
function CloseModalUpdate() {
    $('#update-modal').modal('hide')
}
function update() {
    let title=$('#title-update').val(),
        avatar=$('#avatar-update')[0].files,
        description=$('#description-update').val(),
        content=$('#content-update').val(),
        checktitle=checkRequire('Tiêu đề',title),
        checkdescription=checkRequire('Mô tả',description),
        checkcontent=checkRequire('Nội dung',content);
    console.log(title,avatar,description)
    if(checktitle==false||checkdescription==false||checkcontent==false){
        return false;
    }
    var fd = new FormData();
    fd.append('file',avatar[0]);
    fd.append('title',title);
    fd.append('description',description);
    fd.append('content',content);
    fd.append('id',idpt);
    $.ajax({
        type:'post',
        url:'/quanlitintuc.update',
        data:fd,
        contentType: false,
        processData: false,
        // data:{title:title,avatar:fd,description:description,content:content}
    }).then(function (res) {
        if(res==1){
            text='Chỉnh sửa bài viết'
            Success(text)
            $('#update-modal input').val('')
            CloseModalUpdate()
            reloadtable()
        }else {
            text='Có lỗi trong quá trình thực hiện'
            ErrorNotify(text)
        }
    })
}
