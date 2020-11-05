let realtotal='',
    oldClass='';
function openModalUpdate(id,r) {
    oldClass=id;
    $('#update-modal').modal('show')
    loadtable(id)
    realtotal=r.parents('tr').find('td:eq(2)').text()
}function closeModalUpdate(id,r) {
    $('#update-modal').modal('hide')
}
function loadtable(id) {
     $('#nextclass').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type:'get',
            url:'/lenlop.getdataclass',
            data:{id:id}
        },
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'tenlop', className: 'text-center'},
            {data: 'soluong', className: 'text-center'},
            // {data: 'sotien', name: 'gioitinh', className: 'text-center'},
            // {data: 'loaiphi', name: 'tenlop', className: 'text-center'},
            // {data: 'ghichu', name: 'ghichu', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center p-0'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}

function update() {
    let soluongcualop=$('input[type=radio]:checked').data('soluong'),
    id=$('input[type=radio]:checked').data('id'),
    checktontai='';
    $.ajax({
        type:'get',
        url:'/lenlop.checktontai',
        data:{id:id}
    }).then(function (res) {
        if(res == 1){
            text='Lớp hiện vẫn còn học sinh cũ vui lòng lên lớp học sinh của lớp này để thực hiện thao tác'
            ErrorNotify(text)
            return false
        }else {
            if(realtotal>soluongcualop){
                text='Số lượng học sinh vượt quá giới hạn của lớp'
                ErrorNotify(text)
                return false
            }
            $.ajax({
                type:'post',
                url:'/lenlop.update',
                data:{id:id,oldClass:oldClass}
            }).then(function (res) {
                if(res=1){
                    text='Đã lên lớp thành công';
                    Success(text)
                    closeModalUpdate()
                    reloadtable()
                }else{
                    text='Có lỗi trong quá trình thực hiền';
                    ErrorNotify(text)
                }
            })
        }
    })

}
