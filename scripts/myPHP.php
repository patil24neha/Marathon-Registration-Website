<?php
/* Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 */


function isValidState($state) {                                
 $stateList = array("AK","AL","AR","AZ","CA","CO","CT","DC","DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA","MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ","NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX","UT","VA","VT","WA","WI","WV","WY");
    for($i=0; $i<count($stateList); ++$i) 
  {      if($stateList[$i] == trim($state))
            return true;
   }
   return false;
 }
 
function validate_data($params) {
    $msg = "";
	$allowedExt = array('gif','png','jpg','jpeg','tiff','bmp');
	$extn = strtolower(pathinfo($params[20]['name'], PATHINFO_EXTENSION));
	
    if(strlen($params[0]) == 0)
        $msg = "Enter your First Name";  
    else if(strlen($params[2]) == 0)
         $msg = "Enter your Last Name"; 
    else if(strlen($params[3]) == 0)
        $msg = "Enter your address"; 
    else if(strlen($params[6]) == 0)
        $msg = "Enter your city";                        
    else if(strlen($params[7]) == 0)
        $msg = "Enter your state";
	else if (!isValidState($params[7]))
		$msg = "Invalid State, use the two letter code";
	else if(strlen($params[8]) == 0)
        $msg = "Enter your zipcode";
	else if(!is_numeric($params[8])) 
        $msg = "Zip zode should be numbers";
    else if(strlen($params[8]) != 5) 
        $msg = "The zip code must have exactly five digits";
    else if(strlen($params[9]) == 0)
        $msg = "Enter your email Id";
    else if(!filter_var($params[9], FILTER_VALIDATE_EMAIL))
        $msg = "Invalid email format";        
      else if(strlen($params[10]) == 0)
        $msg = "Enter your phone number";
    else if(!preg_match("/^\d{3}-\d{3}-\d{4}$/",$params[10]))
        $msg = "Phone no must have exactly ten digits"; 
	else if(strlen($params[11]) == 0)
		$msg = "Select your gender";
		
	else if(strlen($params[12]) == 0)
		$msg = "Enter month";
	else if(!is_numeric($params[12])) 
        $msg = "Month should be numbers";	
	else if(strlen($params[12]) != 2) 
        $msg = "Month must have exactly two digits";
		
	else if(strlen($params[13]) == 0)
		$msg = "Enter day";
	else if(!is_numeric($params[13])) 
        $msg = "Day should be numbers";	
	else if(strlen($params[13]) != 2) 
        $msg = "Day must have exactly two digits";
		
	else if(strlen($params[14]) == 0)
		$msg = "Enter year";
	else if(!is_numeric($params[14])) 
        $msg = "Year should be numbers";
	else if(strlen($params[14]) != 4) 
        $msg = "Year must have exactly four digits";
		
	else if(!checkdate($params[12],$params[13],$params[14])) 
        $msg = "Invalid Date";
	
	else if ( (date_create($params[15])->diff(date_create('today'))->y) < 14 || (date_create($params[15])->diff(date_create('today'))->y) > 99)
		$msg = "Age should be between 14 and 99 years";
	
	else if(strlen($params[17]) == 0)
		$msg = "Select your category";
	
	else if(((date_create($params[15])->diff(date_create('today'))->y)<=21 && $params[17] != "Teen") ||
			((date_create($params[15])->diff(date_create('today'))->y)>21 && (date_create($params[15])->diff(date_create('today'))->y)<60 && $params[17] != "Adult")  ||
			((date_create($params[15])->diff(date_create('today'))->y)>=60 && $params[17] != "Senior") )
		$msg = "Select correct category";
	
	
	else if(strlen($params[18]) == 0)
		$msg = "Select your Experience level";
	

	else if(strlen($params[20]['name']) == 0)
	$msg = "Select an Image";
    
	else if(!in_array($extn,$allowedExt)) 
	$msg = "Allowed file extensions are gif, png, jpg, jpeg, tiff, bmp";

	else if (($params[20]['size']) > 1000000 || ($params[20]['size']) == 0)
	$msg = "File is too big, 1 MB max";
	
	else 
	$msg = "";
	if($msg) {
        write_form_error_page($msg);
        exit;
        }
    }

function write_form_error_page($msg) {
    write_header();
	write_form();
	echo '<div class="phperror" id="error">',$msg,"</div>";
	write_footer();
    }  
    
