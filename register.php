<?php

//method check

if ($_SERVER['REQUEST_METHOD'] == 'POST')

{

    //connection setup//

    require_once ('controller/data-autho.php');

    //getting input//

    $fullname = htmlspecialchars($_POST['fullname']);

    $email = htmlspecialchars($_POST['email']);

    $password = htmlspecialchars(md5($_POST['password']));

    //count value//

    require_once ('controller/verify.php');

    //empty data check//

    if (empty($fullname))

    {

        $response = array(

            "status" => "error",

            "response" => "Enter Your Full Name"

        );

    }

    elseif (empty($email))

    {

        $response = array(

            "status" => "error",

            "response" => "Enter Your Email Address"

        );

    }

    elseif (empty($password))

    {

        $response = array(

            "status" => "error",

            "response" => "Enter Your Password"

        );

    }

    elseif ($count == '1')

    {

        $response = array(

            "status" => "error",

            "response" => "Already You Have Account"

        );

    }

    else

    {

        //insert query run here//

        $user_id = uniqid();

        $insert = "INSERT INTO `user`(`id`, `user_id`, `fullname`, `email`, `password`) VALUES  (null,'" . $user_id . "','" . $fullname . "','" . $email . "','" . $password . "')";

        $query = mysqli_query($con, $insert);

        //response//

        $response = array(

            "status" => "success",

            "response" => "Account Created Successfully",

            "token" => "$user_id"

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



