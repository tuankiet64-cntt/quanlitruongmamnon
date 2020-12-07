let idgv='',
    table1='';
function openModalCreate(id) {
    idgv=id;
    getdatabyid(id)
    $('#create-modal').modal('show');
}
$('#create-modal').on('shown.bs.modal',function () {
    $('#datetimepicker').datetimepicker({
        // viewMode: 'years',
        format: 'DD-MM-YYYY',
        locale: 'vi',
        // minDate:'10-1-2020',
        icons: {
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        }
    })
})
function closeModalCreate() {
    // $('#create-modal input').val('')
    $('#create-modal').modal('hide')
}
function getdatabyid(id) {
    let month=$('#calendar-month').val();
    $.ajax({
        type:'get',
        url:'/quanlichamcong.getdatabyid',
        data:{id:id,month:month}
    }).then(function (res) {
        $('#tengv').text(res[0]['hovaten'])
        loadtable(res[1].original.data);
    })
}
function loadtable(data) {
    table1=$('#chamcongbyid').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data:data.reverse(),
        serverSide: false,
        ordering: true,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'ngaylamviec', className: 'text-center'},
            {data: 'status', className: 'text-center'},
            {data: 'action', name: 'gioitinh', className: 'text-center'},
            // {data: 'loaiphi', name: 'tenlop', className: 'text-center'},
            // {data: 'ghichu', name: 'ghichu', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            // {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function createCheckin() {
    let status=$('input[type=radio]:checked').val(),
        date=$('#datetimepicker').val();
        $.ajax({
            type:'post',
            url:'/quanlichamcong.insert',
            data:{id:idgv,status:status,date:date}
        }).then(function (res) {
            if(res==1){
                text='Chấm công thành công';
                Success(text);
                closeModalCreate()
                reloadtable()
            }
            else if(res=='dd'){
                text='Giáo viên đã chấm công rồi';
                ErrorNotify(text);
                return false;
            }
            else if(res=='date'){
                text='Ngày chấm công vượt qua ngày hiện tại';
                ErrorNotify(text);
                return false;
            }
            else {
                text='Có lỗi trong quá trình thực hiện';
                ErrorNotify(text);
                return false;
            }
        })
}
function changeStatus(status,id) {
    $.ajax({
        type:'post',
        url:'quanlichamcong.updatestatus',
        data:{status:status,id:id}
    }).then(function (res) {
        if(res==1){
            text='Đổi trạng thái thành công';
            Success(text)
            getdatabyid(idgv)
        }else{
            text='Có lỗi trong quá trình thực hiện'
            ErrorNotify(text)
        }
    })
}

