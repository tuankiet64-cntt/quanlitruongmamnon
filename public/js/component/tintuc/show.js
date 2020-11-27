$(function () {
    converhtml()
})
function converhtml() {
    let data=$('#content').val();
    console.log()
    $('#displaycontent').html($.parseHTML(data));
}
