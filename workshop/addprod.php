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
		$query = "SELECT productName, cardId FROM catalog ";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($result) {
			$rows = mysqli_num_rows($result); // количество полученных строк
			$rows+=1;
			$prodNumb = "card-$rows";
			$prodName = $_POST['categ__name'];
			$picName = (string)$_FILES['picture']['name'];
            $prodLink = "/img/$picName";
            $prodDesc = $_POST['card__desc'];
            $prodPrice = $_POST['card__price'];
            $category = $_SESSION['categid'];
			$query1 = "INSERT INTO catalog (productName, link, description, price, cardId, category) VALUES ('$prodName','$prodLink', '$prodDesc', '$prodPrice', '$prodNumb', '$category')";
			$result1 = mysqli_query($conn, $query1);
		}
		echo "<HTML><HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT=' 0; URL=shop.php ' >
            </HEAD>";
	}

}

?>