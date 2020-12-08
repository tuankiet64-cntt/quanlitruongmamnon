let idgv='';
function create(id) {
    idgv=id;
    $('#create-modal').modal('show')
}
function closeCreate() {
    $('#create-modal').modal('hide')
}
function insert() {
    let ngaylamviec=$('#ngay').val(),
        luong=removeformatNumber($('#luong').val()),
        sotienhangngay=removeformatNumber($('#luonghangngay').val()),
        checkngaylam=checkRequire('Ngày làm việc',ngaylamviec),
        checkluong=checkRequire('Lương ',luong),
        checkluongngay=checkRequire('Số tiền ngày',sotienhangngay);
    if(checkngaylam==false||checkluong==false||checkluongngay==false){
        return false;
    }
    $.ajax({
        type:'post',
        url:'/quanliluong.insert',
        data:{idgv:idgv,ngaylamviec:ngaylamviec,luong:luong,sotienhangngay:sotienhangngay}
    }).then(function (res) {
        if(res==1){
            text='Cập nhật thành công';
            Success(text)
            closeCreate()
            $('#create-modal input').val("")
            reload()
        }else
        {
            text='Cập nhật thất bại';
            ErrorNotify(text)
        }
    })
}
$('#ngay').on('input',function () {
    if($(this).val()>31){
        text='Tối đa là 31 ngày';
        ErrorNotify(text);
        $(this).val(31)
    }else if($(this).val()<=0){
        text='Không được bé hơn 1';
        ErrorNotify(text);
        $(this).val(1)
    }
    sotien=parseFloat(removeformatNumber($('#luong').val()));
    tien=formatNumberCurrency($('#luong').val())
    ngay=$(this).val();
    if(ngay==""){
        text='Hãy nhập ngày';
        ErrorNotify(text)
        $(this).val("")
        return false;
    }
    tienhangngay= Math.floor(sotien/ngay)
    $('#luonghangngay').val(formatNumber(tienhangngay))
})
$('#luong').on('input',function () {
    sotien=parseFloat(removeformatNumber($(this).val()));
    tien=formatNumberCurrency($(this).val())
    ngay=$('#ngay').val();
    if(ngay==""){
        text='Hãy nhập ngày';
        ErrorNotify(text)
        $(this).val("")
        return false;
    }
    tienhangngay= Math.floor(sotien/ngay)
    $(this).val(tien)
    $('#luonghangngay').val(formatNumber(tienhangngay))
    console.log(tienhangngay)
})

