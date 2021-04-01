<?php

//method check

if ($_SERVER['REQUEST_METHOD'] == 'POST')

{

    //connection setup//

    require_once ('controller/data-autho.php');

    //getting input//

    $email=mysqli_real_escape_string($con,$_POST['email']); 

	$password=mysqli_real_escape_string($con,$_POST['password']); 
    $password=md5($password);

    //count value//

    require_once ('controller/check.php');

    if ($count==1) {

    //mysql query get token userid//	

    $check   = mysqli_query($con,"SELECT * FROM user WHERE email='$email'");

	$value = mysqli_fetch_array($check);

	$token   = $value['user_id'];	



    //when data on database//

    $response = array(

        "status" => "success",

        "token" => "$token",

        "response" => "Welcome"

    );



    }else{

    	 //not on database credentials error represent

    $response = array(

        "status" => "error",

        "response" => "Enter Correct Authorization Email Or Password"

    );

    

}

}

else

{

    //method check error represent

    $response = array(

        "status" => "error",

        "response" => "Access Denied Method Not Allowed"

    );

}



//Json decode

echo json_encode($response);



