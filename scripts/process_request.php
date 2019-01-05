<?php
/* Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 */

include('helpers.php');
include('myPHP.php');

check_post_only();
$params = process_parameters();
validate_data($params);

$res = store_data_in_db($params);
if ((substr($res, 0, 5)) == "Error")
write_form_error_page("Insertion ".$res);

else
include('Confirmation.php');

?>  