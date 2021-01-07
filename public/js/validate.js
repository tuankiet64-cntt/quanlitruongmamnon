function checkPhone(string,phone) {
    var phoneno = /^\d{10}$/;
    if(phone == ''){
        alertify.notify(string+' không được để trống !', 'error', 5);
        return false;
    } if (!phone.match(phoneno)){
        alertify.notify(string+' không hợp lệ!', 'error', 5);
        return false;
    } else {
        return true;
    }
}

function checkEmail(string,email) {
    if(email!=""){
        var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        // if(email == ''){
        //     alertify.notify(string+' không được để trống !', 'error', 5);
        //     return false;
        // }
        if (!email.match(re)){
            alertify.notify(string+' không hợp lệ!', 'error', 5);
            return false;
        } else {
            return true;
        }
    }
}

function checkRequire(name,item) {
    if(item == ''){
        alertify.notify(name+' không được để trống !', 'error', 3);
        return false;
    } else {
        return true;
    }
}

function checkChange(name,item) {
    if(item == '' || item == null || item == '-2'){
        alertify.notify('Vui lòng chọn '+name+' !', 'error', 5);
        return false;
    } else {
        return true;
    }
}

function checkTableLength(name, item) {
    if(item == '' || item == null || item == '0'){
        alertify.notify(name+' không được để trống!', 'error', 5);
        return false;
    } else {
        return true;
    }
}

function checkDate(string,item) {
    var re = /(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})\s*(\d{0,2}):?(\d{0,2}):?(\d{0,2})/;
    if(item == ''){
        alertify.notify('Vui lòng chọn '+string+'!', 'error', 5);
        return false;
    }
    if(!item.match(re)){
        alertify.notify('Ngày nhập không '+string+'!', 'error', 5);
        return false;
    } else {
        return true;
    }
}

function checkAge(item) {
    var re = /(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})\s*(\d{0,2}):?(\d{0,2}):?(\d{0,2})/;
    if(item == ''){
        alertify.notify('Vui lòng chọn ngày !', 'error', 5);
        return false;
    }
    if(!item.match(re)){
        alertify.notify('Ngày nhập không hợp lệ !', 'error', 5);
        return false;
    }
    var dateInput = Date.parse(item);
    var today = moment().format('DD/MM/YYYY');
    var dateCurrent = Date.parse(today);
    var Difference_In_Time = dateCurrent - dateInput;
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    alertify.notify(Difference_In_Days, 'error', 5);
}

function checkDateTimeFormat(name,item) {
    if(item == '' || item == null || item.length < 10){
        alertify.notify(name+' không đúng định dạng ngày/tháng/năm !', 'error', 5);
        return false;
    } else {
        return true;
    }
}

function checkDateTimeMax(name,item) {
    var today = moment().format('MM/DD/YYYY');
    var date = moment(item, 'DD/MM/YYYY').format('MM/DD/YYYY');
    if(Date.parse(today) < Date.parse(date)){
        alertify.notify(name+' không được lớn hơn ngày hiện tại !', 'error', 5);
        return false;
    } else {
        return true;
    }
}

function checkDateTimeMaxYesterday(name,item) {
    var today = moment().subtract(1, 'days').format('MM/DD/YYYY');
    var date = moment(item, 'DD/MM/YYYY').format('MM/DD/YYYY');
    if(Date.parse(today) < Date.parse(date)){
        alertify.notify(name+' không được lớn hơn ngày hiện tại !', 'error', 5);
        return false;
    } else {
        return true;
    }
}

function checkCompareDate(name1, data1, name2, data2) {
    var date1 = moment(data1, 'DD/MM/YYYY').format('MM/DD/YYYY');
    var date2 = moment(data2, 'DD/MM/YYYY').format('MM/DD/YYYY');
    if(Date.parse(date1) > Date.parse(date2)){
        alertify.notify(name1+' không được lớn hơn '+name2+' !', 'error', 5);
        return false;
    } else {
        return true;
    }
}
function checkCMND(string,cmnd) {
    var cmndno1 = /^\d{9}$/;
    var cmndno2 = /^\d{12}$/;
    if(cmnd == ''){
        alertify.notify(string+' không được để trống !', 'error', 5);
        return false;
    } if (!cmnd.match(cmndno1)&&!cmnd.match(cmndno2)){
        alertify.notify(string+' không hợp lệ!', 'error', 5);
        return false;
    } else {
        return true;
    }
}
function ErrorNotify(text) {
    alertify.notify(text, 'error', 5);
}

function Success(text) {
    alertify.notify(text, 'success', 5);
}
