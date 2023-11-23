<?php
  include "../classes/userContr.classes.php";
  include "../includes/users.inc.php";

  $userdata = new UserCntr();
  $user = $userdata->get_userdata();

if(isset($user)){
      
  $name = ucfirst(ucfirst($user['full_name']));
  $username = $user['username'];
  $role = $user['role'];
  if(isset($role) == 'child-account'){


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CSU | Log in</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <style>
    #qrcode {
      width:300px;
      height:300px;
      margin-top:15px;
    }
    [type="radio"]:checked,
    [type="radio"]:not(:checked) {
        position: absolute;
        left: -9999px;
    }
    [type="radio"]:checked + label,
    [type="radio"]:not(:checked) + label
    {
        position: relative;
        padding-left: 28px;
        cursor: pointer;
        line-height: 20px;
        display: inline-block;
        color: #666;
    }
    [type="radio"]:checked + label:before,
    [type="radio"]:not(:checked) + label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 18px;
        height: 18px;
        border: 1px solid #ddd;
        border-radius: 100%;
        background: #fff;
    }
    [type="radio"]:checked + label:after,
    [type="radio"]:not(:checked) + label:after {
        content: '';
        width: 12px;
        height: 12px;
        background: #AA3939;
        position: absolute;
        top: 4px;
        left: 4px;
        border-radius: 100%;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }
    [type="radio"]:not(:checked) + label:after {
        opacity: 0;
        -webkit-transform: scale(0);
        transform: scale(0);
    }
    [type="radio"]:checked + label:after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
  </style>
  </head>
  <body>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Welcome:</h1><?= $name ; ?>
          </div>
          <a href="../logout.php">logout</a>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <div class="error-content">
            <p>
              <input type="radio" id="timein" value="timein" name="radio" checked>
              <label for="timein">TIME IN</label>
            </p>
            <p>
              <input type="radio"value="timeout" id="timeout" name="radio">
              <label for="timeout">TIME OUT</label>
            </p>
              <div class="col-md-12">
                <input type="hidden" id="userID" value="<?= $userID; ?>">
                <div id="qrcode"></div>
              </div>
            </div>
        </div>
      </div>
    </section>
  </div>
    <script src="../phpqrcode/qrcode.js"></script>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
         var userID = document.getElementById('userID').value;
         let date = new Date().toLocaleDateString();
         var unix = Math.floor(new Date(date).getTime() / 1000)
         $('input[type=radio][name=radio]').change(function() {
            if (this.value == 'timein') {
            
              document.getElementById("qrcode").innerHTML = "";
              var qr = new QRCode(document.getElementById("qrcode"), 'in'+userID+'/'+unix);
           
              $("#qrcode").append(qr);
            }
            else if (this.value == 'timeout') {
              document.getElementById("qrcode").innerHTML = "";
              var qr = new QRCode(document.getElementById("qrcode"), 'ou'+userID+'/'+unix);
              
             $("#qrcode").append(qr);
            }
        });
    </script>
  </body>
</html>
<?php
}
else{
   header('location: ../login.php');
}
}
else{
 header('location: ../login.php');
}

?>
