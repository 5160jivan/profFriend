<?php
session_start();
$uid = $_SESSION['uid'];
include_once("db_connect.php");

$str = "SELECT faculty.facultyName FROM faculty WHERE faculty.uid = '$uid';";
$result = $db->query($str);
$row = $result->fetch();
$prof = $row[0];
			
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  

  <title>My Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href = "Student.css" rel = "stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
</head>
    
<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">My Account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="https://projectcapstone.sites.gettysburg.edu/profFriend/index.html">Log Out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
         
        
       <div class="text-block">
                 
                <h4 style = "text-align:center"><?php /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        echo "Good morning, Professor ";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        echo "Good afternoon, Professor ";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "19") {
        echo "Good evening, Professor ";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        echo "Good night, Professor ";
    }$pieces = explode(" ", $prof); echo $pieces[1]?></h4>
        </div>
        <div class="container">
            <img src="gettysburg.jpg" alt="College" class = "center">
        
        </div>
        <p><br></p>
        <form name = "professorForm" method = "POST" action = "formProcess.php">
            <div class = "row">
                <div class="col-md-6">
                    <label>Are you available for office hours today?</label>
                </div>
                <div class = "col-md-6">
                    <select id = "statusVal" name = "status">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                    <input type = "button" value = "Update" onClick = "trigger()">
                
                </div>
            </div>
            <div class = "row">
                    <div class = "col-md-6">
                        <label for = "appt">Please select the starting time.</label>
                    </div>
                    <div class = "col-md-6">
                        <input type="time" id="ab" name="start">
                    </div>
            </div>
            <div class = "row">
                    <div class = "col-md-6">
                        <label for = "ap">Please select the ending time.</label>
                    </div>
                    <div class = "col-md-6">
                        <input type="time" id="abc" name="end">
                    </div>
            </div>
             <div class = "row">
                    <div class = "col-md-5">
                        <input type="submit" id="abcd" name="ab">
                    </div>
            </div>
            
        </form>
      </div>
    </div>
    
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

    <script  type="text/javascript">
         function trigger()
         {
             var val = document.getElementById("statusVal").value.toLowerCase();
             if(val == "no")
             {
                 document.professorForm.submit();
             }
         }
    </script>
    
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  </script>

</body>

</html>
