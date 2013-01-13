/*jslint browser: true*/
/*global $: false*/
$().ready(function () {
    'use strict';
    $('.kwicks').kwicks({
        max: 968,
        defaultKwick: 0,
        sticky: true,
        event: 'click'
    });
});
$(function () {
	'use strict';
	$("#draggable3").draggable();
	$("#draggable2").draggable();
	$("#draggable4").draggable();
	$("#draggable5").draggable();
	$("#draggable6").draggable();
	$("#draggable7").draggable();
	$("#draggable8").draggable();
});