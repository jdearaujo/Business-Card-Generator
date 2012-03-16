/**
 * This is for the app.
 *
 * @package Business-Card-Generator
 */
$(function(){
    function actionclick(id) {$('#'+id).attr('href',$('#'+id).attr('data-baseurl')+'?'+$('#info').serialize());}
    $('#print').click(function(){actionclick('print');});
    $('#import').click(function(){actionclick('import');});
    $('#export').click(function(){actionclick('export');});
})