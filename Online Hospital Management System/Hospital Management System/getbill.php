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

	if(isset($_POST['submit'])&& ($ssum!=0) && ($msum!=0))
	{
		$id=$_POST['id'];

		$query="SELECT * FROM service,patient  WHERE patient.pid = service.pid and phone_no='$phone_no'";
		$result = mysql_query($query) or die(mysql_error($dbc) . 'error no search phone number found');

		$ssum=0;
		?>
             <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
                       <th>Service Name</th>
                       <th>Service Cost</th>
                       
                       
                     </tr>

		<?php

		while($row = mysql_fetch_array($result))
		{
			echo '<tr>';
			echo '<td>'. $row['sname'] . '</td><td>' . $row['scost'] . '</td>';
			$ssum = $sum + $row['scost'];
			echo '</tr>';
		}
            $query="SELECT * FROM medicine,patient WHERE patient.pid = medicine.pid and phone_no='$phone_no'";
		$result = mysql_query($query) or die(mysql_error($dbc) . 'error here');

		$msum=0;
?>
             </table>
             <table cellpadding="0" cellspacing="0" class="db-table">
                    <tr>
       <th>Medicine Name</th>
                       <th>Medicine Cost</th>
     </tr>

		<?php


		while($row = mysql_fetch_array($result))
		{
			echo '<tr>';
			echo '<td>' . $row['sname'] . '</td><td>' . $row['scost'] . '</td>';
			$msum = $msum + $row['scost'];
		    echo '</tr>';
		}


		mysql_close($dbc);

		
			
		echo '<p>Total Cost:' . $ssum+$msum . '</p></br>';
	}else if(isset($_POST['submit'])&&($ssum ==0)&& ($msum==0)){
        echo 'no cost was found for the Patient';
	}
	

?>
</table>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<table width:="50%">
    <tbody>
      <tr>
        <td>
<label for="phone_no">Give phone number:</label>
<input type="text" name="phone_no" id="phone_no"/>
</td><td>
<input type="submit" name="submit" id="submit"/>
</td></tr>
</tbody>
</table>
</form>
</body>
</html>