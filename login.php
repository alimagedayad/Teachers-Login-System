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
            <form action="do_login.php" method="POST">
            <h4>Check your approval</h4>
            <input type="text" name="email_l" id="email" class="form-control input-sm chat-input" placeholder="email" />
            </br>
            <input type="text" name="tel_l" id="tel" class="form-control input-sm chat-input" placeholder="telephone number" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <button type="submit" class="btn btn-primary btn-md" name = "submit_l" role="submit">Check<i class="fa fa-sign-in"></i></button>
                <br><br>
                <button type="button" onclick="location.href='register.php';" class="btn btn-default  btn-md" name = "login_l" role="submit">Submit New Proposal / Register<i class="fa fa-plus"></i></button>
                <br><br>
                <button type="button" onclick="location.href='invite.php';" class="btn btn-default onclick="location.href='invite.php';" btn-md" name = "invite" role="submit">Invite Your Friends<i class="fa fa-paper-plane"></i></button>
            </span>
            </div>
            </div>
        	</form>
        </div>
    </div>
</div>