function write_form() {
    print <<<ENDBLOCK
<div class="container"><h3>Registration Form</h3>
    
<fieldset>
<form action="process_request.php" name="signupForm" id="signupForm" method="post" enctype="multipart/form-data">

<label for="Fname" class="required">First Name</label> <input type="text" name="Fname" size="15" id="Fname" value="$_POST[Fname]" autofocus />
<label for="Mname">Middle Name</label> <input type="text" name="Mname" size="15" id="Mname" value="$_POST[Mname]"/>
<label for="Lname" class="required">Last Name</label> <input type="text" name="Lname" size="15" id="Lname"  value="$_POST[Lname]"/>
<br>
<span class="error" id="fname_err"></span>
<span class="error" id="lname_err"></span>
<br>

<label class="required">Address</label>
<input type="text" name="address1" size="50" id="address1" value="$_POST[address1]"/>
<span class="error" id="add_err"></span><br><br>
<input type="text" name="address2" size="50" id="address2" value="$_POST[address2]"/>
<br><br>

<label for="city" class="required">City</label> <input type="text" name="city" size="20" id="city" value="$_POST[city]"/>
<label for="state" class="required">State</label> <input type="text" name="state" size="4" maxlength="2" id="state" value="$_POST[state]"/>
<span class="error" id="state_err"></span>
<br>
<span class="error" id="city_err"></span>

<br>
<label for="zip" class="required">Zipcode</label> <input type="text" name="zip" size="10" maxlength="5" id="zip" placeholder=" #####" value="$_POST[zip]"/>
<span class="error" id="zip_err"></span>
<br>
<br>

<label for="email" class="required">E-mail</label><input type="text" name="email" id="email" size="25" placeholder=" abc@domain.com" value="$_POST[email]"/>
<label class="input required" for="contactno">Phone Number</label><input type="text" name="contactno" id="contactno" size="15" maxlength="12"  placeholder=" ##########" value="$_POST[contactno]"/><span class="error" id="phone_err"></span><br>
<span class="error" id="email_err"></span>

<br>

<label class="required">Gender </label>
ENDBLOCK;

echo '<input type="radio" name="gender" value="male" id="male"'; if ($_POST["gender"] == "male") echo "checked >"; else echo ">";

print <<<ENDBLOCK
<div class="text">Male</div>
ENDBLOCK;

echo '<input type="radio" name="gender" value="female"';  if ($_POST["gender"] == "female") echo "checked >"; else echo ">";

print <<<ENDBLOCK
<div class="text">Female</div>
ENDBLOCK;

echo '<input type="radio" name="gender" value="other" ';  if ($_POST["gender"] == "other") echo "checked >"; else echo ">";

print <<<ENDBLOCK
<div class="text">Other</div>
<span class="error" id="gender_err"></span>
<br><br>
  
<label class="required">Date of Birth</label>
<input type="text" id="month" size="2" name="month" maxlength="2" placeholder=" mm" value="$_POST[month]"/>
<input type="text" id="day" size="2" name="day" maxlength="2" placeholder=" dd" value="$_POST[day]"/>
<input type="text" id="year" size="4"  name="year" maxlength="4" placeholder=" yyyy" value="$_POST[year]"/>  
<span class="error" id="dob_err"></span>
<br>
<div class="align">
<div class="text">Month</div>
<div class="text">Day</div>  
<div class="text">Year</div> 
</div>
<br>

<label for="medicalcondt">Medical Condition </label>
<textarea name="medicalcondt" cols="40" rows="6" id="medicalcondt" placeholder=" Enter text here...">$_POST[medicalcondt]</textarea>
<br><br>
    
<label for="category" class="required" >Category</label>
<select name="category" id="category">
ENDBLOCK;

echo '<option value=""'; if($_POST["category"] == "") echo " selected >"; else echo ">"; 
echo "Select one..</option>";

echo '<option value="Teen"'; if($_POST["category"] == "Teen") echo " selected >"; else echo ">";
echo "Teen (14-21 years)</option>";

echo '<option value="Adult"'; if($_POST["category"] == "Adult") echo " selected >"; else echo ">";
echo "Adult (21-60 years)</option>";

echo '<option value="Senior"'; if($_POST["category"] == "Senior") echo " selected >"; else echo ">";
echo "Senior (60-99 years)</option>";

print <<<ENDBLOCK
</select>
<span class="error" id="cat_err"></span>
<br><br>

<label for="experience"><span class="required">Experience</span> level </label>
<select name="experience" id="experience">
ENDBLOCK;

   echo '<option value=""'; if($_POST["experience"] == "") echo " selected >"; else echo ">";
   echo "Select one..</option>";
   
    echo '<option value="Novice"'; if($_POST["experience"] == "Novice") echo " selected >"; else echo ">";
	echo "Novice</option>";
    
	echo '<option value="Experienced"'; if($_POST["experience"] == "Experienced") echo " selected >"; else echo ">";
	echo "Experienced</option>";
	
    echo '<option value="Expert"'; if($_POST["experience"] == "Expert") echo " selected >"; else echo ">";
	echo "Expert</option>";

print <<<ENDBLOCK
</select>
<span class="error" id="exp_err"></span>
<br><br>

<span class="required" id="star"></span>
<input type="file" name="picture" accept="image/*" id="pic" />
<input type="button" id="imgbutton" value="Upload" class="btn"/>
<span class="error" id="img_err"></span>
<br><br>

<input id="resetb" type="reset" class="btn btn-primary btn-lg">
<input type="submit" id="submitb" value="Submit" class="btn btn-primary btn-lg"/><span id="pict"></span>

</form>  
<h3 id="status">&nbsp;</h3>
ENDBLOCK;
}                        

