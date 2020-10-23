<?php
  require_once('auth.php');
?>

<html>
  <head>
    <title>ADD NURSE</title>
    <style></style>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/stylesheet-pure-css.css">
  </head>
  <body>
  	<header class="hdr">
       <img src="logo.png" alt="Logo" height=50 width=50>
       <h3> Hospital Management System</h3>
       <p class="nav_stuff">Welcome! <a href="index.php" class="hvr-float-shadow">Sign out</a>  <a href="index.php" class="hvr-float-shadow">Sign in</a></p>
    </header>


    <div id='cssmenu'>
<ul>
   <li><a href='target.php' class="hvr-float-shadow"><span>Home</span></a></li>
   <li class='has-sub'><a href='#' class="hvr-float-shadow"><span>Doctors</span></a>
      <ul>
         <li><a href='docinfo.php' class="hvr-float-shadow"><span>Doctor's List</span></a></li>
         <li><a href='adddoctor.php' class="hvr-float-shadow"><span>Add Doctor</span></a></li>
         <li><a href='rmv_doc.php' class="hvr-float-shadow"><span>Remove Doctor</span></a></li>
         <li><a href='addbill.php' class="hvr-float-shadow"><span>Supervise</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#' class="hvr-float-shadow"><span>Nurse</span></a>
      <ul>
         <li><a href='ninfo.php' class="hvr-float-shadow"><span>Nurse's List</span></a></li>
         <li><a href='addnurse.php' class="hvr-float-shadow"><span>Add Nurse</span></a></li>
         <li class='last' class="hvr-float-shadow"><a href='#'><span>Remove Nurse</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#' class="hvr-float-shadow"><span>Patient</span></a>
      <ul>
         <li><a href='admit.php' class="hvr-float-shadow"><span>Get Admited</span></a></li>
         <li><a href='hospital.php' class="hvr-float-shadow"><span>Get Appointment</span></a></li>
         <li class='last' ><a href='addbill.php'class="hvr-float-shadow"><span>Get Bill</span></a></li>
      </ul>
   </li>
   <li><a href='#' class="hvr-float-shadow"><span>About</span></a></li>
   <li class='last' ><a href='#' class="hvr-float-shadow"><span>Contact</span></a></li>
</ul>
</div>

<script type="text/javascript">

function validateNotEmpty(object, err)
{
	if(object.value.length == 0)
	{
		if(err != null)
			err.innerHTML = "Please enter a value";
		return false;
		
	}
	else
	{
		if(err != null)
			err.innerHTML = "";
	}
	return true;
}

function checkNumber(object, err)
{
	if(object.value == 0)
	{
		if(err != null)
			err.innerHTML = "Please enter a value";
		return false;
	}
	else if(isNaN(object.value))
	{
		if(err != null)
			err.innerHTML="Please enter only numbers"
		return false;
	}
	else
	{
		if(err != null)
			err.innerHTML="";
		return true;
	}
}


</script>



  	<form id="myForm" name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<?php
		$dbc = mysql_connect('localhost', 'root', 'root') or die('error connecting');
		
			
		mysql_select_db('hospital');
			
		if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['phone_num']) && !empty($_POST['address']) && !empty($_POST['experience']) && !empty($_POST['diploma']))
		{
			
			
			$name = $_POST['name'];
			$address= $_POST['address'];
			$phone_num = $_POST['phone_num'];
			$diploma=$_POST['diploma'];
			$experience=$_POST['experience'];
			
			$insertEmp = "INSERT INTO employee(name, address, phone_num) VALUES('$name', '$address', '$phone_num')";

			
			mysql_query($insertEmp) or die(mysql_error($dbc) . 'error here at emp');

            $geteid = "SELECT * FROM employee WHERE phone_num = '$phone_num'";
            $eid = mysql_query($geteid) or die(mysql_error($dbc) . 'error here');
            $array = mysql_fetch_array($eid);
            $value = $array['eid'];

            $insertNurse = "INSERT INTO nurse(eid, experience, diploma) VALUES('$value','$experience','$diploma')";
            
            mysql_query($insertNurse) or die(mysql_error($dbc) . 'error here');

			mysql_close($dbc);
		}
		else
		{
			
?>

<h3>Add Nurse</h3>
<table width:="50%">
    <tbody>
      <tr>
        <td>
<label for="name">Name </label>
</td><td>
<input type="text" name="name" id="name" onblur="validateNotEmpty(this, document.getElementById('name_alert'))"/>
<span id="name_alert" class="error"></span>
<br />
</td></tr><tr><td>
<label for="address">Address </label>
</td><td>
<input type="text" name="address" id="address" onblur="validateNotEmpty(this, document.getElementById('add_alert'))"/>
<span id='add_alert' class="error"></span>
<br />
</td></tr><tr><td>
<label for="mobile">Phone Number </label>
</td><td>
<input type="text" name="phone_num" id="contact" onblur="validateNotEmpty(this, document.getElementById('phone_alert'))"/>
<span id="phone_alert" class="error"></span>
<br />
</td></tr><tr><td>
<label for="experience">experience </label>
</td><td>
<input type="text" name="experience" id="experience" onblur="validateNotEmpty(this, document.getElementById('exp_alert'))"/>
<span id='exp_alert' class="error"></span>
<br />
</td></tr><tr><td>
<label for="diploma">diploma</label>
</td><td>
<input type="text" name="diploma" id="diploma" onblur="validateNotEmpty(this, document.getElementById('dip_alert'))"/>
<span id="dip_alert" class="error"></span>
<br />
</td></tr>
</tbody>
  </table>

<input type="submit" value = "Send"  name="submit" id="submit" />


</form>
<?php
  }
?>

  </body>
</html>
