/**
 * This is for the app.
 *
 * @package Business-Card-Generator
 */
$(function(){
    function actionclick(id){$('#'+id).attr('href',$('#'+id).attr('data-baseurl')+'?'+$('#info').serialize())}
    $('#print').click(function(){actionclick('print');});
    $('#import').click(function(){actionclick('import');});
    $('#export').click(function(){actionclick('export');});
    function upd8(){
    	$('#front').load($('#ajax').val()+'?side=1&'+$('#info').serialize());
    	$('#back').load($('#ajax').val()+'?side=2&'+$('#info').serialize());
    }
    $('#info fieldset div div input').keyup(function(){upd8()});
    $('#design').change(function(){upd8()});
})