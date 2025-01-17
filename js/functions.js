"use strict";
jQuery(document).ready(function($) {
    window.cspgf_charts = window.cspgf_charts || {};
    window.cspgf_charts_init = window.cspgf_charts_init || {};
    jQuery.each(window.cspgf_charts, function( index, value ) {
        switch ( value.type ) {
            case 'Doughnut':
                window.cspgf_charts_init[ index ] = new Chart(document.getElementById( index ).getContext("2d"), {
                    type: 'doughnut',
                    data: value.data,
                    options: value.options
                });
                break;
            case 'Pie':
                window.cspgf_charts_init[ index ] = new Chart(document.getElementById( index ).getContext("2d"), {
                    type: 'pie',
                    data: value.data,
                    options: value.options
                });
                break;
            case 'Bubble':
                window.cspgf_charts_init[ index ] = new Chart(document.getElementById( index ).getContext("2d"), {
                    type: 'bubble',
                    data: value.data,
                    options: value.options
                });
                break;
            case 'PolarArea':
                window.cspgf_charts_init[ index ] = new Chart(document.getElementById( index ).getContext("2d"), {
                    type: 'polarArea',
                    data: value.data,
                    options: value.options
                });
                break;
            case 'Bar':
                window.cspgf_charts_init[ index ] = new Chart(document.getElementById( index ).getContext("2d"), {
                    type: 'bar',
                    data: value.data,
                    options: value.options
                });
                break;
            case 'Line':
                window.cspgf_charts_init[ index ] = new Chart(document.getElementById( index ).getContext("2d"), {
                    type: 'line',
                    data: value.data,
                    options: value.options
                });
                break;
            case 'Radar':
                window.cspgf_charts_init[ index ] = new Chart(document.getElementById( index ).getContext("2d"), {
                    type: 'radar',
                    data: value.data,
                    options: value.options
                });
                break;
            default :
                window.cspgf_charts_init[ index ] = new Chart(document.getElementById( index ).getContext("2d"), {
                    type: 'line',
                    data: value.data,
                    options: value.options
                });
        }
    });
	!function(a,b){var c=function(a,b,c){var d;return function(){function g(){c||a.apply(e,f),d=null}var e=this,f=arguments;d?clearTimeout(d):c&&a.apply(e,f),d=setTimeout(g,b||100)}};jQuery.fn[b]=function(a){return a?this.bind("resize",c(a)):this.trigger(b)}}(jQuery,"smartresize");
	function reSize(selector) {
		jQuery(selector).each(function() {
			var current    = jQuery(this);
			var proportion = current.data('proportion');
			var thisWidth  = current.outerWidth();
			current.css( 'height', (thisWidth / proportion) );
			current.parent().css( 'height', (thisWidth / proportion) );
		});
	}
	reSize('.cspgf_charts_canvas');
	jQuery(window).smartresize(function() {
		reSize('.cspgf_charts_canvas');
	});
});