<?php

if(isset($_POST['dlv'])){

    $pid = $_POST['pid'];

    $con = mysqli_connect("localhost","root","","myhmsdb");
    $query="update referal set isDelivered=true where patient_id='$pid';";
    $result=mysqli_query($con,$query);
    if($result)
        header("Location:para-panel.php");

    mysqli_query($con, $sql);
    mysqli_close($con);
}

