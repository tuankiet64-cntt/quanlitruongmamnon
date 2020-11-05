let table1='',
    table2='',
    tong='',
    soluonghienco=''
    soluongchophep='';
$(function () {
    loadtable()
    loadtablexeplop()
    getlop()
    $('.js-example-basic-single').select2({
        theme:'classic'
    })
})

function loadtable(){
    checksoluong()
    table1 = $('#tbchuacolop').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/quanlixeplop.getdata',
        },
        serverSide: false,
        ordering: false,
        columns: [
            {data: 'checkbox', name: 'checkbox', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            // {data: 'hokhau', name: 'hokhau', className: 'text-center'},
            {data: 'tinhtrangsuckhoe', name: 'suckhoehientai', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            // {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: '65vh',
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
        initComplete:function () {
            $('#checked').text(table1.rows().count())
        }

    });
}
function loadtablexeplop(){
    let id;
    id=$('#chonlop').val()
    table2 = $('#tbdacolop').DataTable({
        destroy: true,
        responsive: true,
        processing: true,
        language: {
            processing: 'Đang tải ....'
        },
        ajax: {
            type: 'get',
            url: '/quanlixeplop.getdata2',
            data:{id:id}
        },
        serverSide: false,
        ordering: false,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', width: '5%'},
            {data: 'hovaten', className: 'text-center'},
            {data: 'ngaysinh', className: 'text-center'},
            {data: 'gioitinh', name: 'gioitinh', className: 'text-center'},
            // {data: 'hokhau', name: 'hokhau', className: 'text-center'},
            // {data: 'tinhtrangsuckhoe', name: 'suckhoehientai', className: 'text-center'},
            // {data: 'status', name: 'status', className: 'text-center'},
            {data: 'action', name: 'action', className: 'text-center'},
        ],
        scrollY: '65vh',
        scrollX: true,
        scrollCollapse: true,
        lengthMenu: [[25, 50, 100, -1], [25, 50, 100, 'Tất cả']],
        initComplete:function () {
            soluonghienco=table2.rows().count()
            checksoluong()
            $('#dacolop').text(soluonghienco)
            $('#Cothethem').text(soluongchophep)
            $('#toida').text(tong)
        }
    });
}
 function getlop() {
    $.ajax({
        type:'get',
        url:'/quanlixeplop.getlophoc',
    }).then( function (res) {
        $('#chonlop option').not('option:eq(0)').remove()
        $('#chonlop').append(res)
    })
}
function getid() {
    let checked=[],i=0,
        lop=$('#chonlop').val();
    if(lop==null||lop==''){
        text='Hãy chọn lớp để thực hiện thao tác';
        ErrorNotify(text)
    }
    else if(checksoluong()==false){
        return false;
    }
     table1.rows().every(function(index, element) {
        var row = $(this.node());
        // console.log(row.find('td:eq(0)').find('input').is(':checked'))
          if(row.find('td:eq(0)').find('input').is(':checked')){
              checked[i] = row.find('td:eq(0)').find('input:checked').val();
            i++;
        }
    })
    if(checked!=""&& checked.length<=soluongchophep){
        $.ajax({
            type:'post',
            url:'/quanlixeplop.xeplop',
            data:{check:checked,lop:lop}
        }).then(function (res) {
            if(res=='1'){
                let text='Xếp lớp thành công';
                Success(text)
                table1.ajax.reload(null,false);
                $('#chonlop').val(lop).trigger('change')
            }else {
                let text='Có lỗi trong quá trình thực hiện'+res
                ErrorNotify(text)
            }
        })
    }
    else if (checksoluong()!=false && checked.length>soluongchophep){
        let soluong=checked.length-soluongchophep;
        text='Số lượng thêm vượt hơn '+soluong+' học sinh'
        ErrorNotify(text)
    }
}
function checksoluong(){
    tong=$('#chonlop option:selected').data('soluong')
    soluongchophep=tong-soluonghienco;
    // console.log(soluongchophep,tong,soluonghienco)
    if(tong==null){
        soluongchophep='#';
    }
    if(soluongchophep==0){
        text='Lớp đã đủ học sinh';
        ErrorNotify(text);
        return false;
    }
}
$('#chonlop').on('change',function () {
    loadtablexeplop()
})
function reloadtable() {
    lop=$('#chonlop').val()
    table1.ajax.reload(null,false);
    $('#chonlop').val(lop).trigger('change')
}
