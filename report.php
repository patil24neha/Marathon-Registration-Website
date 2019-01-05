<?php
/* Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 */

if (isset($_POST['submit']))
{

$pass = $_POST['pass'];
$valid = false;

$raw = file_get_contents('password.dat');
$data = explode("\n",$raw);
  
		if((crypt($pass,$data[0])) === trim($data[0]))
		$valid = true;  
		else if(crypt($pass,$data[1]) === trim($data[1]))
		$valid = true; 
		else if(crypt($pass,$data[2]) === trim($data[2]))
		$valid = true; 
		
		else
		$valid = false;
	
if($valid)
{
include('helpers.php');

$db = get_db_handle();
$res = "success";

if($db) {   
    
	$sql = "select CONCAT(lname,', ',fname) AS Name, TIMESTAMPDIFF(YEAR,dob,CURDATE()) AS Age , experience, profilepic AS ProfileImage , category from Runner order by lname ;";    
    
	$result = mysqli_query($db, $sql);
    if(!result)
        echo "ERROR in query".mysqli_error($db);
    
	
echo '<!DOCTYPE html><html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Report Login</title> 
	<link rel="stylesheet" href="MyCSS.css">
	<script src="MyJavaScript.js"></script>	
	
</head>
<body>
<div id="header"></div><h3>Runner Report</h3><br> <h3>1. Teen Runners</h3>';

//Teen Runners
echo "<table>\n";
echo "<tr><th>Name</th><th>Age</th><th>Experience</th><th>Profile Image</th></tr>";
		

while($row1 = mysqli_fetch_array($result)) 
{
		
		if($row1['category'] == "Teen")
		 {
			echo "<tr>\n";
			echo "<td>".$row1['Name']."</td>";
			echo "<td>".$row1['Age']."</td>";
			echo "<td>".$row1['experience']."</td>";
			echo '<td><img src="http://jadran.sdsu.edu/~jadrn045/proj3/rim_&e$/'.$row1['ProfileImage'].'" width="100px"/></td>';
			echo "</tr>\n";	
		}
}

echo "</table> <br> <h3>2. Adult Runners</h3><table>";
echo "<tr><th>Name</th><th>Age</th><th>Experience</th><th>Profile Image</th></tr>";
$result1 = mysqli_query($db, $sql);
  if(!result1)
    echo "ERROR in query".mysqli_error($db);		
while($row = mysqli_fetch_array($result1)) 
{
		
		if($row['category'] == "Adult")
		 {
			echo "<tr>\n";
			echo "<td>".$row['Name']."</td>";
			echo "<td>".$row['Age']."</td>";
			echo "<td>".$row['experience']."</td>";
			echo '<td><img src="http://jadran.sdsu.edu/~jadrn045/proj3/rim_&e$/'.$row['ProfileImage'].'" width="100px"/></td>';
			echo "</tr>\n";
			
		}
}

echo "</table> <br> <h3>3. Senior Runners</h3>";
//Senior Runners		
echo "<table>\n";
echo "<tr><th>Name</th><th>Age</th><th>Experience</th><th>Profile Image</th></tr>";
		
$result2 = mysqli_query($db, $sql);
   if(!result2)
     echo "ERROR in query".mysqli_error($db);
while($row2 = mysqli_fetch_array($result2)) 
{
		
		if($row2['category'] == "Senior")
		 {
			echo "<tr>\n";
			echo "<td>".$row2['Name']."</td>";
			echo "<td>".$row2['Age']."</td>";
			echo "<td>".$row2['experience']."</td>";
			echo '<td><img src="http://jadran.sdsu.edu/~jadrn045/proj3/rim_&e$/'.$row2['ProfileImage'].'" width="100px"/></td>';
			echo "</tr>\n";	
		}
}
echo '</table> <br> <div id="footer"></div>
</body>
</html>';
		
    mysqli_close($db);

	
}
}
    
else
    $res = "Incorrect";     
}
?>



<?php if (isset($res) && $res == "Incorrect") {  ?>
        <?php echo '<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Report Login</title> 
	<link rel="stylesheet" href="MyCSS.css">
	<script src="MyJavaScript.js"></script>	
	
</head>
<body>
<div id="header"></div>
<h3>Runner Report Login</h3>
<div id="login">

<form action="" method="post" >

<span class="bold info">Enter Password  </span><input type="password" name="pass" size="15" id="password"/>
 <br><br>
<input type="reset" class="btn btn-primary btn-lg">
<input type="submit"  value="Login" name="submit" class="btn btn-primary btn-lg"/><br><h3>Incorrect Password.</h3></form></div></body></html>'; ?>

<?php 
}
if (!isset($res)) {
echo '<!DOCTYPE html><html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Report Login</title> 
	<link rel="stylesheet" href="MyCSS.css">
	<script src="MyJavaScript.js"></script>	
	
</head>
<body>
<div id="header"></div>
<h3>Runner Report Login</h3>
<div id="login">

<form action="" method="post" >
<span class="bold info">Enter Password  </span><input type="password" name="pass" size="15" id="password"/>
 <br><br>
<input type="reset" class="btn btn-primary btn-lg">
<input type="submit"  value="Login" name="submit" class="btn btn-primary btn-lg"/>

</form>  
</div>

</body>
</html>
';
} 
?>

