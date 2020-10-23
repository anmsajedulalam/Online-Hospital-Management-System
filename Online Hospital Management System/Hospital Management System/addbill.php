<?php
  require_once('auth.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title> 
<style type="text/css">
</style>
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

<?php

	require_once('vars.php');
	$dbc = mysql_connect($HOSTNAME, $USER, $PASSWORD) or die('error connecting');
		
			
	mysql_select_db($DBNAME);

	if(isset($_POST['submit']))
	{

		$id=$_POST['id'];
		$ser=$_POST['service'];
		$cost=$_POST['cost'];
		$sdoc = $_POST['sdoc'];

		$query="INSERT INTO service(pid, sname, scost, eid) VALUES('$id', '$ser', '$cost', 'sdoc')";

		mysql_query($query) or die(mysql_error($dbc));

		echo '<p>Value has been saved of patient ' . $id . ' for a service ' . $ser . '</p>';


		mysql_close($dbc);
			
	}
	
	if(isset($_POST['med']))
	{
		//echo 'here';
		$eid = $_POST['mdoc'];
		$pid = $_POST['mpid'];
		$mcost = $_POST['mcost'];
		$mname = $_POST['mname'];

		$query = "INSERT INTO medicine(pid, mname, mcost, eid) VALUES('$mpid', '$mname', '$mcost', '$eid')";
		mysql_query($query) or die(mysql_error($dbc));
		echo '<p>Value has been saved of patient ' . $pid . ' for a medicine ' . $mname . '</p>';

		mysql_close($dbc);
	}


?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<table width:="50%">
    <tbody>
      <tr>
        <td>
<label for="id">Give id:</label>
</td><td>
<input type="text" name="id" id="id"/>
</td></tr><tr><td>
<label for="service">Give service:</label>
</td><td>
<input type="text" name="service" id="service"/>
</td></tr><tr><td>
<label for="cost">Give cost:</label>
</td><td>
<input type="text" name="cost" id="cost"/>
</td></tr><tr><td>
<label for="sdoc">Give doctor's id:</label>
</td><td>
<input type="text" name="sdoc" id="sdoc"/>
</td></tr>
</tbody>
  </table>



<input type="submit" name="submit" id="submit"/>


</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<table width:="50%">
    <tbody>
      <tr>
        <td>
<label for="mpid">Give patient id:</label>
</td><td>
<input type="text" name="mpid" id="mpid"/>
</td></tr><tr><td>
<label for="mname">Give medicine:</label>
</td><td>
<input type="text" name="mname" id="mname"/>
</td></tr><tr><td>
<label for="mcost">Give cost:</label>
</td><td>
<input type="text" name="mcost" id="mcost"/>
</td></tr><tr><td>
<label for="mdoc">Give doctor's id:</label>
</td><td>
<input type="text" name="mdoc" id="mdoc"/>
</td></tr>
</tbody>
  </table>

<input type="submit" name="med" id="med"/>



</form>




</body>
</html>