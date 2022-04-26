<?php
function getReferals() {

   $con = mysqli_connect("localhost","root","","myhmsdb");
   $sql = "SELECT 
            patient_id,
            fname,
            lname,
            referal_date,
            hs_name,
            refered_by,
            isDelivered
            FROM referal 
            LEFT JOIN patreg ON referal.patient_id = patreg.pid
            LEFT JOIN hospitals ON referal.hospital_id = hospitals.hs_id";

   $result = mysqli_query($con, $sql);
   $refs = mysqli_fetch_all($result, MYSQLI_ASSOC);

   mysqli_free_result($result);
   mysqli_close($con);

   return $refs;

}
?>

