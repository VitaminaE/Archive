$(document).ready(function(){

	$.ajax({
		dataType: 'json',
        contentType: 'application/json; charset=UTF-8',
		method: 'get',
		url: 'archivist/listar',
		success: function(response, textStatus){
			if(textStatus !== 'success'){
				alert('Algo errado não está certo.');
				return;
			}
			if(response.type === 'folder'){
				listFiles(response.data);
			}
			if(response.type === 'file'){
				window.location.href = window.location.href + response.data;
			}
		},
		error: function(jqXHR, textStatus){
			console.log(textStatus);
			console.log(jqXHR);
			alert('deu ruim aqui');
		}
	});

	$(this).on('click', 'a', function(e){
		e.preventDefault();

		var path = $(this).attr('href'),
			data = {path : path};

		$.ajax({
			dataType: 'json',
	        contentType: 'application/json; charset=UTF-8',
			method: 'get',
			data: data,
			url: 'archivist/listar/',
			success: function(response, textStatus){
				if(textStatus !== 'success'){
					alert('Algo errado não está certo.');
					return;
				}
				if(response.type === 'folder'){
					listFiles(response.data, path);
				}
				if(response.type === 'file'){
					window.location.href = window.location.href + response.data;
				}
			},
			error: function(jqXHR, textStatus){
				console.log(textStatus);
				console.log(jqXHR);
				alert('deu ruim');
			}
		});
	});

	var listFiles = function(data, path){
		var container = $('#files').empty(),
			fileElement,
			fileUrl;

		var urlArr = window.location.href.split('archive/');
		if(urlArr.lenght < 2){
			alert('Algum erro ocorreu! Mantenha a calma.');
			return;
		}

		for(var k in data) {
			// fileIcon = getFileIcon(data[k]);
			if(typeof path !== typeof undefined){
				fileUrl = urlArr[1]+path+'/'+data[k];
			} else {
				fileUrl = urlArr[1]+'/'+data[k];
			}
			fileIcon = 'glyphicon-file';
			fileElement = $('<tr/>').append(
				$('<td/>').append(
					$('<span/>', {'class': 'glyphicon', 'aria-hidden' : true}).addClass(fileIcon)
				).append(
					$('<a/>', {'href' : fileUrl}).text(" "+data[k])
				)
			);	

			container.append(fileElement);

			// getFileIcon(data[k], function(fileIcon){
			// 	console.log('oi');
			// 	console.log(fileIcon);
			// 	fileElement = $('<tr/>').append(
			// 		$('<td/>').append(
			// 			$('<span/>', {'class': 'glyphicon', 'aria-hidden' : true}).addClass(fileIcon)
			// 		).append(
			// 			$('<a/>', {'href' : fileUrl}).text(data[k])
			// 		)
			// 	);	
			// 	container.append(fileElement);
			// });
		}
	}

	// var getFileIcon = function(fileName, callback){
	// 	var imageTypes = ['jpg','jpeg','png','gif','tif','jp2','psd','svg'],
	// 		documentTypes = ['txt','rtf','odt','pdf','doc','docx','csv','ppt','xls'],
	// 		videoTypes = ['mpg','mp4','wmv','mov','flv'],
	// 		audioTypes = ['mp3','wav','wma'],
	// 		iconName;

	// 	var arr = fileName.split('.');
	// 	extension = arr[ arr.length - 1 ];

	// 	if(imageTypes.indexOf(extension) > -1) {
	// 		callback('glyphicon-picture');
	// 	} else if(documentTypes.indexOf(extension) > -1) {
	// 		callback('glyphicon-file');
	// 	} else if(videoTypes.indexOf(extension) > -1) {
	// 		callback('glyphicon-film');
	// 	} else if(audioTypes.indexOf(extension) > -1) {
	// 		callback('glyphicon-music');
	// 	} else {
	// 		var url = window.location.href.split('archive/');
	// 		url = url[0]+'archive/archivist/?url=uploads/'+url[1]+fileName;
	// 		$.ajax({
	// 			dataType: 'json',
 //        		contentType: 'application/json; charset=UTF-8',
	// 			method: 'get',
	// 			url: url,
	// 			success: function(data, textStatus){
	// 				if(data == 'true'){
	// 					callback('glyphicon-folder-close');
	// 				}
	// 				else{
	// 					callback('glyphicon-file');
	// 				}
	// 			},
	// 			error: function(jqXHR){
	// 				callback('glyphicon-file');
	// 			}
	// 		});
	// 	}

	// }

	$('form').on('submit', function(e){
		e.preventDefault();

		var form = $(this),
			url = form.attr('action');

		$.ajax({
			// dataType: 'json',
	  //       contentType: 'application/json; charset=UTF-8',
			method: 'post',
			url: url,
			data: form.serialize(),
			success: function(response, textStatus){
				// console.log(textStatus);
				// console.log(response);
				// alert(response);
			},
			error: function(jqXHR){
				console.log(jqXHR);
				alert('deu ruim');
			}
		});

		// return false;
	});

});