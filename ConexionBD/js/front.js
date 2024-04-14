var cargaHTML = function(url, espacio){
	$.get(
		url,
		'',
		function(htmlExterno){
			$(espacio).html(htmlExterno);
		}
	);
};

var compilaHTML = function(data,selector,ubicacion){
	setTimeout(function(){
		var sTemplate = $('#'+selector).html();
		var tmp = Handlebars.compile(sTemplate);
		var html = tmp(data);

		$('#'+ubicacion).append(html);
		$('#'+ubicacion).show();
	},500);
}