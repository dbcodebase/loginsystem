<?php

$check   = mysqli_query($con,"SELECT * FROM user WHERE user_id='$get_token'");

$value = mysqli_fetch_array($check);

$email_get   = $value['email'];	

$fullname_get   = $value['fullname'];	

$user_key   = $value['user_key'];	

$p_key   = $value['p_key'];	

$ac_status = $value['status'];
