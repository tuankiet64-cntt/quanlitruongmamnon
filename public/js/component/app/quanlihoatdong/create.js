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
        $('#type-active option').remove();
        $('#type-active').append(res);
    })
}
function create() {
    let ten=$('#name-active').val(),
        type=$('#type-active').val(),
        note=$('#note-active').val(),
        nametype = $('#type-active option:selected').text(),
        checkten=checkRequire('Tên',ten),
        ngayday=[];
    if(checkten==false){
        return false;
    }
    $.each($('input[type=checkbox]:checked'),function (index,value) {
        ngayday[index]=$(this).val()
    })
    if(ngayday==null||ngayday==''){
        text='Vui lòng chọn ngày dạy';
        ErrorNotify(text);
        return false
    }
    $.ajax({
        type:'post',
        url:'/quanlihoatdong.insert',
        data:{nametype:nametype,ten:ten,type:type,ngayday:ngayday,note:note}
    }).then(function (res) {
        if(res==1){
            text='Đã tạo hoạt động thành công';
            Success(text)
            CloseModalCreate()
            reloadtable()
        }
        else if(res==0){
            text='Đã có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }else{
            ErrorNotify(res)
        }
    })
}
