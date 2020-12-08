var idgv='';
function done(id,r) {
    idgv=id;
    let tengv=r.parents('tr').find('td:eq(1)').text(),
        title='Khi đã đồng ý là không thể huỷ',
        text='Bạn có chấp nhận trả lương cho giáo viên '+tengv+'',
        songaylam=r.parents('tr').find('td:eq(2)').find('label').data('ngay'),
        luongngay=r.parents('tr').find('td:eq(3)').find('label').data('luongngay'),
        tongtien=r.parents('tr').find('td:eq(4)').find('label').data('tongtien'),
        checksongaylam=checkRequire('Số ngày làm',songaylam),
        checksluongngay=checkRequire('Lương ngày',luongngay),
        checktongtien=checkRequire('Tổng tiền',tongtien);
    if(checktongtien==false||checksluongngay==false||checksongaylam==false){
        return false;
    }
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-primary btn-sweet-alert',
            cancelButton: 'btn btn-default btn-sweet-alert'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: title,
        text:text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Đồng ý',
        cancelButtonText: 'Hủy',
        reverseButtons: true,
        focusConfirm: true,
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'post',
                url: '/quanliluong.insert2',
                data: {idgv:idgv,songaylam:songaylam,luongngay:luongngay,tongtien:tongtien}
            }).then(function (res) {
                if (res = 1) {
                    text = 'Đã trả lương thành công';
                    Success(text)
                    closeModalUpdate()
                    reloadtable()
                } else {
                    text = 'Có lỗi trong quá trình thực hiền';
                    ErrorNotify(text)
                }
            })
        } else {
            return false;
        }
    })
}
function OpenModalDone(id,r) {
    idluong=id;
    $('#done-modal').modal('show')
    $.ajax({
        type:'get',
        url:'/quanliluong.getdatabyiddone',
        data:{id:id}
    }).then(function (res) {
        $('#ngay-done').text(res['ngaylamviec']+' VNĐ')
        $('#luong-done').text(formatNumber(res['tongtien'])+' VNĐ')
        $('#luonghangngay-done').text(formatNumber((res['luongngay']))+' VNĐ')
    })
}
function CloseModalDone() {
    $('#done-modal').modal('hide')
}
