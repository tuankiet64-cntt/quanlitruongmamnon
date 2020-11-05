
function openModalCreate() {
    $('#create-modal').find('input').not($('#month-fee')).val('')
    $('#create-modal').modal('show')
}
function closeModalCreate() {
    $('#create-modal').modal('hide')
}
$('#total-fee').on('input',function () {
    val=$(this).val()
    $(this).val(formatNumberCurrency(val))
})
function createfee() {
    let tenphi=$('#name-fee').val(),
        thangapdung=d.getDate() + '-' +$('#month-fee').val(),
        sotien=$('#total-fee').val(),
        loaiphi=$('#type-fee').val(),
        note=$('#note-fee').val(),
        checktenphi=checkRequire('Tên phí',tenphi),
        checkthang=checkRequire('Tháng áp dụng',thangapdung),
        checksotien=checkRequire('Số tiền',sotien),
        checkloaiphi=checkRequire('Loại phí',loaiphi);
    if(checkloaiphi==false||checktenphi==false||checksotien==false||checkthang==false){
        return false;
    }
    $.ajax({
        type:'post',
        url:'/cackhoangphi.insert',
        data:{tenphi:tenphi,thangapdung:thangapdung,sotien:removeformatNumber(sotien),loaiphi:loaiphi,note:note}
    }).then(function (res) {
        if(res==1){
            text='Bạn đã tạo khoản phí thành công';
            Success(text)
            reloadtable();
            closeModalCreate()
        }else {
            text='Có lỗi trong quá trình thực hiện';
            ErrorNotify(text)
        }
    })
}

