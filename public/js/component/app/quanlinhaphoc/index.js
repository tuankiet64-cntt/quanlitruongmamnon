/**
 * on ready
 */
let table="";
$(function () {
    loadtable()
})
/**
 * Change status function
 * param id
 */
function status(status,id,emailbo,emailme,emailph) {
    let confirm = 'Đồng ý';
    let cancel = 'Hủy bỏ';
    if(status==1){
        title='Đổi trạng thái thành chấp nhận';
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary btn-sweet-alert',
                cancelButton: 'btn btn-default btn-sweet-alert'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: title,
            // text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: confirm,
            cancelButtonText: cancel,
            reverseButtons: true,
            focusConfirm: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'post',
                    url:'/qlnhaphoc.changestatus',
                    data:{id:id,status:status}
                }).then(function (res) {
                    if(res==1){
                        table.ajax.reload(null,false);
                        $.ajax({
                            type:'post',
                            url:'/mail.success',
                            data:{id:id}
                        })
                    }
                })
            }
        })
    }else if(status==2){
        title='Đổi trạng thái thành từ chối';
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-primary btn-sweet-alert',
                cancelButton: 'btn btn-default btn-sweet-alert'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: title,
            // text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: confirm,
            cancelButtonText: cancel,
            reverseButtons: true,
            focusConfirm: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type:'post',
                    url:'/qlnhaphoc.changestatus',
                    data:{id:id,status:status}
                }).then(function (res) {
                    if(res==1){
                        table.ajax.reload(null,false);
                        $.ajax({
                            type:'post',
                            url:'/mail.fail',
                            data:{id:id}
                        })
                    }
                })
            }
        })
    }
}
/**
 * Loadtable
 */
function loadtable() {
        table= $('#quanlinhaphocTB').DataTable({
            destroy: true,
            responsive: true,
            processing: true,
            language: {
                processing: 'Đang tải ....'
            },
            ajax:{
                type:'get',
                url:'/qlnhaphoc.getdata',
            },
            serverSide: false,
            ordering: true,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width:'5%'},
                {data: 'tenhs', className:'text-center'},
                {data: 'ngaysinh', className:'text-center'},
                {data: 'gioitinh', name:'gioitinh', className:'text-center'},
                {data: 'hokhau',name: 'hokhau', className:'text-center'},
                {data: 'suckhoehientai',name: 'suckhoehientai', className:'text-center'},
                {data: 'status',name: 'status', className:'text-center'},
                {data: 'action',name: 'action', className:'text-center'},
            ],
            scrollY: true,
            scrollX: true,
            scrollCollapse: true,
            lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
        });
}
