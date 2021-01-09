<?php
    session_start();
    $conn = mysqli_connect('localhost', 'mysql', 'mysql');
    $select_db = mysqli_select_db($conn, 'workshop');

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO registration (UserName, Email, Password) VALUES ('$username','$email','$hash')";
        $result = mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;

        if ($result) {
            echo "<HTML><HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT=' 0; URL=catalog.php ' >
            </HEAD>";
        }
    }
?>