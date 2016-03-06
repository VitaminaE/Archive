<?php

class Archive {

	private static $uploadDir = 'uploads';

	public static function all($path = null)
	{
		$path = __DIR__.'/'.self::$uploadDir.'/'.$path;
		if(!is_dir($path)) {
			return "Pasta não encontrada!";
		}
		$files = array_diff(scandir($path), ['.', '..']);
		return $files;
	}

	public static function store($file, $path = null)
	{
		$uploadfile = $path.basename($file['name']);

		if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
		    return "Arquivo válido e enviado com sucesso.\n";
		} else {
		    return "Possível ataque de envio de arquivo!\n";
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

	public static function open($path = null)
	{
		if (file_exists(__DIR__.'/'.self::$uploadDir.'/'.$path)) {
			if (is_dir($path)) {
				return self::all($path);
			}
			return self::$uploadDir.$path;
		} else {
			return "Arquivo não encontrado.";
		}
	}

	public static function newFolder($dir, $path = null)
	{
		if (!isset($path)) {
			$path = __DIR__.'/'.self::$uploadDir;
		}	
		return mkdir($path.$dir);
	}

	public static function isFolder($path)
	{
		$path = __DIR__.'/'.self::$uploadDir.'/'.$path;
		return is_dir($path);
	}

}

// echo Archive::store($_FILES['arquivo']);
// echo Archive::burn($uploadDir.'bla.jpg');
// echo Archive::all('test');
// echo Archive::newFolder('folder', $uploadDir);
// echo Archive::open('.gitignore');
