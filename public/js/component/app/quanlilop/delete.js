function deletelop(id) {
        title='Bạn chắc chắn xóa lớp này';
        text='Tất cả dữ liệu điểm danh và lịch học sẽ bị xóa và học sinh sẽ chuyển thành chưa xếp lớp';
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary btn-sweet-alert',
                cancelButton: 'btn btn-default btn-sweet-alert'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy',
            reverseButtons: true,
            focusConfirm: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'post',
                    url:'/quanlilop.delete',
                    data:{id:id}
                }).then(function (res) {
                    if(res==1){
                        text='Xóa lớp học thành công';
                        Success(text)
                        reloadtable()
                    }else{
                        ErrorNotify(res)
                    }
                })
            }
        })

}