function process_parameters($params) {
    global $bad_chars;
    $params = array();
    $params[] = trim(str_replace($bad_chars, "",$_POST['Fname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['Mname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['Lname']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address1']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['address2']));
    
	$params[] = trim(str_replace($bad_chars, "",$_POST['address1'])) . ' ' . trim(str_replace($bad_chars, "",$_POST['address2']));
    
	$params[] = trim(str_replace($bad_chars, "",$_POST['city']));
    $params[] = strtoupper(trim(str_replace($bad_chars, "",$_POST['state'])));
    $params[] = trim(str_replace($bad_chars, "",$_POST['zip']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['email']));
	$params[] = preg_replace("/(\d{3})(\d{3})(\d{4})/", "$1-$2-$3", trim(str_replace($bad_chars, "",$_POST['contactno'])));
   
    $params[] = trim(str_replace($bad_chars, "",$_POST['gender']));
	
    $params[] = trim(str_replace($bad_chars, "",$_POST['month']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['day']));
	$params[] = trim(str_replace($bad_chars, "",$_POST['year']));
	
	$params[] = trim(str_replace($bad_chars, "",$_POST['year'])).'-'.trim(str_replace($bad_chars, "",$_POST['month'])).'-'.trim(str_replace($bad_chars, "",$_POST['day']));
    
	$params[] = trim(str_replace($bad_chars, "",$_POST['medicalcondt']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['category']));
    $params[] = trim(str_replace($bad_chars, "",$_POST['experience']));
    $params[] = trim(str_replace($bad_chars, "",$_FILES['picture']['name']));
	$params[] = $_FILES['picture'];
	$path_parts = pathinfo($params[19]);
	$params[] = $path_parts['filename'].'_'.$params[10].'.'.$path_parts['extension'];
    
	
    return $params;
    }
    
function store_data_in_db($params) {
   
    $db = get_db_handle();  
	
 if($db)
{ 
$firstname = mysqli_real_escape_string($db, $params[0]);
$middlename = mysqli_real_escape_string($db, $params[1]);
$lastname = mysqli_real_escape_string($db, $params[2]);
$address = mysqli_real_escape_string($db, $params[5]);
$city = mysqli_real_escape_string($db, $params[6]);
$email = mysqli_real_escape_string($db, $params[9]);
$medicalcondt = mysqli_real_escape_string($db, $params[16]);

    $sql = "INSERT INTO Runner VALUES('$firstname','$middlename','$lastname','$address','$city','$params[7]','$params[8]','$email','$params[10]','$params[11]','$params[15]','$medicalcondt','$params[17]','$params[18]','$params[21]');";
   
    mysqli_query($db,$sql);
  
	if(mysqli_affected_rows($db) <= 0)
	$res = "Error : ".mysqli_error($db);
	else 
	$res = "Success";	
	
  close_connector($db);
  return $res;
	
 }
 }
        
?>   