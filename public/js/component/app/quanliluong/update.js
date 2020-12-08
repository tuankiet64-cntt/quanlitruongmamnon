var idluong='';
function openupdate(id,r) {
    idluong=id;
    $('#update-modal').modal('show')
    $.ajax({
        type:'get',
        url:'/quanliluong.getdatabyid',
        data:{id:id}
    }).then(function (res) {
        $('#ngay-update').val(res['songaylamviec'])
        $('#luong-update').val(formatNumber(res['tongtien']))
        $('#luonghangngay-update').val(formatNumber((res['sotienhangngay'])))
    })
}

function closeModalUpdate() {
    $('#update-modal').modal('hide')
}
function update() {
    let ngaylamviec=$('#ngay-update').val(),
        luong=removeformatNumber($('#luong-update').val()),
        sotienhangngay=removeformatNumber($('#luonghangngay-update').val()),
        checkngaylam=checkRequire('Ngày làm việc',ngaylamviec),
        checkluong=checkRequire('Lương ',luong),
        checkluongngay=checkRequire('Số tiền ngày',sotienhangngay);
    if(checkngaylam==false||checkluong==false||checkluongngay==false){
        return false;
    }
    $.ajax({
        type:'post',
        url:'/quanliluong.update',
        data:{id:idluong,ngaylamviec:ngaylamviec,luong:luong,sotienhangngay:sotienhangngay}
    }).then(function (res) {
        if(res==1){
            text='Cập nhật thành công';
            Success(text)
            closeModalUpdate()
            $('#update-modal input').val("")
            reload()
        }else
        {
            text='Cập nhật thất bại';
            ErrorNotify(text)
        }
    })
}
$('#ngay-update').on('input',function () {
    if($(this).val()>31){
        text='Tối đa là 31 ngày';
        ErrorNotify(text);
        $(this).val(31)
    }else if($(this).val()<=0){
        text='Không được bé hơn 1';
        ErrorNotify(text);
        $(this).val(1)
    }
    sotien=parseFloat(removeformatNumber($('#luong-update').val()));
    tien=formatNumberCurrency($('#luong-update').val())
    ngay=$(this).val();
    if(ngay==""){
        text='Hãy nhập ngày';
        ErrorNotify(text)
        $(this).val("")
        return false;
    }
    tienhangngay= Math.floor(sotien/ngay)
    $('#luonghangngay-update').val(formatNumber(tienhangngay))
})
$('#luong-update').on('input',function () {
    sotien=parseFloat(removeformatNumber($(this).val()));
    tien=formatNumberCurrency($(this).val())
    ngay=$('#ngay-update').val();
    if(ngay==""){
        text='Hãy nhập ngày';
        ErrorNotify(text)
        $(this).val("")
        return false;
    }
    tienhangngay= Math.floor(sotien/ngay)
    $(this).val(tien)
    $('#luonghangngay-update').val(formatNumber(tienhangngay))
    console.log(tienhangngay)
})
