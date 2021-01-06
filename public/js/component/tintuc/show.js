$(function () {
    converhtml()
})
function converhtml() {
    let data=$('#content').val();
    $('#displaycontent').html($.parseHTML(data));
}
