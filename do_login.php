<?php
session_start();
?>
<?php
if ($_POST) {
	$connect = mysqli_connect('localhost','root','','teachers');
    $email = $_POST['email_l'];
    $_SESSION['emaill'] = $email;
    $tel = $_POST['tel_l'];
	$sql = "SELECT * FROM `personal info` WHERE email = '$email' and phone_number = '$tel'"; //potentially vulnerable to SQL injection
	$result = mysqli_query($connect , $sql);
	if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysqli_error($connect);
    exit;
}
if (mysqli_num_rows($result) == 1) {
    $_SESSION['logged_in'] = true;
    //logged in. now let's check if they are an admin.
    $sql = "SELECT * FROM `personal info` WHERE email = '$email' "; //potentially vulnerable to SQL injection
    $result = mysqli_query($connect,$sql);
    $assoc = mysqli_fetch_assoc($result);
    if ($assoc['Approved'] == 'Y') {
        $_SESSION['approved'] = true;
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
    } 
    elseif ($assoc['Approved'] == 'N') {
        $_SESSION['approved'] = false;
        $_SESSION['logged_in'] = true;        
        echo "Your request is currently in review / disapproved";
    }
    elseif($assoc['role'] == 'admin')
    {
        $_SESSION['logged_in'] = true;
        $_SESSION['role'] = true;
    }
    elseif($assoc['role'] == 'user'){
        $_SESSION['role'] = false;
        $_SESSION['logged_in'] = true;        
    }
//redirect
    
} else {
    echo '<h1>User not found or invalid password.</h1>';
    }

} 
else {
echo 'Redirected Back From Admin Due to Lack of Permissions';
}?>