$(function () {
    loaddata()
})
let totaldata = [];

function loaddata() {
    $.ajax({
        type: 'get',
        url: '/tintuc.getdata',
    }).then(function (res) {
        $('#phantrang').append(res[1]);
        totaldata = res[0]
        phantrang(1)
        console.log(totaldata);
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
    hientai = $(this).text()
    phantrang(hientai)
})
function getdatabyid(id) {
    window.location = '/detail?id='+id;
}
