<?php

    function getHospitals($con) {
        $query = "select * from hospitals";
        
        $result = mysqli_query($con,$query) or die("bad");
        if(!$result){
          echo mysqli_error($con);
        }
        return $result;
    }

    function getReferals($con) {
        $query = "select referred_by, fname, lname, gender, email, contact, hs_name from referal left join patreg on referal.patient_id = referal.pid left join hospitals on referal.hospital_id = hospitals.hs_id";
        
        $result = mysqli_query($con,$query) or die("bad");
        if(!$result){
          echo mysqli_error($con);
        }
        return $result;
    }

?>