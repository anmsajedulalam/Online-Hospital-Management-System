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
         <li class='last' class="hvr-float-shadow"><a href='rmvnurse.php'><span>Remove Nurse</span></a></li>
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
    $eid=$_POST['eid'];

    $query="UPDATE nurse set status='removed' where eid='$eid' ";
    $result = mysql_query($query) or die(mysql_error($dbc) . 'error no phone number found');
    echo "<div style='color: green'>You have successfully added a doctor " . $name . "</div>";
      mysql_close($dbc);


      echo "<a href='target.php'>GO TO PREVIOUS PAGE</a>";

        
      }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <table width:="50%">
    <tbody>
      <tr>
        <td>
<label for="eid">Give Nurse's ID:</label>
<input type="text" name="eid" id="eid"/>
</td><td>
<input type="submit" name="submit" id="submit"/>
</td></tr>
</tbody>
</table>
</form>


</body>
</html>