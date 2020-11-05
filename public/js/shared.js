
$('#dangkinhaphoc input').attr("autocomplete","off")
$('#create-modal input').not($('#password')).attr("autocomplete","off")
function configdatetime(inputelement,element) {
    $.datetimepicker.setLocale('vi');
    inputelement.datetimepicker({
        format: 'd-m-Y',
        timepicker: false,
        parentID: element,
        scrollInput : false
    })
    inputelement.on('keydown', function () {
        return false
    })
}
function formatNumberCurrency(n) {
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function removeformatNumber(num) {
    return Number(num.replace(/[^0-9.-]+/g,""));
}
function formatNumber(num) {
    // return num.toLocaleString(undefined);
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
}

