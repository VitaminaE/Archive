$(document).ready(function(){

	$.ajax({
		dataType: "json",
        contentType: "application/json; charset=UTF-8",
		method: 'post',
		url: 'archivist/listar',
		success: function(data, textStatus, XML){
			// var container = $('#files'),
			// 	file;

			console.log(data)
			console.log(textStatus)
			console.log(XML)

			for(var k in data) {
			   console.log(k+' => '+data[k]);
			}
		},
		error: function(jqXHR){
			console.log(jqXHR);
			alert('deu ruim');
		}
	});

});