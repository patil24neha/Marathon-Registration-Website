<?php
/* Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 */

    $UPLOAD_DIR = 'rim_&e$/';
    $COMPUTER_DIR = '/home/jadrn045/public_html/proj3/rim_&e$/'; 
	$mobno = $_POST['contactno'];
    $message = "";
	$path_parts = pathinfo($_FILES["picture"]["name"]);
	$fname = $path_parts['filename'].'_'.$mobno.'.'.$path_parts['extension'];
    $allowedExt = array('gif','png','jpg','jpeg','tiff','bmp');
	$extn = strtolower($path_parts['extension']);
	
	
	if(strlen($_FILES['picture']['name']) == 0)
	$message = "Select an Image";
    
	else if($_FILES['picture']['error'] > 0) 
		{
    	$err = $_FILES['picture']['error'];	
        $message = "Error Code: $err ";
        } 

	else if(!in_array($extn,$allowedExt)) 
	$message = "Allowed file extensions are gif, png, jpg, jpeg, tiff, bmp";

	else if (($_FILES["picture"]['size']) > 1000000 || ($_FILES["picture"]['size']) == 0)
	$message = "File is too big, 1 MB max";		
   
	else 
		{
        move_uploaded_file($_FILES['picture']['tmp_name'], "$UPLOAD_DIR".$fname);
        $message = "Success! Your file has been uploaded to the server";
		}         
   
   echo $message;
	        

?>  
