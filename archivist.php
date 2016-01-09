<?php 

require_once 'archive.php';

// $base_url = "http://127.0.0.1/devdesktop/archive/";
$base_url = "http://127.0.0.1/devdesktop/archive/archivist/";
$method = $_SERVER['REQUEST_METHOD'];
$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
// $request = @$_SERVER['PATH_INFO'];

// var_dump($request);

if(count($request) > 0){

  if($request[0] === 'listar'){
    echo Archive::all();
  }

  if($request[0] === 'store'){
    return Archive::store($_FILES['arquivo']);
  }

}



// switch ($method) {
//   case 'POST':
    
//     //
//     break;
//   case 'GET':
//   	// 
//   echo index.php;
//     break;
//   default:
//     header("Location: ".$base_url);
//     break;
// }