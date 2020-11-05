$(document).on('shown.bs.modal',$('#update-modal'),function () {
    $('.js-example-basic-single').select2({
        placeholder: 'Hãy chọn lớp',
        dropdownParent: $('#update-modal'),
        theme:'classic'
    })
})
function UpdateSYLL(id) {
    configdatetime($('.datetimepicker-update'),$('#update-modal'))
    $('#update-modal').modal('show');
    loadData(id)
}

/**
 * Load data phụ huynh
 */
function loadData(id) {
    $.ajax({
        type:'get',
        url:'/qlsyll.getdatahocsinhupdate',
        data:{id:id}
    }).then(function (res) {
        $('#update-modal input').val("")
        $('#lop-update option').remove()
        $('#lop-update').append(res[2])
        $('#lop-update').val(res[0].malophoc).trigger('select2.change')
        $('#idhocsinh').val(res[0].id)
        $('#tenhs-update').val(res[0].hovaten);
        $('#gioitinh-update').val(res[0].gioitinh).trigger('change')
        $('#tenthuonggoi-update').val(res[0].tenthuonggoi)
        $('#ngaysinh-update').val(res[0].ngaysinh)
        $('#ngayvaotruong-update').val(res[0].ngayvaotruong);
        $('#diachi-update').val(res[0].diachi);
        $('#hokhau-update').val(res[0].hokhauthuongtru);
        $('#hokhautamtru-update').val(res[0].hokhautamtru);
        $('#dantoc-update').val(res[0].dantoc);
        $('#tongiao-update').val(res[0].tongiao);
        $('#suckhoehientai-update').val(res[0].tinhtrangsuckhoe);
        TBphuhuynh(res[1].original.data)
    })
}
function TBphuhuynh(data) {
     $('#phuhuynhTB').DataTable({
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
            {data: 'DT_RowIndex', name: 'DT_RowIndex', class: 'text-center', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'sdt', className: 'text-center'},
            {data: 'email', name: 'email', className: 'text-center'},
            // {data: 'hokhau', name: 'hokhau', className: 'text-center'},
            {data: 'quanhe', name: 'quanhe', className: 'text-center'},
            {data: 'tendonvi', name: 'tendonvi', className: 'text-center'},
            // {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: true,
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
    });
}
function update() {
    let tenhs = $('#tenhs-update').val(),
        id=$('#idhocsinh').val(),
        tenthuonggoi = $('#tenthuonggoi-update').val(),
        ngaysinh_hs = $('#ngaysinh-update').val(),
        diachi = $('#diachi-update').val(),
        hokhauthuongtru = $('#hokhau-update').val(),
        hokhautamtru = $('#hokhautamtru-update').val(),
        dantoc = $('#dantoc-update').val(),
        tongiao = $('#tongiao-update').val(),
        suckhoehientai = $('#suckhoehientai-update').val(),
        gioitinh=$('#gioitinh-update').val(),
        ngayvaotruong=$('#ngayvaotruong-update').val(),
        lophoc=$('#lop-update').val();
    let checktenhs = checkRequire('Tên học sinh', tenhs),
        checkngaysinh = checkDate('Ngày sinh của bé',ngaysinh_hs),
        checkdiachi = checkRequire('Chỗ ở hiện tại', diachi),
        checkhokhau = checkRequire('Hộ khẩu thường trú', hokhauthuongtru),
        checkdantoc = checkRequire('Dân tộc', dantoc),
        checkngayvao=checkDate('Ngày vào trường',ngayvaotruong);
    if(checktenhs==false||checkngaysinh==false||checkdiachi==false||checkhokhau==false
    ||checkdantoc==false||checkngayvao==false){
        return false;
    }
    console.log(id);
    $.ajax({
        type: 'post',
        url:'/qlsyll.update',
        data:{id:id,tenhs:tenhs,tenthuonggoi:tenthuonggoi,ngaysinh_hs:ngaysinh_hs,
        diachi:diachi,hokhauthuongtru:hokhauthuongtru,hokhautamtru:hokhautamtru,dantoc:dantoc,
        tongiao:tongiao,suckhoehientai:suckhoehientai,gioitinh:gioitinh,lophoc:lophoc}
    }).then(function (res) {
        console.log(res);
        if(res==1){
            text='Chỉnh sửa thông tin học sinh thành công';
            Success(text);
            closeModalUpdate()
            reloadTable();
        }else {
            text='Có lỗi trong quá trình thực hiện';
            ErrorNotify(text);
        }
    })

}
