<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/user2.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> REFERRAL SYSTEM | PARAMEDICS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <a class="nav-link mx-5" href="logout1.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
</nav>

  <script >
    var check = function() {
  if (document.getElementById('dpassword').value ==
    document.getElementById('cdpassword').value) {
    document.getElementById('message').style.color = '#5dd05d';
    document.getElementById('message').innerHTML = 'Matched';
  } else {
    document.getElementById('message').style.color = '#f55252';
    document.getElementById('message').innerHTML = 'Not Matching';
  }
}

    function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8 || key == 32);
};
  </script>

  <style >
    .bg-primary {
    background: -webkit-linear-gradient(left, #BFB372, #00c6ff);
}

.col-md-4{
  max-width:20% !important;
}

.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #342ac1;
    border-color: #007bff;
}
.text-primary {
    color: #342ac1!important;
}

#cpass {
  display: -webkit-box;
}

#list-app{
  font-size:15px;
}

.btn-primary{
  background-color: #BFB372;
  border-color: #BFB372;
}

.ref-tb th,td{white-space: nowrap;}
  </style>
  </head>
<body>
    <div class="container">
      <div class="row my-5">
        
    
              <!-- <a href="./report.php" class="btn btn-primary">generate</a><br> -->
              <table class="table table-hover ref-tb">
                <thead>
                  <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Hospital referred</th>
                    <th scope="col">Referral date</th>
                    <th scope="col">Referred by</th>
                    <th scope="col">Delivery status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php require_once("./refl.php")?>
                  <?php $rows = getReferals() ?>
                    <tr>
                      <?php foreach($rows as $row) {?>
                        <td><?php echo $row["patient_id"] ?></td>
                        <td><?php echo $row["fname"] ?></td>
                        <td><?php echo $row["lname"] ?></td>
                        <td><?php echo $row["hs_name"] ?></td>
                        <td><?php echo $row["referal_date"] ?></td>
                        <td><?php echo $row["refered_by"] ?></td>
                        <td>
                          <?php if($row["isDelivered"]) {?>
                            <input type="button" value="Delivered" disabled>
                          <?php } else {?>
                            <form action="deliver.php" method="post">
                                <input type="hidden" name="pid" value="<?php echo $row['patient_id']?>">
                                <input type="submit" value="Confirm Delivery" class="btn btn-primary" name="dlv">
                            </form>
                          <?php }?>
                        </td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
        <br>
      </div>
    </div>
</body>
</html>