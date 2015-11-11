<?php

class Archive{

	private static $uploadDir = '/uploads';

	public static function all($dir = null, $path = null)
	{
		if(!isset($path)) {
			$path = __DIR__.self::$uploadDir;
		}
		if(!is_dir($path)) {
			return "Pasta não encontrada!";
		}
		$files = array_diff(scandir($path.'/'.$dir), ['.', '..']);

		return json_encode($files);
	}

	public static function store($file, $path = null)
	{
		$uploadfile = $path.basename($file['name']);

		if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
		    return "Arquivo válido e enviado com sucesso.\n";
		} else {
		    return "Possível ataque de upload de arquivo!\n";
		}
	}

	public static function burn($path)
	{
		if(file_exists($path)){
			return unlink($path)? "Ninguém nunca vai saber.\n" : "Algo de errado aconteceu!\n";
		} else {
			return "Arquivo não encontrado!";
		}
	}

	public static function newFolder($dir, $path = null)
	{
		if(!isset($path)) {
			$path = __DIR__.self::$uploadDir;
		}	
		return mkdir($path.$dir);
	}

}

// echo Archive::store($_FILES['arquivo'], $uploadDir);
// echo Archive::burn($uploadDir.'bla.jpg');
// echo Archive::all();
// echo Archive::newFolder('folder', $uploadDir);
