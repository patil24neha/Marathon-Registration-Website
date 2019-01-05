/* Code developed by Patil, Neha
Project #3
Fall 2017
Username : jadrn045, 
RED ID : 821545485 */

$(document).ready( function() {

document.getElementById("header").innerHTML = ('<a href="index.html"><img src="logo.png" width="100" height="auto"></a><h1>Run to Live. Live to Run.</h1>');

document.getElementById("footer").innerHTML =('<p>@    2017 SDSU Marathon<span class="space"><i class="glyphicon glyphicon-envelope"></i>                	sdsumarathon@sdsu.com</span><span class="space"><i class="glyphicon glyphicon-earphone"></i>          		(123)456-7890</span></p>');
 
/*Countdown Timer referenced : https://www.w3schools.com/howto/howto_js_countdown.asp*/ 
if(document.getElementById("countdown")) { 
var timerDate = new Date("Dec 3, 2017 08:00:00").getTime();
var i = setInterval(function() 
{
    var now = new Date().getTime();
    var difference = timerDate - now;
    var days = Math.floor(difference / (1000 * 60 * 60 * 24));
    var hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((difference % (1000 * 60)) / 1000); 

	document.getElementById("days").innerHTML = ('0' + days).slice(-2);
	document.getElementById("hours").innerHTML = ('0' + hours).slice(-2);
	document.getElementById("minutes").innerHTML = ('0' + minutes).slice(-2);
	document.getElementById("seconds").innerHTML = ('0' + seconds).slice(-2);
	
    if (difference < 0) {
        clearInterval(i);
        document.getElementById("countdown").innerHTML = "EXPIRED";
    }
}, 1000);
}


var today = new Date();
var age;
var size=0;
var extension; 
var allowedExt;

var fname_err = false;
var lname_err = false;
var add_err = false;
var city_err = false;
var state_err = false;
var zip_err = false;
var email_err = false;
var phone_err = false;
var gender_err= false;
var dob_err = false;
var exp_err = false;
var cat_err = false;
var img_err = false;

$("#Fname").blur(function(){
check_Fname();
});

$("#Lname").blur(function(){
check_Lname();
});

$("#address1").blur(function(){
check_address1();
});

$("#city").blur(function(){
check_city();
});

$("#state").blur(function(){
$("#state").val($("#state").val().toUpperCase());
check_state();
});

$("#zip").blur(function(){
check_zip();
});

$("#email").blur(function(){
check_email();
});

$("#contactno").blur(function(){
$("#contactno").val($("#contactno").val().replace(/(\d{3})(\d{3})(\d{4})/,'$1-$2-$3')) 									 
check_contactno();
});

$('input:radio[name="gender"]').blur(function(){
check_gender();
});

$("#month").blur(function(){
check_month();
});

$("#day").blur(function(){
check_day();
});

$("#year").blur(function(){
check_year();
});

$('#category').blur(function(){
check_category();
});

$('#category').change(function(){
check_category();
});

$("#experience").blur(function(){
check_exp();
});


$('input[name="picture"]').on('change',function(e) {
	size = this.files[0].size;
	
	});

$('#imgbutton').click(function() {
validateImg();
});

function isEmpty(fieldValue) {
        return $.trim(fieldValue).length == 0;    
        } 

function isValidState(state) {                                
 var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC","DE","FL","GA","GU","HI","IA","ID","IL","IN","KS","KY","LA","MA","MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ","NM","NV","NY","OH","OK","OR","PA","PR","RI","SC","SD","TN","TX","UT","VA","VT","WA","WI","WV","WY");
    for(var i=0; i < stateList.length; i++) 
        if(stateList[i] == $.trim(state))
            return true;
        return false;
 }

function check_Fname(){
        if(isEmpty($('#Fname').val())) 
			{		
			$("#fname_err").css('visibility', 'visible');
			$("#fname_err").html("Enter your First Name");	
			$("#Fname").css('border','1px solid red');
            fname_err=true;
			$("#Fname").focus();
            }
		else{
			$("#fname_err").css('visibility', 'hidden');
			$("#Fname").css('border','1px solid black');
			}
}

function check_Lname(){
        if(isEmpty($("#Lname").val())) 
			{
			$("#lname_err").css('visibility', 'visible');		
			$("#lname_err").html("Enter your Last Name");
			$("#Lname").css('border','1px solid red');
            lname_err=true;
			$("#Lname").focus();
            }
		else {
			$("#lname_err").css('visibility', 'hidden');
			$("#Lname").css('border','1px solid black');
			}
}

function check_address1(){
        if(isEmpty($("#address1").val())) 
			{	
			$("#add_err").show();
			$("#add_err").html("Enter your address");
			$("#address1").css('border','1px solid red');
            add_err=true;
			$("#address1").focus();
            }
			else 
			{
			$("#add_err").hide();
			$("#address1").css('border','1px solid black');
			}
}

function check_city(){
        if(isEmpty($("#city").val())) 
			{
			$("#city_err").css('visibility', 'visible');
			$("#city_err").html("Enter your city");
			$("#city").css('border','1px solid red');
            city_err=true;
			$("#city").focus();
            }
		else {
			$("#city_err").css('visibility', 'hidden');
			$("#city").css('border','1px solid black');
			}
}

function check_state(){
        if(isEmpty($("#state").val())) {
			$("#state_err").css('visibility', 'visible');		
			$("#state_err").html("Enter your state");
			$("#state").css('border','1px solid red');
            state_err=true;
			$("#state").focus();
            }
		else if(!isValidState($("#state").val())) {
            $("#state_err").css('visibility', 'visible');
			$("#state_err").html("Invalid State, use the two letter code");	
			$("#state").css('border','1px solid red');
            state_err=true;
			$("#state").focus();
            }
			else {
			$("#state_err").css('visibility', 'hidden');
			$("#state").css('border','1px solid black');
			}
}

function check_zip(){
        if(isEmpty($("#zip").val())) {
			$("#zip_err").show();
			$("#zip_err").html("Enter your Zip code");
			$("#zip").css('border','1px solid red');
            zip_err=true;
			$("#zip").focus();
            }
		else if(!$.isNumeric($("#zip").val())) {
            $("#zip_err").show();	
			$("#zip_err").html("Zip zode should be numbers");
			$("#zip").css('border','1px solid red');
            zip_err=true;
			$("#zip").focus();
            }
		else if($("#zip").val().length != 5) {
            $("#zip_err").show();			
			$("#zip_err").html("The zip code must have exactly five digits");
			$("#zip").css('border','1px solid red');
            zip_err=true;
			$("#zip").focus();
            }
		else {
			$("#zip_err").hide();
			$("#zip").css('border','1px solid black');
			}
			}

function check_email(){
        if(isEmpty($("#email").val())) {
			$("#email_err").css('visibility', 'visible');	
			$("#email_err").html("Enter your email Id");
			$("#email").css('border','1px solid red');
            email_err=true;
			$("#email").focus();
            }
		else if(!$("#email").val().match(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/))
			{
			$("#email_err").css('visibility', 'visible');
			$("#email_err").html("Incorrect email format");
			$("#email").css('border','1px solid red');
			email_err=true;
			$("#email").focus();
			}
			else 
			{
			$("#email_err").css('visibility', 'hidden');
			$("#email").css('border','1px solid black');
			}
}

function check_contactno(){
        if(isEmpty($("#contactno").val())) {
			$("#phone_err").css('visibility', 'visible');		
			$("#phone_err").html("Enter your phone number");
			$("#contactno").css('border','1px solid red');
            phone_err=true;
			$("#contactno").focus();
            }
		else if(!$("#contactno").val().match(/^\d{3}-\d{3}-\d{4}$/))
			{
			$("#phone_err").css('visibility', 'visible');
			$("#phone_err").html("Phone no must have exactly ten digits");
			$("#contactno").css('border','1px solid red');
			phone_err=true;
			$("#contactno").focus();
			}
		else {
			$("#phone_err").css('visibility', 'hidden');
			$("#contactno").css('border','1px solid black');
			}
}

function check_gender(){
        if($('[name="gender"]:checked').length==0) {
			$("#gender_err").show();
			$("#gender_err").html("Select your gender");	
			$('input:radio[name="gender"]').css('border','1px solid red');
            gender_err=true;
		
            }
			else 
			{
			$("#gender_err").hide();
			$('input:radio[name="gender"]').css('border','1px solid black');
			}
}
			
function check_month(){
        if(isEmpty($("#month").val())) {
			$("#dob_err").show();
			$("#dob_err").html("Enter month of your birthdate");
			$("#month").css('border','1px solid red');
			$("#month").focus();
            dob_err=true;
            }
		else if(!$.isNumeric($("#month").val())) {	
			$("#dob_err").show();		
			$("#dob_err").html("Month should be only numbers");
			$("#month").css('border','1px solid red');
			$("#month").focus();
            dob_err=true;
            }
		else if($("#month").val().length != 2) {
			$("#dob_err").show();
			$("#dob_err").html("The month must have exactly two digits");
			$("#month").css('border','1px solid red');
			$("#month").focus();
            dob_err=true;
            }
			else {
			$("#dob_err").hide();
			$("#month").css('border','1px solid black');
			}
}

function check_day(){
        if(isEmpty($("#day").val())) {
			$("#dob_err").show();
			$("#dob_err").html("Enter day of your birthdate");
			$("#day").css('border','1px solid red');
			$("#day").focus();
            dob_err=true;
            }
		else if(!$.isNumeric($("#day").val())) {
			$("#dob_err").show();
            $("#dob_err").html("Day should be only numbers");
			$("#day").css('border','1px solid red');
			$("#day").focus();
            dob_err=true;
            }
		else if($("#day").val().length != 2) {
			$("#dob_err").show();
			$("#dob_err").html("The day must have exactly two digits");
			$("#day").css('border','1px solid red');
			$("#day").focus();
            dob_err=true;
            }
		else {
			$("#dob_err").hide();
			$("#day").css('border','1px solid black');
			}
}	

function check_year(){
        if(isEmpty($("#year").val())) {
			$("#dob_err").show();
			$("#dob_err").html("Enter year of your birthdate");
			$("#year").css('border','1px solid red');
			$("#year").focus();
            dob_err=true;
            }
		else if(!$.isNumeric($("#year").val())) {
			$("#dob_err").show();
            $("#dob_err").html("Year should be only numbers");
			$("#year").css('border','1px solid red');
			$("#year").focus();
            dob_err=true;
            }
		else if($("#year").val().length != 4) {
			$("#dob_err").show();
            $("#dob_err").html("The year must have exactly four digits");
			$("#year").css('border','1px solid red');
			$("#year").focus();
            dob_err=true;
            }
		else {
			validateDate("date");
			}
}

function validateDate(string) {	

	var day = document.getElementById("day").value; 
    var month = document.getElementById("month").value;
    var year = document.getElementById("year").value;
	
    var checkDate = new Date(year, month-1, day);    
    var inputDay = checkDate.getDate();
    var inputMonth = checkDate.getMonth()+1;
    var inputYear = checkDate.getFullYear();
	
	age = Math.floor((today-checkDate) / (365.25 * 24 * 60 * 60 * 1000));
	
if (string=="date")
{
   if(day != inputDay || month != inputMonth || year != inputYear)
   {
  
			$("#dob_err").show();
			$("#dob_err").html("Invalid date.  " + checkDate.toDateString());
			dob_err=true;
	if(day != inputDay)
			{
			$("#day").css('border','1px solid red');
           
			}
	if(month != inputMonth )
			{
			$("#month").css('border','1px solid red');
           
			}
	if( year != inputYear)
			{
			$("#year").css('border','1px solid red');
           
			}
			
    }
	else 
	{
		if(age<14 || age>99){
		$("#dob_err").show();
		$("#dob_err").html("Your age should be between 14 and 99 years");
		$("#year").css('border','1px solid red');
		$("#year").focus();
		dob_err=true;
		}
		else{
		if(age<=21)
		$('select[name="category"]').val("Teen");
		if(age>21 && age<60)
		$('select[name="category"]').val("Adult");
		if(age>=60)
		$('select[name="category"]').val("Senior");
		
		$("#day").css('border','1px solid black');
		$("#year").css('border','1px solid black');
		$("#month").css('border','1px solid black');
		$("#dob_err").hide();
		}
	}

}
	
else if (string=="category")
{
if(day.length==0 || month.length==0 || year.length==0 )
{
return true;
}

else
{
var cat=$('select[name="category"]').val();

if(age<=21 && cat!="Teen")
return false;

else if(age>21 && age<60 && cat!="Adult")
return false;

else if(age>=60 && cat!="Senior")
return false;

else
return true;
}
}

}			

function check_category(){
      if($('select[name="category"]').val()=="") {
			$("#cat_err").show();
			$("#cat_err").html("Select your age category");	
			$('#category').css('border','1px solid red');
            cat_err=true;
			$("#category").focus();
            }
			else if(!validateDate("category")) {
			$("#cat_err").show();
			$("#cat_err").html("Select correct category");	
			$('#category').css('border','1px solid red');
            cat_err=true;
			$("#category").focus();
			}
			
			else {
			$("#cat_err").hide();
			$('#category').css('border','1px solid black');
			}		
}
			
function check_exp(){
        if($('select[name="experience"]').val()=="") {
			$("#exp_err").show();		
			$("#exp_err").html("Select your experience level");
			$("#experience").css('border','1px solid red');
            exp_err=true;
			$("#experience").focus();
            }
			else {
			$("#exp_err").hide();
			$("#experience").css('border','1px solid black');
			}
}

function validateImg()
{
	extension = $('#pic').val().split('.').pop().toLowerCase(); 
	allowedExt = new Array('gif','png','jpg','jpeg','tiff','bmp');
	
	if(size == 0) 
	{ 
	$("#img_err").show();
	$("#img_err").html("Please select a file");
	$('input[name="picture"]').css('border','1px solid red');			
    img_err=true; 
	$("#pic").focus();
	}
	
	else if((jQuery.inArray(extension, allowedExt))== -1) 
	{ 
	 
	$("#img_err").show();
	$("#img_err").html("Allowed file extensions are gif, png, jpg, jpeg, tiff, bmp");
	$('input[name="picture"]').css('border','1px solid red');			
    img_err=true; 
	$("#pic").focus();
	} 
	else if(size/1000 > 1000) 
	{
	$("#img_err").show();
	$("#img_err").html("File is too big, 1 MB max");
	$('input[name="picture"]').css('border','1px solid red');		
    img_err=true; 
	$("#pic").focus();
	}
	else
	{
	$("#img_err").hide();
	$('input[name="picture"]').css('border','1px solid black');
	}
}


var url;
var dupStatus;
var imgStatus;

function display_dup(answer) {
	
	if(answer == "dup")
		{
		dupStatus = "Email ID or Contact No already registered";
		$('#status').text(dupStatus);
		}
    else if(answer == "OK") 
		{
		send_file();
        }
    else
       { 
		dupStatus = answer;
		$('#status').text(dupStatus);
	   }
}

function send_file() {    
        var form_data = new FormData($('form')[0]);
         
        form_data.append("image",document.getElementById("pic").files[0]);
        var toDisplay = '<img src="http://jadran.sdsu.edu/~jadrn045/proj3/busywait.gif" width="30px"/>';               
		$('#pict').show();       
	   $('#pict').html(toDisplay);
	
		$.ajax( {
            url: "image_upload.php",
            type: "post",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(response) {
	       if(response.startsWith("Success")) 
				{
				
				$('#pict').hide();       
				$('form').serialize();
				$('form').submit();
				}
	       else {
				imgStatus = response;
				$('#status').text(imgStatus);
				$('#pict').hide();
                }
	    },
            error: function(response) {
              imgStatus = "Sorry, an upload error occurred";
			  $('#status').text(imgStatus);
			  $('#pict').hide();		
				}
            });
        }	
	

$(":submit").on("click",function(e) {

e.preventDefault();


 fname_err = false;
 lname_err = false;
 add_err = false;
 city_err = false;
 state_err = false;
 zip_err = false;
 email_err = false;
 phone_err = false;
 gender_err= false;
 dob_err = false;
 exp_err = false;
 cat_err = false;
 img_err = false;
	
check_Fname();
check_Lname();
check_address1();
check_city();
check_state();
check_zip();
check_email();
check_contactno();
check_gender();
check_month();
check_day();
check_year();
check_category();
check_exp()
validateImg();


if(fname_err == true || lname_err == true || add_err == true || city_err == true ||  state_err == true || zip_err == true ||  email_err == true ||  phone_err == true || dob_err == true ||  exp_err == true || gender_err== true || cat_err== true || img_err==true) 
	{
	
	
	if(fname_err == true)
	$("#Fname").focus();
	
	else if(lname_err == true )
	$("#Lname").focus();
	
	else if(add_err == true) 
	$("#address1").focus();
	
	else if(city_err == true) 
	$("#city").focus();
	
	else if(state_err == true) 
	$("#state").focus();
	
	else if(zip_err == true) 
	$("#zip").focus();
	
	else if(email_err == true) 
	$("#email").focus();

	else if(phone_err == true) 
	$("#contactno").focus();
	
	else if(gender_err== true) 
	$("#male").focus();
	
	else if(dob_err == true)   
	$("#month").focus();
	
		else if(cat_err== true)
		$("#category").focus();
	
	else if(exp_err == true) 
	$("#experience").focus();
	
	else (img_err==true)
	$("#pic").focus();
	
	return false;
	} 

	else {

	var email = $("#email").val();
	var contactno = $("#contactno").val();
	
	var url = 'check_dup.php?email='+email+'& contactno='+contactno;
	$.get(url, display_dup);
 
	}

	});
	
	
$(":reset").on("click",function() {
$("#Fname").focus();

$("#fname_err").css('visibility', 'hidden');
$("#Fname").css('border','1px solid black');

$("#lname_err").css('visibility', 'hidden');
$("#Lname").css('border','1px solid black');

			$("#add_err").hide();
			$("#address1").css('border','1px solid black');

			$("#city_err").css('visibility', 'hidden');
			$("#city").css('border','1px solid black');

			$("#state_err").css('visibility', 'hidden');
			$("#state").css('border','1px solid black');
			
				$("#zip_err").hide();
			$("#zip").css('border','1px solid black');

				$("#email_err").css('visibility', 'hidden');
			$("#email").css('border','1px solid black');
			
			$("#phone_err").css('visibility', 'hidden');
			$("#contactno").css('border','1px solid black');
			
			$("#gender_err").hide();
			$('input:radio[name="gender"]').css('border','1px solid black');
			
			$("#day").css('border','1px solid black');
		$("#year").css('border','1px solid black');
		$("#month").css('border','1px solid black');
		$("#dob_err").hide();
		
		$("#cat_err").hide();
			$('#category').css('border','1px solid black');
			
			$("#exp_err").hide();
			$("#experience").css('border','1px solid black');
			
				$("#img_err").hide();
	$('input[name="picture"]').css('border','1px solid black');

});
	
	
	
	});

