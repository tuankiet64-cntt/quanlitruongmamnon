
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
function configCkeditor(element) {
    element.ckeditor({
        entities_latin: false,
        entities_greek: false,
        extraPlugins: 'easyimage',
        extraPlugins: 'autogrow',
        language: 'vi',
        cloudServices_tokenUrl: 'https://76542.cke-cs.com/token/dev/c24efdd7a060bfb48cd69f3a1b7a41869391020c2a734e328d7bb665b1f1',
        cloudServices_uploadUrl: 'https://76542.cke-cs.com/easyimage/upload/'
    })

}
