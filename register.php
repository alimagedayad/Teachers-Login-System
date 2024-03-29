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
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login" >
            <form action="do_register.php" method="POST">
            <h4>Register</h4>
            <input type="text" name="username" id="username" class="form-control input-sm chat-input" placeholder="username" />
            </br>
            <input type="text" name="subject" id="subject" class="form-control input-sm chat-input" placeholder="subject" />
            </br>
            <input type="text" name="email" id="email" class="form-control input-sm chat-input" placeholder="email" />
            </br>
            <input type="text" name="tel" id="tel" class="form-control input-sm chat-input" placeholder="telephone number" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <button type="submit" class="btn btn-primary btn-md" name="submit" role="submit">Register <i class="fa fa-sign-in"></i></button>
            </span>
            </div>
            </div>
        	</form>
        </div>
    </div>
</div>