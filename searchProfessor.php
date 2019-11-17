<?php
include_once('db_connect.php');

$name = $_POST['search_input'];
$str = "SELECT faculty.facultyName FROM faculty WHERE faculty.facultyName LIKE '$name%';";
$result = $db->query($str);
$row = $result->fetch();
$prof = $row[0];

$idQuery = "SELECT uid FROM faculty WHERE facultyName = '$prof';";
$resultID = $db->query($idQuery);
$resultRow = $resultID->fetch();
$pid = $resultRow[0];

$emailQuery = "SELECT email FROM user WHERE userid = '$pid';";
$resultemail= $db->query($emailQuery);
$resultRowEmail = $resultemail->fetch();
$email = $resultRowEmail[0];

$statusQuery = "SELECT status FROM availability WHERE uid = '$pid';";
$statusResult = $db->query($statusQuery);
$statusRow = $statusResult->fetch();
$stat = $statusRow[0];
#if status is inOffice
if($stat == 1)
{
    #check if available for office hour
    $availableOfficeQuery = "SELECT availableforOfficeHour FROM availability WHERE uid = '$pid';";
    $availableOfficeResult = $db->query($availableOfficeQuery);
    $availableResultRow = $availableOfficeResult->fetch();
    $valOffice = $availableResultRow[0];
    if($valOffice == 1)
    {
        $availableFQuery = "SELECT availableFrom FROM availability WHERE uid = '$pid';";
        $availableFResult = $db->query($availableFQuery);
        $availableResultRowF = $availableFResult->fetch();
        $valF = $availableResultRowF[0];

        $availableTQuery = "SELECT availableTill FROM availability WHERE uid = '$pid';";
        $availableTResult = $db->query($availableTQuery);
        $availableResultRowT = $availableTResult->fetch();
        $valT = $availableResultRowT[0];

    }
}
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
  <link href = "viewProfessor.css" rel = "stylesheet">
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
              <a class="nav-link" href="https://projectcapstone.sites.gettysburg.edu/profFriend/Student.html">Home <span class="sr-only">(current)</span></a>
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
         
        
        <div class="container emp-profile">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="text-align:center"><?php echo "Professor ".$prof;?></h2>

                        <div class="card">
                        <img class = "center" src="user.jpg" alt="John">
                        <p style="text-align:center">Gettysburg College</p>
                        <p style="text-align:center"><button>Contact</button></p>
                    </div>
                    </div>
                    
                </div>

                <div class = "row">
                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $prof;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email;?></p>
                                            </div>
                                        </div>
                                        <?php 
                                            if($stat == 1)
                                            {
                                                if($valOffice == 1)
                                                {
                                                    echo  "
                                                    <div class = 'row'>
                                                        <div class = 'col-md-6'>
                                                            <label>Available</label>
                                                        </div>
                                                        <div class = 'col-md-6'>
                                                            <p>Yes</p>
                                                        </div>
                                                    </div>
                                                    <div class = 'row'>
                                                        <div class = 'col-md-6'>
                                                            <label>Available From</label>
                                                        </div>
                                                        <div class = 'col-md-6'>
                                                            <p>$valF</p>
                                                        </div>
                                                    </div>
                                                    <div class = 'row'>
                                                        <div class = 'col-md-6'>
                                                            <label>Available Till</label>
                                                        </div>
                                                        <div class = 'col-md-6'>
                                                            <p>$valT</p>
                                                        </div>
                                                    </div>
                                                    ";
                                                }
                                            }
                                            else
                                            {
                                                echo  "
                                                    <div class = 'row'>
                                                        <div class = 'col-md-6'>
                                                            <label>Available</label>
                                                        </div>
                                                        <div class = 'col-md-6'>
                                                            <p>No</p>
                                                        </div>
                                                    </div>
                                                    <div class = 'row'>
                                                        <div class = 'col-md-6'>
                                                            <label>Will be at Office</label>
                                                        </div>
                                                        <div class = 'col-md-6'>
                                                            <p>$valT</p>
                                                        </div>
                                                    </div>
                                                    ";
                                            }
                                        ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
  

           
      </div>
    </div>
    
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

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

</body>

</html>

