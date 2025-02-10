<!-- how to make an API request using curl -->
<?php
$url = "https://jsonplaceholder.typicode.com/posts";
$ch = curl_init($url); // initialize curl
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // set option for return transfer
$result = curl_exec($ch); // execute curl
curl_close($ch); // close curl
echo $result;
?>

<!-- Sending headers in an API request using PHP -->
<!-- use CURLOPT_HTTPHEADER -->