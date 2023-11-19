<?php
  include "../classes/userContr.classes.php";
  include "../includes/child_account.inc.php";

  $userdata = new UserCntr();
  $user = $userdata->get_userdata();

if(isset($user)){
      
  $name = ucfirst(ucfirst($user['full_name']));
  $username = $user['username'];
  $role = $user['role'];
  if(isset($role) == 'Admin'){


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>CIBI</title>
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <style>
      .left_col .scroll-view{
        background-color: #8c4c97;
      }
      .site_title{
        background-color: #8c4c97;
      }
      .main_container{
        background-color: #8c4c97;
      }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><image src="../images/logo-purple.png" height="25" width="50"><span>CIBI</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu_fixed">
              <div class="menu_section">
                <h3>General</h3>
                <?php include_once("../includes/side_menu.php") ?>
              </div>
            

            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="../includes/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                  
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

        <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Users Table</h2>
                    <div class="clearfix"></div>
                  </div>
                  <button type="button" data-toggle="modal" data-target=".addUser" class="btn btn-sm btn-primary">Create Child Account</button>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">

                          <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>User Management</th>
                                <th>Child Profile</th>
                                <th>Scheduler</th>
                                <th>Reports</th>
                                <th>Utilities</th>
                                <th>Action</th>
                              </tr>
                            </thead>


                            <tbody>
                            
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            
    </div>
    </div>
    </div>
        </div>
        <!-- /page content -->


        
        

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="https://colorlib.com">CIBI</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

     <!-- Add User Modal -->
     <div class="modal fade addUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Child Account</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../includes/users.inc.php">
                       <label for="getChildData">Select Child Profile</label>
                        <select class="form-control" name="child_account"  id="getChildData">
                          <option></option>
                          <?php
                            foreach($child_account->getHasNoAccountChild() as $sd){
                              
                              echo '<option value="'.$sd['id'].'">'.$sd['first_name'].' '.$sd['last_name'].'</option>';
                            }
                          ?>
											
												</select>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="user_email">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Password</label>
                            <input type="password" class="form-control" name="password" id="user_password">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                        </div>
                        <p id="conpasscheck" style="color: red;"></p>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" name="email" id="user_email">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" name="address" id="child_address" disabled>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                    
                      
                                
                            <div class="form-group col-md-12">
                            <button type="submit" name="submit" id="btn_submit" class="btn btn-primary">Submit</button>
                            </div>
                                
                       
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    <!-- edit User Modal -->
    <div class="modal fade editUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../includes/users.inc.php">
                      <input type="text" id="edit_sub_id" name="edit_sub_id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Name">First Name</label>
                                <input type="text" class="form-control" name="edit_first_name" id="edit_first_name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="user_email">Last Name</label>
                                <input type="text" class="form-control" name="edit_last_name" id="edit_last_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="user_email">Username</label>
                            <input type="text" class="form-control" name="edit_username" id="edit_username">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Password</label>
                            <input type="password" class="form-control" name="edit_password" id="edit_user_password">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Confirm Password</label>
                            <input type="password" class="form-control" name="edit_confirm_password" id="edit_prof_confirm_password">
                        </div>
                        <p id="edit_conpasscheck" style="color: red;"></p>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" class="form-control" name="edit_email" id="edit_user_email">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address</label>
                            <input type="text" class="form-control" name="edit_address" id="edit_user_address">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Phone Number</label>
                            <input type="text" class="form-control" name="edit_phone" id="edit_phone">
                        </div>

                        <label for="user_email">Restriction</label>

                            <div class="form-group  col-md-12 ml-3">
                               
                                <input type="checkbox" class="custom-control-input" id="edit_user_management" value="user_management" name="edit_subadmin_sttngs[]">
                                <label class="custom-control-label" for="edit_user_management">User Management</label>
                            </div>

                           <div class="form-group col-md-6 ml-3">
                              
                                <input type="checkbox" class="custom-control-input" id="edit_child_profile" value="child_profile" name="edit_subadmin_sttngs[]">
                                <label class="custom-control-label" for="edit_child_profile">Child Profile</label>
                            </div>

                            <div class="form-group col-md-12 ml-3">
                              
                                <input type="checkbox" class="custom-control-input" id="edit_scheduler" value="scheduler" name="edit_subadmin_sttngs[]">
                                <label class="custom-control-label" for="edit_scheduler">Scheduler</label>
                            </div>


                            <div class="form-group col-md-6 ml-3">
                               
                                <input type="checkbox" class="custom-control-input" id="edit_reports" value="reports" name="edit_subadmin_sttngs[]">
                                <label class="custom-control-label" for="edit_reports">Reports</label>
                          
                            </div>


                            <div class="form-group   col-md-12 ml-3">
                                <input type="checkbox" class="custom-control-input" id="edit_edit_utilities" value="utilities" name="edit_subadmin_sttngs[]">
                                <label class="custom-control-label" for="edit_edit_utilities">Utilities</label>
                            </div>
                                
                            <div class="form-group col-md-12">
                            <button type="submit" name="btn_edit_submit" id="edit_btn_submit" class="btn btn-primary">Submit</button>
                            </div>
                                
                       
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script>
       $(document).ready(function () {

        $("#getChildData").on("change", function() {
          var child_id = $('#getChildData').val();

          $.ajax({
                    method: "get",
                    url: "../includes/child_account.inc.php?child_id=" + child_id,
                    success: function (response){
                      var data = $.parseJSON(response)
                      console.log(data);
                      $('#first_name').val(data[0].first_name)
                      $('#last_name').val(data[0].last_name)
                      $('#child_address').val(data[0].address)
                    }
                })
        }).trigger("change");

        $("#conpasscheck").hide();
        $("#btn_submit").hide();
        let confirmPasswordError = true;
        $("#confirm_password").keyup(function () {
            validateConfirmPassword();
        });

        function validateConfirmPassword() {
        let confirmPasswordValue = $("#confirm_password").val();
        let passwordValue = $("#user_password").val();
        if (passwordValue != confirmPasswordValue) {
            $("#conpasscheck").show();
            $("#conpasscheck").html("Password didn't Match");
            $("#conpasscheck").css("color", "red");
            confirmPasswordError = false;
            return false;
        } else {
            $("#conpasscheck").hide();
            $("#btn_submit").show();
        }
    }

    
        
    });
    </script>
    <script>
        function deleteUser(id){
            var confirmation = confirm("are you sure you want to remove the item?");

            if(confirmation){
                $.ajax({
                    method: "get",
                    url: "../includes/users.inc.php?delete_user=" + id,
                    success: function (response){
                    $("#records_"+id).remove();
                    }
                })
            }
        }

        function editSubAdmin(id){
            $.ajax({
                method: "get",
                dataType: "json",
                url: "../includes/users.inc.php?userid=" + id,
                success: function (response){
                $.each(response, function(index, data) {
                        $('#edit_sub_id').val(id)
                        $('#edit_first_name').val(data.first_name)
                        $('#edit_last_name').val(data.last_name)
                        $('#edit_username').val(data.username)
                        $('#edit_user_address').val(data.address)
                        $('#edit_user_email').val(data.email)
                        $('#edit_phone').val(data.phoneNumber)
                        if(data.user_management =='1' ){
                            $( "#edit_user_management" ).prop( "checked", true );
                        }
                        if(data.child_profile == '1'){
                            $( "#edit_child_profile" ).prop( "checked", true );
                        }
                        if(data.scheduler == '1'){
                            $( "#edit_scheduler" ).prop( "checked", true );
                        }
                        if(data.reports == '1'){
                            $( "#edit_reports" ).prop( "checked", true );
                        }
                        if(data.utilities == '1'){
                            $( "#edit_edit_utilities" ).prop( "checked", true );
                        }
                        
                       
                    });
                }
            })
            // $('#prof_uid').val(prof_id);
            $('.editUser').modal(); 
        }
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
