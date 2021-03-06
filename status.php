<?php
include "vendor/autoload.php";
use Yellow\Bitcoin\Invoice;
include("keys.php");
$id = $_GET["id"];
$y = new Invoice($api_key, $api_secret);
$status = $y->checkInvoiceStatus($id); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <title>status page</title>
</head>
<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <div class="inner cover">
                <h1 class="cover-heading">Invoice payment detected</h1>
                <div align="center"
                     style="width:393px; height:22px; overflow:hidden; border:none; margin:auto; display:block; padding-top:30px;">
                    <a href="/">New invoice</a>
                </div>
                <div class="center">
                    <pre>
                        <?php var_dump($status); ?>
                    </pre>
                </div>
            </div>
            <div class="mastfoot">
                <div class="inner">
                    <p>Demo powered by <a href="https://yellowpay.co">Yellow</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>