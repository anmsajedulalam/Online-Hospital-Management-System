

<html>
<head>
<title>Patient INFROMATION</title>
<style>

</style>

<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/stylesheet-pure-css.css">
</head>

<body>
  <?php

  if(isset($_COOKIE['doctor']) || isset($_COOKIE['nurse']) || (isset($_SERVER['PHP_AUTH_USER'] ) && 
    isset($_SERVER['PHP_AUTH_PW']) && 
    $_SERVER['PHP_AUTH_USER'] == 'user' 
    && $_SERVER['PHP_AUTH_PW'] == 'password' 
    )
    )
  {




  ?>
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

<?php
       require_once('vars.php');

		$dbc = mysql_connect($HOSTNAME, $USER, $PASSWORD) or die('error connecting');
		
			
		mysql_select_db($DBNAME) or die('db select error');

	       echo '<h3>Patient table</h3>'.'<br>'; 
	
			$query='SELECT * FROM patient ';
			
			$row=mysql_query($query) or die(mysql_error($dbc));

			?>
 <table cellpadding="0" cellspacing="0" class="db-table">
     <tr>
       <th>Patient's Name</th>
       <th>ID</th>
       <th>Phone Number</th>
       <th>More Information</th>
     </tr>

	        <?php
			
			while($val = mysql_fetch_array($row))
			{

				 
				echo '<tr><td>'.$val['pname'] . '</td><td>  ' .$val['pid'].' </td><td> '. $val['phone_no'] .' </td><td> '. '<a href="pdetails.php?pid='. $val['pid'].'">detail</a>'.'</td></tr>  ';
			}

			//mysql_close($dbc);

//<a href="maps.php?coords=' . $coord_array . '">View Map</a>
//echo "<a href=\"submit_docs.php?prop_id=".$prop_id."\">Click </a>";

?>

</table>

<?php

  }
  else
  {
    echo 'ACCESS RESTRICTED';
  }
?>

</body>

</html>