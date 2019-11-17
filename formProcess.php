<?php
    session_start();
    include_once('db_connect.php');
    $uid = $_SESSION['uid'];
    $status  = $_POST['status'];
    if($status == "No")
    {
        $query = "UPDATE availability SET status = 0 , availableForOfficeHour = 0, availableFrom = NULL, availableTill = NULL, returnTime = NULL WHERE uid = '$uid' ;";
        $stmt = $db->prepare($query);
        $stmt->execute();
    }
    else if($status == "Yes")
    {
        $startTime = $_POST['start'];
        echo $startTime;
        $endTime = $_POST['end'];
        date_default_timezone_set("America/New_York");
        $today = date('H:i');
        echo $today;
        $time1 = new DateTime($startTime);
        $time2 = new DateTime($today);
        $interval = date_diff($time1, $time2);
        echo $interval->format('%s second(s)');
    }
    
?>