<?php

class Archive{

	private $uploadDir = '/uploads/';

	public static function all($dirName = null, $uploadDir = null)
	{
		$files = array_diff(scandir($uploadDir.$dirName), ['.', '..']);
		return json_encode($files);
	}

	public static function store($file, $uploadDir = null)
	{
		$uploadfile = $uploadDir.basename($file['name']);

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

	public static function newFolder($dirName, $uploadDir = null)
	{
		return mkdir($uploadDir.$dirName);
	}

}

// echo Archive::store($_FILES['arquivo'], $uploadDir);
// echo Archive::burn($uploadDir.'bla.jpg');
// echo Archive::all($uploadDir);
// echo Archive::newFolder('folder', $uploadDir);
