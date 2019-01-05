<!DOCTYPE html>
<html>
<!-- Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Confirmation Page</title> 
    <link rel="stylesheet" href="MyCSS.css">
    <script src="MyJavaScript.js"></script> 

</head>
<body>


<div id="confirmhead"><a href="index.html"><img src="logo.png" width="100" height="auto"></a><h1>Run to Live. Live to Run.</h1>
<a href="Signup.html"><button type="button" class="btn btn-primary btn-lg right">Sign Up</button></a>
</div>
<br>

<?php
$name=$params[0].' '.$params[2];

echo <<<ENDBLOCK
    <h3>$name, thank you for registering.</h3>
    <table>

        <tr>
            <td>Address</td>
            <td>$params[5]</td>
        </tr>
        <tr>
            <td>City</td>
            <td>$params[6]</td>
        </tr>
        <tr>
            <td>State</td>
            <td>$params[7]</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>$params[8]</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>$params[9]</td>
        </tr>
        <tr>
            <td>Contact No</td>
            <td>$params[10]</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>$params[11]</td>
        </tr>
        <tr>
            <td>Date Of Birth</td>
            <td>$params[15]</td>
        </tr>
        <tr>
            <td>Medical Condition</td>
            <td>$params[16]</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>$params[17]</td>
        </tr>
        <tr>
            <td>Experience Level</td>
            <td>$params[18]</td>
        </tr>     
        <tr>
            <td>Profile Image</td>
            <td>$params[19]</td>
        </tr>        
    </table>                          
ENDBLOCK;


?>

<br><br>
<div id="footer"><p>@    2017 SDSU Marathon<span class="space"><i class="glyphicon glyphicon-envelope"></i>                	sdsumarathon@sdsu.com</span><span class="space"><i class="glyphicon glyphicon-earphone"></i>          		(123)456-7890</span></p></div>

</body></html>