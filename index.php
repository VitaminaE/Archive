<?php
	session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Archive</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<div class='container'>
		<form action='archivist/store' method='post' enctype='multipart/form-data'>
			<div class='form-group'>
				<label for='arquivo' class='control-label'>Arquivo:</label>
				<input type='file' name='arquivo' id='arquivo' class='form-control'/>
			</div>
			<div class='form-group'>
				<input type='submit' value='Submit' class='btn' id='submit'>
			</div>
		</form>

		<table id='files' class='table table-hover'>
			<thead>
				<th>Name</th>
			</thead>
		</table>
	</div>

	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="scripts/script.js"></script>
</body>
</html>