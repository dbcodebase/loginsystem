<?php
if (isset($_POST['recover'])) {
	 require_once('controller/data-autho.php');
	 $confirm=htmlspecialchars($_POST['confirm']);
	 $password=md5($confirm);
	 $req=htmlspecialchars($_GET['token']);
	 //access get//
	 $check   = mysqli_query($con,"SELECT * FROM create_token WHERE token='$req'");
	$value = mysqli_fetch_array($check);
	$email_get   = $value['email'];

	//update password//
	 $update = "UPDATE `user` SET `password` = '$password' WHERE email='$email_get'";
    $sql_update = mysqli_query($con, $update);
    //update status//
	 $update_req = "UPDATE `create_token` SET `status` = '1' WHERE token='$req'";
    $sql_update_req = mysqli_query($con, $update_req);
    header("location:../../signin?succ");
}
else{
	echo "Access Denied";
}