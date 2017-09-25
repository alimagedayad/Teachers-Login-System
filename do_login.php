<?php
session_start();

if ($_POST) {
    $connect = mysqli_connect('localhost','root','','teachers');

    // get inputs
    $email = $_POST['email_l'];
    $tel = $_POST['tel_l'];

    // secure against xss
    $email = secure_input($email);
    $tel = secure_input($tel);

    // secure against sql injection
    $email = mysqli_real_escape_string($connect,$email);
    $tel = mysqli_real_escape_string($connect,$tel);

    $_SESSION['emaill'] = $email;    

	$sql = "SELECT * FROM `personal info` WHERE email = '$email' and phone_number = '$tel'"; //potentially vulnerable to SQL injection
    $result = mysqli_query($connect , $sql);

	if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error($connect);
        exit;
    }

    if (mysqli_num_rows($result) == 1) {
        // user exists
        $_SESSION['logged_in'] = true;
        //logged in. now let's check if they are an admin.
        $assoc = mysqli_fetch_assoc($result);
        if ($assoc['Approved'] == 'Y') {
            // user is approved
            $_SESSION['approved'] = true;
            $_SESSION['logged_in'] = true;
            header('Location: index.php');
        } elseif ($assoc['Approved'] == 'N') {
            // user is not approved yet
            $_SESSION['approved'] = false;
            $_SESSION['logged_in'] = true;        
            echo "Your request is currently in review / disapproved";
        } elseif($assoc['role'] == 'admin') {
            // user is an admin
            $_SESSION['logged_in'] = true;
            $_SESSION['role'] = true;
        }
        
    } else {
        // user not found
        echo '<h1>User not found or invalid password.</h1>';
    }

} else {
    echo 'Redirected Back From Admin Due to Lack of Permissions';
}
