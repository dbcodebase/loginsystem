<?php 
session_start();
$get_user_token = $_SESSION["token"];
$redirect_url = 'http://'.$_SERVER['HTTP_HOST'];


if (isset($get_user_token)) {
require_once('data-autho.php');
//user details
$checku   = mysqli_query($con,"SELECT * FROM user WHERE user_id='$get_user_token'");
$valueu = mysqli_fetch_array($checku);
$uemail   = $valueu['email']; 
$ufullname   = $valueu['fullname'];   
$key   = $valueu['user_key'];   
// $p_key   = $valueu['p_key'];   
$kyc_status   = $valueu['kyc_status'];   
$role   = $valueu['role']; 

  
//balnace details
$base_url = "http://ec2-18-188-89-177.us-east-2.compute.amazonaws.com/api/v1"; 
$url = $base_url."/getxlmbalance?PublicKey=$key";
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$output = json_decode($response, true);
$kwdblance = $output['tokenbalance'];
$xlmbalance = $output['xlmbalance'];
}
else{
    header("location:$redirect_url/bitcoin/signin");
}


?>