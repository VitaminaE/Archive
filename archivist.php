<?php 

require_once 'archive.php';

// $base_url = "http://127.0.0.1/devdesktop/archive/";
$base_url = "http://127.0.0.1/devdesktop/archive/archivist/";
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
// $request = @$_SERVER['PATH_INFO'];

// var_dump($request);

if(count($request) > 0){

	if($method === 'GET'){
		echo Archive::isFolder($_GET['url']);
	}
	else if ($method === 'POST'){
		if($request[0] === 'listar'){
			echo Archive::all();
		}

		if($request[0] === 'store'){
			return Archive::store( $_FILES['arquivo'] );
		}
	}

}