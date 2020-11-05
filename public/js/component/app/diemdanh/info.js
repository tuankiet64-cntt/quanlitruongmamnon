function info(id) {
    $('#info-modal').modal('show')
    $.ajax({
        type: 'get',
        url: '/qlsyll.getdatahocsinhupdate',
        data: {id: id}
    }).then(function (res) {
        console.log(res)
        $('#update-modal span').text("")
        $('#lop-update option').remove()
        $('#lop-update').append(res[2])
        $('#lop-update').val(res[0].malophoc).trigger('select2.change')
        $('#idhocsinh').val(res[0].id)
        $('#tenhs-update').text(res[0].hovaten);
        $('#gioitinh-update').val(res[0].gioitinh).trigger('change')
        $('#tenthuonggoi-update').text(res[0].tenthuonggoi)
        $('#ngaysinh-update').text(res[0].ngaysinh)
        $('#ngayvaotruong-update').text(res[0].ngayvaotruong);
        $('#diachi-update').text(res[0].diachi);
        $('#hokhau-update').text(res[0].hokhauthuongtru);
        $('#hokhautamtru-update').text(res[0].hokhautamtru);
        $('#dantoc-update').text(res[0].dantoc);
        $('#tongiao-update').text(res[0].tongiao);
        $('#suckhoehientai-update').text(res[0].tinhtrangsuckhoe);
        TBphuhuynh(res[1].original.data)
    })
}

function closeModalinfo() {
    $('#info-modal').modal('hide')
}

function TBphuhuynh(data) {
    $('#phuhuynhTB').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        data: data,
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
