$(function () {
    loaddata()
})
let soluongtoida=0;
    totaldata = [];

function loaddata() {
    $.ajax({
        type: 'get',
        url: '/tintuc.getdata',
    }).then(function (res) {
        soluongtoida=res[2]
        $('#phantrang').append(res[1]);
        totaldata = res[0]
        phantrang(1)
        $('.page-item ').eq(1).addClass('active')
    })
}

function phantrang(tranghientai) {
    data = totaldata;
    diemcuoi = tranghientai * 4;
    diemdau = diemcuoi - 4;
    $('#tintuc div').remove()
    for (i = diemdau; i < diemcuoi; i++) {
        if(data[i]!=""){
            if (data[i]['image_path'] !=[]) {
                $('#tintuc').append('<div class="card col-lg-6" style="width: 18rem;">\n' +
                    '  <img class="card-img-top" src="' + data[i]['image_path'] + '" alt="Card image cap">\n' +
                    '  <div class="card-body">\n' +
                    '    <h5 class="card-title sub-title">' + data[i]['title'] + '</h5>\n' +
                    '    <p class="card-text" style="margin-top: 14px">' + data[i]['description'] + '</p>\n' +
                    '    <button href="javascript:void(0)" class="btn btn-primary float-right" onclick="getdatabyid('+data[i]['id']+')">Xem thêm</button>\n' +
                    '  </div>\n' +
                    '</div>')
            }
            else {
                $('#tintuc').append('<div class="card col-lg-6"  style="width: 18rem;">\n' +
                    '  <img class="card-img-top" src="images/noimage.png" alt="Card image cap">\n' +
                    '  <div class="card-body">\n' +
                    '    <h5 class="card-title sub-title">' + data[i]['title'] + '</h5>\n' +
                    '    <p class="card-text m-t-14" style="margin-top: 14px">' + data[i]['description'] + '</p>\n' +
                    '    <button href="javascript:void(0)" class="btn btn-primary float-right" onclick="getdatabyid('+data[i]['id']+')">Xem thêm</button>\n' +
                    '  </div>\n' +
                    '</div>')
            }
        }
        else {
            return false;
        }

    }
}

$(document).on('click', '#pani', function () {
    $('.page-item ').removeClass('active')
    $(this).parents('li').addClass('active')
    hientai = $(this).text()
    phantrang(hientai)
})
function getdatabyid(id) {
    window.location = '/detail?id='+id;
}
$(document).on('click','#Next',function () {
    $.each($('.page-item'),function (index,value) {
        if($(this).hasClass('active')){
            hientai=parseFloat($(this).find('a').text())
            $(this).removeClass('active')
        }
    })
    next=hientai+1;
    if(next>soluongtoida){
        $('.page-item ').eq(soluongtoida).addClass('active')
        return false;
    }
    $('.page-item ').eq(next).addClass('active')
    phantrang(next)
})
$(document).on('click','#Previous',function () {
    $.each($('.page-item'),function (index,value) {
        if($(this).hasClass('active')){
            hientai=parseFloat($(this).find('a').text())
            $(this).removeClass('active')
        }
    })
    Previous=hientai-1;
    if(Previous<1){
        $('.page-item ').eq(1).addClass('active')
        return false;
    }
    $('.page-item ').eq(Previous).addClass('active')
    phantrang(Previous)
})
