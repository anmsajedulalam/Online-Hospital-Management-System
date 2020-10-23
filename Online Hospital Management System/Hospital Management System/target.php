<html>
  <head>
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="css/styles.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type = "text/css">
        
        .capture
        {
            display: none;
        }
        
        #doctor{
            display: block;
            filter: alpha(opacity=100);
            -moz-opacity: 1.0;
            -khtml-opacity: 1.0;
            opacity: 1;
            
            
        }

        #imager
        {
          margin-left: 65%;
          margin-right: 50%;
        }  
    </style>

  </head>
  <body>

    <?php

      if(isset($_COOKIE['doctor']) || isset($_COOKIE['nurse']))
      {

        echo "<p>WELCOME!</p> <br />";
        //echo 'here'; 
        echo "<p><a href='logout.php'>Logout</a> </p>";

      }
      else
      {
        echo "<p><a href='login.php'> Login </a> </p><br />";
        echo "<p><a href='signup.php'>Sign up</a> </p>";  
      }
       


    ?>



    <header class="hdr">
       
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
         <li><a href='salary.php' class="hvr-float-shadow"><span>Salary</span></a></li>
         
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
         <li class='last' ><a href='pinfo.php'class="hvr-float-shadow"><span>Patient List</span></a></li>
         
      </ul>
   </li>
   <li><a href='#' class="hvr-float-shadow"><span>About</span></a></li>
   <li class='last' ><a href='#' class="hvr-float-shadow"><span>Contact</span></a></li>
</ul>
</div>


    <div id="imager">
    <p id = "slide">
        <img src="photo0.jpg" alt="doc" id="doctor" class="capture"/>
        <img src="photo1.jpg" alt="patient" class="capture" />
        <img src="photo2.jpg" alt="nurse" class="capture" />
    </p>
    </div>
    
    <script type="text/javascript">
        var image = document.getElementsByClassName("capture");
        var element = document.getElementById("slide");
        var cur = 0;
        
        var DURATION = 5000;
        
        
        
        function setOpac(val) {
          element.style.opacity = val;
          element.style.MozOpacity = val;
          element.style.KhtmlOpacity = val;
          element.style.filter = 'alpha(opacity=' + (val * 100) + ');';
        }
        
        function fadeOut()
        {
            for(var c = 0; c <= 1; c += 0.01)
            {
                setTimeout("setOpac(" + (1 - c) + ")", c * 3000);
                //console.log(c);
            }
            
            
            setTimeout("fadeIn()", DURATION);
        }
        
        function fadeIn()
        {
            
            //setOpac(0);
            image[cur].style.display = "none";
            cur = (cur + 1) % 3;
            image[cur].style.display = "block";
            
            for(var c = 0; c <= 1; c += 0.01)
            {
                setTimeout("setOpac(" + c + ")", c * 3000);
            }
            
            
            setTimeout("fadeOut()", DURATION);
            
        }
        
        fadeOut();
    </script>
    
  </body>
</html>