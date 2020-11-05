function back(id) {
    $.ajax({
        type:'post',
        url:'/quanlixeplop.rollback',
        data:{id:id}
    }).then(function (res) {
        if(res=='1'){
            let text='Xếp lớp thành công';
            Success(text)
            reloadtable()
        }else {
            let text='Có lỗi trong quá trình thực hiện'+res
            ErrorNotify(text)
        }
    })
}
