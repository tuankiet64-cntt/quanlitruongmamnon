$(function () {
    getdatahs()
})
let totalhs='',
    idgv=$('#idtaikhoan').val(),
    status='';
    // table_1='';
function getdatahs() {
    $.ajax({
        type: 'get',
        url: '/diemdanh.getdata',
        data:{id:idgv}
    }).then(function (res) {
        console.log(res.length)
       if(res.length==2){
            tablehs(res[0].original.data,res[1])
            status=2;
        }
        else if(res.length==0){
            console.log(123)
            text='Hôm nay giáo viên không có lịch dạy'
            ErrorNotify(text)
        }else {
               status=1;
               tablehs(res.data)
       }
    })
}
function tablehs(data,data1) {
    totalhs=data.length;
    $('#diemdanhtable').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data:data,
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', widtd: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'comat', className: 'text-center'},
            {data: 'vang', name: 'sdt', className: 'text-center'},
            // {data: 'vangcophep', name: 'email', className: 'text-center'},
            // {data: 'ngayvaotruong', name: 'tinhtrangsuckhoe', className: 'text-center'},
            {data: 'ghichu', name: 'ghichu', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengtdMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
        initComplete:function () {
            // totalhs=table_1.rows().count()
            // console.log(totalhs)
            $.each(data1,function (index,value) {
                $("input[name="+value.idhs+"][value=" + value.status + "]").prop('checked', true);
            })
        }
    });
}
function diemdanh() {
    let diemdanh=[];
    $.each($('input[type=radio]:checked'),function (index,value) {
        ghichu=$(this).parents('tr').find('td:eq(6)').find('input').val()
        diemdanh[index]={
            'id':$(this).data('id'),
            'value':$(this).val(),
            'ghichu':ghichu
        }
    })
    if(diemdanh.length<totalhs){
        text='Chưa điểm danh đủ học sinh'
        ErrorNotify(text)
        return false;
    }
    if(status==1){
        $.ajax({
            type: 'post',
            url:'/diemdanh.insert',
            data:{idgv:idgv,diemdanh:diemdanh}
        }).then(function (res) {
            if(res==1){
                text='Bạn đã điểm danh thành công';
                Success(text);
            }else {
                text='Có lỗi trong quá trình thực hiện';
                ErrorNotify(text);
            }
        })
    }else {
        $.ajax({
            type: 'post',
            url:'/diemdanh.update',
            data:{idgv:idgv,diemdanh:diemdanh}
        }).then(function (res) {
            if(res==1){
                text='Bạn đã điểm danh thành công';
                Success(text);
                getdatahs()
            }else {
                text='Có lỗi trong quá trình thực hiện';
                ErrorNotify(text);
            }
        })
    }


}
