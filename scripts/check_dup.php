<?php
/* Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 */

include('helpers.php');

$db = get_db_handle();
if($db)
{
$email =$_GET['email'];
$contact =$_GET['contactno'];
$sql = "select * from Runner where email='$email' or contactno='$contact';";
mysqli_query($db, $sql);
$how_many = mysqli_affected_rows($db);
close_connector($db);

if($how_many > 0)
    echo "dup";
else if($how_many == 0)
    echo "OK";
else
    echo "ERROR, failure ".mysqli_error($db);
}
	
?>