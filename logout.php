<?php
session_start();
if(session_destroy())
{
	$redirect_url = 'http://'.$_SERVER['HTTP_HOST'];	
    header("location:$redirect_url/bitcoin/signin");
}
?>