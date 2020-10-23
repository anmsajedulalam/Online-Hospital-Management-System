<html>
<head>
<title>DOCTOR INFROMATION</title>
<style>

</style>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/stylesheet-pure-css.css">
</head>

<body>
  <?php
    if(isset($_COOKIE['doctor']))
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

	        echo '<h3>Doctor table</h3>'.'<br>'; 
	        ?>
 <table cellpadding="0" cellspacing="0" class="db-table">
     <tr>
       <th>Doctor's Name</th>
       <th>Doctor's ID</th>
       <th>Doctor's Room</th>
       <th>Doctor's Speciality</th>
       <th>Doctor's Status</th>
       <th>More Information</th>
     </tr>

	        <?php
	
			$query='SELECT employee.eid AS eid, name, droom, specialty,status FROM employee INNER JOIN doctor ON employee.eid = doctor.eid';
			
			$row=mysql_query($query) or die(mysql_error($dbc));
			
			while($val = mysql_fetch_array($row))
			{

				 echo '<tr>';
				echo '<td>';
				echo $val['name']; 
				echo'</td>' ;
				echo' <td> ' ;
				echo $val['eid'];
				echo'  </td>';
				echo '<td>';
				echo $val['droom'] ;
				echo' </td> ' ;
				echo' <td> ';
				echo $val['specialty'] ;
				echo' </td> ';
        echo' <td> ';
        echo $val['status'] ;
        echo' </td> ';
				echo' <td> ';
				echo '<a href="docdetails.php?eid='. $val['eid'].'">detail</a>';
				echo '</td> ';
				echo '</tr>';
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