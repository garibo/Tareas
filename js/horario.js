$(document).ready(inicio);

function inicio()
{
	$('tr:odd').css('background-color','#e5eff8');
	$('tr:even').css('background-color','#f7fbfe');
	$('tr:first').css({
		'font-weight': 'bold',
		'text-align': 'center',
		'font-family': 'Arial',
		'font-size': '2em',
		'color': '#66a3d3'
	});
}