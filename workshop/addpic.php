<?php
session_start();
$conn = mysqli_connect('localhost', 'mysql', 'mysql');
$select_db = mysqli_select_db($conn, 'workshop');

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
	else {
		echo 'Загрузка удачна';
		$query = "SELECT categoryName, categoryId FROM categories ";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($result) {
			$rows = mysqli_num_rows($result); // количество полученных строк
			$rows+=1;
			$categNumb = "categ-$rows";
			$categName = $_POST['categ__name'];
			$picName = (string)$_FILES['picture']['name'];
			$categLink = "/img/$picName";
			echo $categName; 
			echo $categLink;
			echo $categNumb;
			$query1 = "INSERT INTO categories (CategoryName, link, categoryId) VALUES ('$categName','$categLink','$categNumb')";
			$result1 = mysqli_query($conn, $query1);
		}
		echo "<HTML><HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT=' 0; URL=catalog.php ' >
            </HEAD>";
	}

}

?>