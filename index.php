<?php
session_start();
error_reporting(0);
include('admin/include/dbconnection.php');

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "select ID from tbluser where  username='$username' && Password='$password' ");
	$query_admin = mysqli_query($con, "select admin_yn from tbluser where  username='$username' && Password='$password' ");
	$ret_admin = mysqli_fetch_array($query_admin);
	$ret = mysqli_fetch_array($query);
	if ($ret > 0) {
		$_SESSION['logid'] = $ret['ID'];
		$_SESSION['admin_ind'] = $ret_admin['admin_yn'];
		header('location:admin/dashboard.php');		
	} else {
		$msg = "Invalid Details.";
	}
}
?>
<!DOCTYPE html dir="rtl">
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,  shrink-to-fit=yes">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<title>فريق المصدر | دخول</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
<script type="text/javascript" data-cfasync="false">
 var _foxpush = _foxpush || [];
 _foxpush.push(['_setDomain', 'sitilcruumybluehostme']);
 (function(){
     var foxscript = document.createElement('script');
     foxscript.src = '//cdn.foxpush.net/sdk/foxpush_SDK_min.js';
     foxscript.type = 'text/javascript';
     foxscript.async = 'true';
     var fox_s = document.getElementsByTagName('script')[0];
     fox_s.parentNode.insertBefore(foxscript, fox_s);})();
 </script>
 
</head>

<body>

	<div class="row">
		<h2 align="center"> <img src="img/logo.png" height=100 width=100>فريق المصدر</h2>
		<hr />
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading" align="right">دخول</div>
				<div class="panel-body">
					<p style="font-size:16px; color:red" align="center"> <?php if ($msg) {
																				echo $msg;
																			}  ?> </p>
					<form role="form" action="" method="post" id="" name="login">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="اسم المستخدم" name="username" type="username" autofocus="" required="true">
							</div>
							<!-- LATER1612
							<a href="forget-password.php">Forgot Password?</a>
																		-->
							<div class="form-group">
								<input class="form-control" placeholder="كلمه المرور" name="password" type="password" value="" required="true">
							</div>
							<div class="checkbox">
<!--								<button type="submit" value="login" name="login" class="btn btn-primary">login</button><span style="padding-left:250px">
																		-->
																		<a href="register.php" class="btn btn-primary"> مستخدم جديد</a></span>
																		<input type="submit" value="دخول" name="login" class="btn btn-primary">
									
									<!--
										<input type="image" src="img/sa.png"  name="arlogin" class="btn btn-primary"
									height="35"  >
									
									<a href="arindex.php" ><label for="arlogin">عربي</label></a>
																		-->

							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>

</html>