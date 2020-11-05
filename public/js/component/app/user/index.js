$(function () {
    getdataUser()
})

function getdataUser() {
    let id = $('#idUser').val();
    $.ajax({
        type: 'get',
        url: '/user.getdata',
        data: {id: id}
    }).then(function (res) {
        $('#ten').text(res['hovaten'])
        $('#gioitinh').text(res['gioitinh'])
        $('#ngaysinh').text(res['ngaysinh'])
        $('#CMND').text(res['cmnd'])
        $('#hokhau').text(res['hokhau'])
        $('#diachi').text(res['diachi'])
        $('#chucvu').text(res['tenchucvu'])
        $('#Email').text(res['email'])
        $('#sdt').text(res['sdt'])
        $('#dantoc').text(res['dantoc'])
        $('#tongiao').text(res['tongiao'])
        $('#ngayvaotruong').text(res['ngayvaotruong'])
        $('#lopdangday').text(res['tenlop'])
        $('#ngayday').text(res['ngayday'])
    })
}
