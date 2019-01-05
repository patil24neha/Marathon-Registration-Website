<?php
/* Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 */

$bad_chars = array('$','%','?','<','>','php');

function check_post_only() {
if(!$_POST) {
    write_error_page("This scripts can only be called from a form.");
    exit;
    }
}

function write_error_page($msg) {
    write_header();
    echo "<h2>Sorry, an error occurred<br />",
    $msg,"</h2>";
    write_footer();
    }
    
function write_header() {
print <<<ENDBLOCK

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Sign UP</title> 
    <link rel="stylesheet" href="MyCSS.css">
    <script src="MyJavaScript.js"></script> 
    
</head>
<body>
<div id="header"><a href="index.html"><img src="logo.png" width="100" height="auto"></a><h1>Run to Live. Live to Run.</h1></div>

ENDBLOCK;
}

function write_footer() {
    echo '  </fieldset> </div> 
<div id="footer"><p>@    2017 SDSU Marathon<span class="space"><i class="glyphicon glyphicon-envelope"></i>                	sdsumarathon@sdsu.com</span><span class="space"><i class="glyphicon glyphicon-earphone"></i>          		(123)456-7890</span></p></div></body></html>';
    }
    
function get_db_handle() {
          
    $server = 'opatija.sdsu.edu:3306';
    $user = 'jadrn045';
    $password = 'success';
    $database = 'jadrn045';   

	$db = mysqli_connect($server, $user, $password, $database);   
    if(!($db)) 
	{
	echo 'SQL ERROR: Connection failed : '.mysqli_connect_error();
		}
    else
    {
    return $db;
   
    }
}        
       
function close_connector($db) {
    mysqli_close($db);
    }
    
?>