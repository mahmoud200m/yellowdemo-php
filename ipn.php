<?php
include "vendor/autoload.php";
use Yellow\Bitcoin\Invoice;
include("keys.php");
$yellow     = new Invoice($api_key,$api_secret);
$body       = file_get_contents("php://input") ;
$url        = $yellow->getCurrentUrl(); //// or you can use your own method
$sign       = $_SERVER["HTTP_API_SIGN"];
$api_key    = $_SERVER["HTTP_API_KEY"];
$nonce      = $_SERVER["HTTP_API_NONCE"];
$isValidIPN = $yellow->verifyIPN($url,$sign,$api_key,$nonce,$body); //bool
$log_file   = "ipn.log";
if($isValidIPN){
    file_put_contents($log_file , "is valid IPN call\n " , FILE_APPEND);
    /// you can update your order , log to db , send email etc
    header("HTTP/1.0 200 OK");
}else{
    file_put_contents($log_file , "is invalid IPN call\n " , FILE_APPEND);
    /// invalid/ fake IPN , no need to do anything
    header("HTTP/1.1 403 Unauthorized");
}