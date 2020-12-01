<?php

$path = "C:\OpenServer\domains\localhost\img/";
$tmp_path = "tmp/";

$types = array('image/gif', 'image/png', 'image/jpeg');

$size = 1024000;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!in_array($_FILES['picture']['type'], $types))
		die('Запрещенный тип файла <a href="?">Попробовать другой файл?</a>');

	if($_FILES['picture']['size'] > $size)
		die('Слишком большой размер файла <a href="?">Попробовать другой файл?</a>');
	
	if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
		echo 'Что-то пошло не так';
	else
		echo 'Загрузка удачна';
}
echo "<HTML><HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT=' 0; URL=catalog.php ' >
            </HEAD>";

?>