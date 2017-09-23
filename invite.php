<?php
include('header.php');
?>

<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Roboto:400);
body {
  background-color:#fff;
  -webkit-font-smoothing: antialiased;
  font: normal 14px Roboto,arial,sans-serif;
}

.container {
    padding: 25px;
    position: fixed;
}

.form-login {
    background-color: #EDEDED;
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px;
    border-color:#d2d2d2;
    border-width: 5px;
    box-shadow:0 1px 0 #cfcfcf;
}

h4 { 
 border:0 solid #fff; 
 border-bottom-width:1px;
 padding-bottom:10px;
 text-align: center;
}

.form-control {
    border-radius: 10px;
}

.wrapper {
    text-align: center;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-4">
            <div class="form-login" >
            <form action="" method="POST">
            <h4>Invite Your Friend</h4>
            <input type="text" name="email_ll" id="email" class="form-control input-sm chat-input" placeholder="email" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <button type="submit" class="btn btn-primary btn-md" name = "submit_l" role="submit">Rollup the invite<i class="fa fa-sign-in"></i></button>
                <br><br>
            </span>
            </div>
            </div>
        	</form>
        </div>
    </div>
</div>
<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer();
try {
    //Server settings
    //error_reporting(0);     
    //$mail->SMTPDebug = false;     
    //$mail->do_debug = 0;                            // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'apikey';                 // SMTP username
    $mail->Password = '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';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $email = empty($email);
    $email = isset($_POST['email_ll']) ? $_POST['email_ll'] : '';
    $mail->setFrom('ali@ig.academy', 'Ali from IG Academy');
    $mail->addAddress($email);     // Add a recipient              // Name is optional
    $mail->addReplyTo('ali@ig.academy', 'Ali');
    $mail->addCC('alimagedayad@outlook.com');

    //Attachments
#    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 #   $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Subject';
    $mail->Body    = 'This is the HTML message body <b>in bo!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>