<?php 

function changeRefStatus($con, $pid) {
    $query = "UPDATE patreg SET isReffered = true WHERE pid = $pid";
    $stmt = $con->prepare($query);
    $stmt->execute();
}

function referPatient($con, $pid, $hid, $dname) {
    
    $query = "INSERT INTO referal (patient_id, hospital_id, refered_by)
                VALUES ($pid, $hid, '$dname');";
    $stmt = $con->prepare($query);
    $stmt->execute();
}

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $dbh = new PDO('mysql:host=localhost;dbname=myhmsdb', 'root', '');

    $p_id = $_POST["p_id"];
    $h_id = $_POST["hs_id"];
    $d_name = $_POST["d_name"];

    changeRefStatus($dbh, $p_id);
    referPatient($dbh, $p_id, $h_id, $d_name);

    header("Location: doctor-panel.php");
}

?>