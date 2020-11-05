$(function () {
    $('.js-example-basic-single').select2({
        dropdownParent:$('#create-modal'),
        theme:'classic'
    })
    configdatetime($('.datetimepicker'),$('#create-modal'))
    getcv()
})
function Create() {
    $('#create-modal input').val("")
    $('#create-modal').modal('show')
}
function closeModalCreate() {
    $('#create-modal').modal('hide')
}
/**
 * Get data
 */
function getcv() {
    $.ajax({
        type:'get',
        url:'/quanlitaikhoan.getdatacv',
    }).then(function (res) {
        $('#chucvu option').remove()
        $('#chucvu').append(res)
    })
}
/**
 * Create
 * @returns {boolean}
 */
function create() {
    let tengv=$('#hovaten').val(),
        gioitinh=$('#gioitinh').val(),
        ngaysinh=$('#ngaysinh').val(),
        chucvu=$('#chucvu').val(),
        cmnd=$('#cmnd').val(),
        ngayvaotruong=$('#ngayvaotruong').val(),
        diachi=$('#diachi').val(),
        hokhau=$('#hokhau').val(),
        dantoc=$('#dantoc').val(),
        tongiao=$('#tongiao').val(),
        bangcap=$('#bangcap').val(),
        email=$('#email').val(),
        sdt=$('#sdt').val(),
        password=$('#password').val(),
        checktengv=checkRequire('Tên giáo viên',tengv),
        checkngaysinh=checkDate('ngày sinh giáo viên',ngaysinh),
        checkcmnd=checkCMND('Chứng minh nhân dân',cmnd),
        checkngayvaotruong=checkDate('ngày vào trường',ngayvaotruong),
        checkdiachi=checkRequire('Địa chỉ',diachi),
        checkhokhau=checkRequire('Hộ khẩu',hokhau),
        checkdantoc=checkRequire('Dân tộc',dantoc),
        checkemail=checkEmail('Email giáo viên',email),
        checksdt=checkPhone('SĐT giáo viên',sdt),
        checkbangcap=checkRequire('Bằng cấp',bangcap),
        checkpassword=checkRequire('Mật khẩu',password);
        if(checktengv==false||checkngaysinh==false||checkcmnd==false||checkngayvaotruong==false||
        checkdiachi==false||checkhokhau==false||checkdantoc==false||checkpassword==false||
        checkemail==false||checksdt==false||checkbangcap==false){
            return false;
        }
        $.ajax({
            type:'post',
            url:'/quanlitaikhoan.create',
            data:{tengv:tengv,gioitinh:gioitinh,ngaysinh:ngaysinh,chucvu:chucvu,cmnd:cmnd,ngayvaotruong:ngayvaotruong,
            diachi:diachi,hokhau:hokhau,dantoc:dantoc,tongiao:tongiao,password:password,
                email:email,sdt:sdt,bangcap:bangcap}
        }).then(function (res) {
            if(res==2){
                text='Email đã tồn tại';
                ErrorNotify(text);
                $('#email').focus();
            }
            else if(res==1){
                text='Tạo tài khoản thành công';
                Success(text);
                reloadtabel()
                closeModalCreate()
            }else {
                text='Có lỗi trong quá trình tạo';
                ErrorNotify(text);
                return false;
            }
        })
}


