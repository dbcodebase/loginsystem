<?php

require_once('data-autho.php');

$sql="SELECT * FROM user WHERE email='$email' and password = '$password' and status = 'active'";

$result=mysqli_query($con,$sql);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$count=mysqli_num_rows($result);



