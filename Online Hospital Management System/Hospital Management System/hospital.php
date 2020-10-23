<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/stylesheet-pure-css.css">
<style type="text/css">
</style>
</head>

<body>

		<header class="hdr">
       <img src="logo.png" alt="Logo" height=50 width=50>
       <h3> Hospital Management System</h3>
       <p class="nav_stuff">Welcome! <a href="index.php" class="hvr-float-shadow">Sign out</a></p>
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
/*
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
*/

</script>




<?php
		require_once('vars.php');

		$dbc = mysql_connect($HOSTNAME, $USER, $PASSWORD) or die('error connecting');
		
			
		mysql_select_db($DBNAME);
		//echo 'complete';
			
		if(isset($_POST['submit']) && !empty($_POST['pname']) && !empty($_POST['phone_no']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['address']))
		{
		//	echo 'complete 1';
			
			$pname = $_POST['pname'];
			$phone_no = $_POST['phone_no'];
			$sex= $_POST['sex'];
			$blood_type = $_POST['blood_type'];
			$address=$_POST['address'];
            $height=$_POST['height'];
            $weight=$_POST['weight'];
           // $date=$_POST['date()'];
           
            
			
			$insertPat = "INSERT INTO patient(pname, phone_no, sex, blood_type, address, height, weight) VALUES('$pname', '$phone_no', '$sex', '$blood_type', '$address', '$height', '$weight')";
			
			mysql_query($insertPat) or die(mysql_error($dbc) . 'error here');

                echo 'complete';
			 
			//$last = mysql_insert_id();
            $getpid= "SELECT * FROM patient WHERE phone_no = $phone_no";
            $pid=mysql_query($getpid) 
            or die(mysql_error($dbc).'error here');
            $arr3=mysql_fetch_array($pid);
            $val3=$arr3['pid'];
			//$last = mysql_insert_id();
			
			foreach($_POST['doctor'] as $doc)
			{
				$insertAp = "INSERT INTO appointment_with(eid, pid, date, time) VALUES ('$doc', '$val3',CURDATE(),CURTIME() )";
				mysql_query($insertAp) or die(mysql_error($dbc) . 'error at for each');	
			}
			
			echo "<p style='color: green'>You have successfully made an appointment " . $name . "</p>";
			mysql_close($dbc);


			echo "<a href='hospital.php'>GO TO PREVIOUS PAGE</a>";
		}
		
		
			
?>


<div id="appointment">

<form id="myForm" name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >

<?php
	
			$query='SELECT employee.eid AS eid, name, droom, specialty FROM employee INNER JOIN doctor ON employee.eid = doctor.eid';
			
			$row=mysql_query($query) or die(mysql_error($dbc));
			?>

    <div class="table-1">
			<h2>Select Doctor</h2>
			<h4> You may select multiple doctors appointment</h4>

			 <table cellpadding="0" cellspacing="0" class="db-table">
     <tr>
       <th></th>
       <th>Doctor's Name</th>
       <th>Doctor's Room</th>
       <th>Doctor's Speciality</th>
     </tr>
			
            <div class="example">
			<?php
			while($val = mysql_fetch_array($row))
			{
				echo '<tr>';
?>
                <div>
				<td>
				<input type='checkbox' value='<?php echo $val['eid'] ?>' name='doctor[]'/> 
				<label><span><span></span></span>
				</td>
<?php
				 
				
				  echo   '<td>';
				  echo $val['name'];
				  echo'</td>';
				  echo '<td>'; 
				  echo $val['droom'];
				  echo'</td>';
				  echo '<td>'; 
				  echo $val['specialty'];
				  echo'</td>';
				echo '</tr>';
				?>
			     
                </label>        
             </div>
			<?php
			}

			//mysql_close($dbc);
?>

  </div>
       </table>
       <br>
       <br>
       </div>
   <div class="table-3">
   	<h2>Please Enter Your Information</h2>
<table width:="50%">
    <tbody>
      <tr>
        <td>

<label for="pname">Name </label>
</td>
<td>
<input type="text" name="pname" id="pname" onblur="validateNotEmpty(this, document.getElementById('name_alert'))"/>
<span id="name_alert" class="error"></span>
<br />
</td></tr><tr><td>

<label for="address">Address </label>
</td>
<td>
<input type="text" name="address" id="address" onblur="validateNotEmpty(this, document.getElementById('add_alert'))"/>
<span id='add_alert' class="error"></span>
<br />
</td></tr><tr><td>

<label for="phone_no">phone number</label>
</td>
<td>
<input type="text" name="phone_no" id="phone_no" onblur="validateNotEmpty(this, document.getElementById('contact_alert'))"/>
<span id="contact_alert" class="error"></span>
<br />
</td></tr><tr><td>

<label for="sex">Gender</label>
</td>
<td>
<select name="sex">
	<option value="male">Male</option>
	<option value="female">Female</option>
	<option value="other">Other</option>
</select><br />
</td></tr><tr><td>

<label for="blood_type">Blood</label>
</td>
<td>
<select name="blood_type">
	<option value="O+">O+</option>
	<option value="O-">O-</option>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
	<option value="B+" selected="selected">B+</option>
	<option value="B-">B-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>
	
</select><br />
</td></tr><tr><td>

<label for="weight">Weight</label>
</td>
<td>
<input type="text" name="weight" id="weight" onblur="checkNumber(this, document.getElementById('weight_alert'))"/>
<span id="weight_alert" class="error"></span>
<br />
</td></tr><tr><td>

<label for="height">Height</label>
</td>
<td>
<input type="text" name="height" id="height" onblur="checkNumber(this, document.getElementById('height_alert'))"/>
<span id="height_alert" class="error"></span>

<br />
</td></tr>
</tbody>
  </table>
  <br>
  <br>


<input type="submit" value = "Send"  name="submit" id="submit" />


</form>


</div>

</body>

</html>