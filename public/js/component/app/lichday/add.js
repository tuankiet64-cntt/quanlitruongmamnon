let table2='',
    idlichhoc='';
function openModaladd(id) {
    $('#add-modal').modal('show')
    tableGV(id)
    idlichhoc=id;
}
function closeModaladd() {
    $('#add-modal').modal('hide')
}
function tableGV(idgv) {
    table2 = $('#tablegvadd').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/lichday.getdatagv',
            data:{idgv:idgv}
        },
        serverSide: false,
        ordering: false,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'lichday', name: 'lichday', className: 'text-center'},
            {data: 'lophoc', name: 'lophoc', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: '65vh',
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function updategv() {
    idgv=$('input[type=radio]:checked').data('id')
   $.ajax({
       type:'post',
       url:'/lichday.checklichdaycuagv',
       data:{id:idgv,idlichhoc:idlichhoc}
   }).then(function (res) {
       if(res==1){
           text='Cập nhật lịch dạy thành công';
           closeModaladd(0)
           Success(text)
           reloadTable()
       }
       else
           {
           let title='Giáo viên đang dạy lịch khác',
               text = 'Bạn chắc chắn muốn chuyển giáo viên sang lớp này. Lịch dạy cũ của giáo viên sẽ trống';
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
                       type:'post',
                       url:'/lichday.checklichdaycuagv2',
                       data:{id:idgv,idlichhoc:idlichhoc}
                   }).then(function (res) {
                       if(res==1){
                           text='Cập nhật lịch dạy thành công';
                           closeModaladd(0)
                           Success(text)
                           reloadTable()
                       }else
                       {
                           text='Cập nhật lịch dạy thất bại';
                           ErrorNotify(text)
                           reloadTable()
                       }
                   })
               } else {
                   return false;
               }
           })
       }
   })
}
