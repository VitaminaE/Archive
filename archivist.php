<?php 

session_start();

require_once 'archive.php';

// $base_url = "http://127.0.0.1/devdesktop/archive/";
// $base_url = "http://127.0.0.1/devdesktop/archive/archivist/";
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
// $request = @$_SERVER['PATH_INFO'];

// var_dump($request);

if(count($request) > 0){
	if($method === 'GET'){
		if($request[0] === 'listar'){
			array_key_exists('path', $_GET)? $path = $_GET['path'] : $path = null;
			if(Archive::isFolder($path)){
				$reponse = [
					'type' => 'folder',
					'data' => Archive::all($path)
				];
				echo json_encode($reponse);
			} else {
				$reponse = [
					'type' => 'file',
					'data' => Archive::open($path)
				];
				echo json_encode($reponse);
			}
		}
		if($request[0] === 'folder'){
			echo Archive::isFolder($_GET['url']);
		}
	}
	else if(isset($_POST) && $method === 'POST'){
		if($request[0] === 'store'){
			if(count($_FILES) < 1){
				return "O campo arquivo não pode ser vazio.";
			}
			return Archive::store($_FILES['arquivo']);
		}
	}
	else{
		return "Algum erro ocorreu. Não entre em pânico! Nossa equipe de macacos malabaristas já foi contactada e está trabalhando no problema.";
	}
}