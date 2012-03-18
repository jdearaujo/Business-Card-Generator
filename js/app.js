/**
 * This is for the app.
 *
 * @package Business-Card-Generator
 */
$(function(){function a(c){$("#"+c).attr("href",$("#"+c).attr("data-baseurl")+"?"+$("#info").serialize())}$("#print").click(function(){a("print")});$("#export").click(function(){a("export")});function b(){$("#front").load($("#ajax").val()+"?side=1&"+$("#info").serialize());$("#back").load($("#ajax").val()+"?side=2&"+$("#info").serialize())}$("#info fieldset div div input").keyup(function(){b()});$("#design").change(function(){b()});$(document).ready(function(){b()});$('#refresh').click(function(){b()})})