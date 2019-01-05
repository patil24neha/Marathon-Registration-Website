<?php
/* Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 */

if($_GET) exit;
if($_POST) exit;

$pass = array('cs545','fall2018','msincs');

#### Using SHA256 #######
$salt='$5$R$4%$n2e4ha7p9t3';  # 12 character salt starting with $1$
		
for($i=0; $i<count($pass); $i++) 
     echo crypt($pass[$i],$salt)."\n";
?>
		