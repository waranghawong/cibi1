<?php
  include "../classes/userContr.classes.php";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootrap for the demo page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Animate CSS for the css animation support if needed -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />

        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Include SmartWizard CSS -->
    <link href="../vendors/jQuery-Smart-Wizard/css/demo.css" rel="stylesheet" type="text/css" />
    <link href="../vendors/jQuery-Smart-Wizard/css/smart_wizard_all.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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
                <h2><?= $name; ?></h2>
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
                    <img src="images/img.jpg" alt=""><?= $name; ?>
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

        <div class="fixed-plugin">
            <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
              <i class="bi-gear-fill"></i>
            </button>
        </div>

        <div class="mb-5 border-bottom">
              <div class="float-end text-muted me-3 mt-2">
                Step number: <span id="sw-current-step"></span> of <span id="sw-total-step"></span>
              </div>
              
              <h1>Add Child Record</h1>
              <div class="mb-2 text-muted justify-content-center">Our policy does not permit that the sponsored child or member of his/her family participates in any other sponsorship program. In case a double sponsorship is encountered, the drop of the child and the family will be taken into immediate effect.</div>

          
        </div>
       
          <!-- SmartWizard html -->
          <div id="smartwizard" dir="rtl-">
          <ul class="nav nav-progress">
              <li class="nav-item">
                <a class="nav-link" href="#step-1">
                  <div class="num">1</div>
                  Section I: Basic Child Information
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#step-2">
                  <span class="num">2</span>
                  Section II: Household Information
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#step-3">
                  <span class="num">3</span>
                  Section III: School Information
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#step-4">
                  <span class="num">4</span>
                  Section IV: Family Information
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#step-5">
                  <span class="num">5</span>
                  Section V: Un-Registered Siblings Living at Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#step-6">
                  <span class="num">6</span>
                  Section VI: Registered Siblings Living at Home
                </a>
              </li>
           </ul>

              <div class="tab-content">
                <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                 <form id="form-1" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                  <input type="hidden" class="child_profile_id" name="child_profile_id" value="">
                    <div class="col">
                      <label for="first_name" class="form-label">First name</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" value="" required>
                      <div class="valid-feedback">
                         Looks good!
                      </div>
                      <div class="invalid-feedback">
                         Please provide first name.
                      </div>
                    </div>
                    
                    <div class="col">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="last-name" name="last_name" value="" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Please provide last name.
                        </div>
                    </div>

                    <div class="col">
                        <label for="validationCustom02" class="form-label">Middle name</label>
                        <input type="text" class="form-control" name="middle_name" id="middle-name" value="" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                        <div class="invalid-feedback">
                          Please provide middle name.
                        </div>
                    </div>

                    <div class="col">
                        <label for="validationCustom02" class="form-label">Gender</label>
                          <div class="radio">
                              <label>
                                <input type="radio" class="flat" checked name="gender" value="male" > Male
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" class="flat" name="gender" value="female"> Female
                              </label>
                            </div>
                     </div>

                    <br>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Ad Consent</label>
                        <div class="radio">
                            <label>
                              <input type="radio" class="flat" checked name="consent" value="yes"> Yes
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" class="flat" name="consent" value="no"> No
                            </label>
                          </div>
                     </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" name="dob" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide middle name.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Height</label>
                      <input type="number" class="form-control" name="height" id="height" value="" placeholder="cm" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide height.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Weight</label>
                      <input type="number" class="form-control" name="weight" id="weight" placeholder="kg" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide weight.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Eye Color</label>
                      <input type="text" class="form-control" name="eye_color" id="eye_color" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide Eye Color.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Hair Color</label>
                      <input type="text" class="form-control" name="hair_color" id="hair_color" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide Hair Color.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Past Time</label>
                      <input type="text" class="form-control" name="past_time" id="past_times" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide Past Time.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Talents/Hobbies</label>
                      <input type="text" class="form-control" name="hobbies" id="hobbies" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide Talents/Hobbies.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Chores</label>
                      <input type="text" class="form-control" name="chores" id="chores" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide Chores.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Child Sleeps on</label>
                      <input type="text" class="form-control" name="child_sleeps_on" id="child_sleeps_on" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide Hair Color.
                      </div>
                    </div>

                    <div class="col">
                      <label for="validationCustom02" class="form-label">Language Spoken</label>
                      <input type="text" class="form-control" name="language" id="language" value="" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please provide Language Spoken.
                      </div>
                    </div>
                  </form>
                </div>
                <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                   <form id="form-2" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                      <div class="w-50 ml-0 mr-0 mx-auto text-center">
                        <input type="hidden" class="child_profile_id" name="child_profile_id" value="">
                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Address.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Approx. Monthly Income</label>
                              <select class="form-control" name="income">
                                  <option value="12000">Php 12,000 below</option>
                                  <option value="13000">Php 13,000-12,001</option>
                                  <option value="14000">Php 14,000-13,001</option>
                                  <option value="15000">Php 15,000-14,001</option>
                                  <option value="16000">Php 16,000-15,001</option>
                                  <option value="17000">Php 17,000-16,001</option>
                                  <option value="18000">Php 18,000-17,001</option>
                                  <option value="19000">Php 19,000-18,001</option>
                                  <option value="20000">Php 20,000-19,001</option>
                                  <option value="21000">Php 21,000-20,001</option>
                                  <option value="22000">Php 22,000-21,001</option>
                                  <option value="23000">Php 23,000-22,001</option>
                                  <option value="24000">Php 24,000-23,001</option>
                              </select>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Monthly Income.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">No. of Beds</label>
                            <input type="number" class="form-control" id="beds" name="beds" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide No. of Beds.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">No. of Persons</label>
                            <input type="number" class="form-control" id="no_of_persons" name="no_of_persons" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide No. of Persons.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Walls</label>
                            <input type="text" class="form-control" id="walls" name="walls" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Walls.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Roof</label>
                            <input type="text" class="form-control" id="roof" name="roof" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Roof.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Floor</label>
                            <input type="text" class="form-control" id="floor" name="floor" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Floor.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Overall Condition</label>
                            <input type="text" class="form-control" id="condition" name="condition" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Overall Condition.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Ownership Status</label>
                            <input type="text" class="form-control" id="ownership_status" name="ownership_status" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Overall Condition.
                            </div>
                          </div>
                          
                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Cooking Facility</label>
                            <input type="text" class="form-control" id="cooking_facility" name="cooking_facility" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Overall Condition.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Water Source</label>
                            <input type="text" class="form-control" id="water_source" name="water_source" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Overall Condition.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Electricity</label>
                            <input type="text" class="form-control" id="electricity" name="electricity" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Overall Condition.
                            </div>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="validationCustom02" class="form-label">Sanitary Facility</label>
                            <input type="text" class="form-control" id="sanitary_facility" name="sanitary_facility" value="" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                            <div class="invalid-feedback">
                              Please provide Overall Condition.
                            </div>
                          </div>

                      </div>
                  </form>
                </div>
                  <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                      <form id="form-3" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                      <input type="hidden" class="child_profile_id" name="child_profile_id" value="">
                      <input type="hidden" class="child_points" name="child_points" value="">
                        <div class="w-50 ml-0 mr-0 mx-auto text-center">
                            <div class="col-md-12 mt-3">
                                <label for="validationCustom02" class="form-label">Attends School?</label>
                                  <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" checked name="attends_school" onclick="hide1()" value="yes"> Yes
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" name="attends_school" onclick="show1()" value="no"> No
                                      </label>
                                    </div>
                                </div>

                              <div class="col-md-12 mt-3" id="why_not">
                                <label for="validationCustom02" class="form-label">Why not attend school?</label>
                                <input type="text" class="form-control" id="why_not_attend_school" name="why_not_attend_school" value="">
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Why not attend school?
                                </div>
                              </div>
                              <div class="no_attend">
                              <div class="col-md-12 mt-3">
                                <label for="validationCustom02" class="form-label">School Name</label>
                                <input type="text" class="form-control" id="school_name" name="school_name" value="" >
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                  Please provide School Name.
                                </div>
                              </div>

                               <div class="col-md-12 mt-3">
                                  <label for="validationCustom02" class="form-label">School Type</label>
                                  <select id="school_type" name="school_type" class="form-control">
                                      <option value=""></option>
                                      <option value="public">Public</option>
                                      <option value="private">Private</option>
                                  </select>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                    Please provide School Type.
                                  </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                  <label for="validationCustom02" class="form-label">Attainment</label>
                                  <select id="school_attainment" name="school_attainment" class="form-control">
                                      <option value=""></option>
                                      <option value="elementary">Elementary Graduate</option>
                                      <option value="hs_undergrad">High School Undergraduate</option>
                                      <option value="hs_grad">High School Graduate</option>
                                      <option value="college_grad">Colleg Graduate</option>
                                  </select>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                    Please provide School Type.
                                  </div>
                                </div>

                              <div class="col-md-12 mt-3">
                                <label for="validationCustom02" class="form-label">Academic Year</label>
                                <input type="text" class="form-control" id="academic_year" name="academic_year" value="" >
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                  Please provide Academic Year.
                                </div>
                              </div>

                              <div class="col-md-12 mt-3">
                                  <label for="validationCustom02" class="form-label">School Transportation</label>
                                  <input type="text" class="form-control" id="school_transportation" name="school_transportation" value="" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                    Please provide School Transportation.
                                  </div>
                              </div>

                              <div class="col-md-12 mt-3">
                                  <label for="validationCustom02" class="form-label">Time Travel to School</label>
                                  <input type="text" class="form-control" id="time_travel_to_school" name="time_travel_to_school" value="" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                    Please provide Time Travel to School.
                                  </div>
                                </div>

                              <div class="col-md-12 mt-3">
                                <label for="validationCustom02" class="form-label">Most Recent Grade Level Completed</label>
                                <input type="text" class="form-control" id="most_recent_grade_level_completed" name="most_recent_grade_level_completed" value="" >
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                  Please provide Most Recent Grade Level Completed.
                                </div>
                              </div>

                              <div class="col-md-12 mt-3">
                                <label for="validationCustom02" class="form-label">CURRENT GRADE LEVEL</label>
                                <input type="text" class="form-control" id="current_grade_level" name="current_grade_level" value="" >
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                  Please provide CURRENT GRADE LEVEL.
                                </div>
                              </div>

                              <div class="col-md-12 mt-3">
                                <label for="validationCustom02" class="form-label">Favorite School Subjects</label>
                                <input type="text" class="form-control" id="favorite_school_subject" name="favorite_school_subject" value="" >
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                  Please provide Favorite School Subjects.
                                </div>
                              </div>
                              </div>
                      </form>  
                  </div>
                  </div>

                  <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">

                     <form id="form-4" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                     <input type="hidden" class="child_profile_id" name="child_profile_id" value="">
                     <input type="hidden" class="child_points1" name="child_points" value="">
                          <div class="ml-0 mr-0 mx-auto text-center">

                            <div class="col-md-3 mt-3">
                                <label for="validationCustom02" class="form-label">Mother's Name</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" value="" required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                      Please provide Mother's Name.
                                </div>
                             </div>

                             <div class="col-md-3 mt-3">
                               <label for="validationCustom02" class="form-label">is Guardian?</label>

                                  <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" checked name="is_mother_guardian"  value="yes"> Yes
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" name="is_mother_guardian" value="no"> No
                                      </label>
                                    </div>
                               </div>

                                <div class="col-md-3 mt-3">
                                  <label for="validationCustom02" class="form-label">Why absent?</label>
                                  <input type="text" class="form-control" id="why_mother_absent" name="why_mother_absent" value="" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                      Please provide Why absent?
                                  </div>
                                </div>

                            <div class="col-md-3 mt-3">
                                <label for="validationCustom02" class="form-label">Occupation</label>
                                <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" value="" required>
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                  Please provide Mother's Occupation.
                                </div>
                              </div>
                             </div>

                            <div class="ml-0 mr-0 mx-auto text-center">
                                <div class="col-md-3 mt-3">
                                  <label for="validationCustom02" class="form-label">Father's Name</label>
                                  <input type="text" class="form-control" id="father_name" name="father_name" value="" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                    Please provide Father's Name.
                                  </div>
                              </div>

                            <div class="col-md-3 mt-3">
                              <label for="validationCustom02" class="form-label">is Guardian?</label>

                                  <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" checked name="father_guardian" value="yes"> Yes
                                      </label>
                                    </div>
                                    <div class="radio">
                                      <label>
                                        <input type="radio" class="flat" name="father_guardian" value="no"> No
                                      </label>
                                    </div>
                              </div>

                              <div class="col-md-3 mt-3">
                                <label for="validationCustom02" class="form-label">Why Absent?</label>
                                <input type="text" class="form-control" id="father_absent" name="father_absent" value="">
                                <div class="valid-feedback">
                                  Looks good!
                                </div>
                                <div class="invalid-feedback">
                                  Please provide Why Absent?.
                                </div>
                              </div>

                              <div class="col-md-3 mt-3">
                                  <label for="validationCustom02" class="form-label">Occupation</label>
                                  <input type="text" class="form-control" id="father_occupation" name="father_occupation" value="" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                   <div class="invalid-feedback">
                                    Please provide Father's Occupation.
                                  </div>
                                </div>
                              </div>

                            <div class="ml-0 mr-0 mx-auto text-center">
                            <div class="col-md-6 mt-3">
                              <label for="validationCustom02" class="form-label">Guardian's Name</label>
                              <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="">
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Please provide Guardians's Name.
                              </div>
                            </div>

                            <div class="col-md-3 mt-3">
                              <label for="validationCustom02" class="form-label">Occupation</label>
                              <input type="text" class="form-control" id="guardian_occupation" name="guardian_occupation" value="">
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Please provide Guardian's Occupation.
                              </div>
                            </div>

                            <div class="col-md-3 mt-3">
                              <label for="validationCustom02" class="form-label">Relationship</label>
                              <input type="text" class="form-control" id="guardian_relationship" name="guardian_relationship" value="">
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Please provide guardian's relationship.
                              </div>
                            </div>

                            <div class="col-md-12 mt-3">
                              <label for="validationCustom02" class="form-label">Child lives with:</label>
                              <input type="text" class="form-control" id="child_lives_with" name="child_lives_with" value="" required>
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Please provide Child lives with.
                              </div>
                            </div>
                          </div>
                      </form>  
                   </div>
                   <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                       <form id="form-5" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                       <input type="hidden" class="child_profile_id" name="child_profile_id" value="">
                       <input type="hidden" class="child_points2" name="child_points2" value="">
                         <div class="col" id="extended">
                            <div class="text-center">
                               <div class="col-md-3 mt-3">
                                  <label for="validationCustom02" class="form-label">First Name</label>
                                  <input type="text" class="form-control" name="unreg_sibling_first_name[]" value="" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                        Please provide first name.
                                  </div>
                               </div>

                               <div class="col-md-3 mt-3">
                                  <label for="validationCustom02" class="form-label">Last Name</label>
                                  <input type="text" class="form-control" name="unreg_sibling_last_name[]" value="" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                        Please provide last name.
                                  </div>
                               </div>

                               <div class="col-md-3 mt-3">
                                    <label for="validationCustom02" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="unreg_sibling_dob[]" value="" required>
                                    <div class="valid-feedback">
                                      Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                          Please provide Mother's Name.
                                    </div>
                                </div>
                             </div>

                             <div class="col-md-1 mt-3">
                                  <label for="validationCustom02" class="form-label">Gender</label>

                                      <div class="radio">
                                        <label>
                                          <input type="radio" class="flat" checked name="unreg_siblings_gender0[]" value="male"> Male
                                        </label>
                                
                                        <label>
                                          <input type="radio" class="flat" name="unreg_siblings_gender0[]" value="female"> Female
                                        </label>
                                      </div>

                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                        Please provide Mother's Name.
                                  </div>
                               </div>

                               <div class="col-md-2 mt-3">
                                  <label for="validationCustom02" class="form-label"></label>
                                  <button type="button" onclick="addMoreField1()" class="btn btn-md btn-success"><i class="fa fa-plus"></i>Add More Fields</button>
                              </div>

                          </div>
                      </form>
                   </div>

                   <div id="step-6" class="tab-pane" role="tabpanel" aria-labelledby="step-6">
                    <form id="form-6" class="row row-cols-1 ms-5 me-5 needs-validation" novalidate>
                     <input type="hidden" class="child_profile_id" name="child_profile_id" value="">
                     <input type="hidden" class="child_count" name="child_count" value="">
                     <input type="hidden" class="child_points3" name="child_points3" value="">
                         <div class="col" id="extended1">
                            <div class="text-center">
                               <div class="col-md-3 mt-3">
                                  <label for="validationCustom02" class="form-label">First Name</label>
                                  <input type="text" class="form-control" name="siblings_first_name[]" value="" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                        Please provide first name.
                                  </div>
                               </div>

                               <div class="col-md-3 mt-3">
                                  <label for="validationCustom02" class="form-label">Last Name</label>
                                  <input type="text" class="form-control" name="siblings_last_name[]" value="" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                        Please provide last name.
                                  </div>
                               </div>

                               <div class="col-md-3 mt-3">
                                    <label for="validationCustom02" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" name="sibling_dob[]" value="" required>
                                    <div class="valid-feedback">
                                      Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                          Please provide Mother's Name.
                                    </div>
                                </div>
                             </div>

                             <div class="col-md-1 mt-3">
                                  <label for="validationCustom02" class="form-label">Gender</label>

                                      <div class="radio">
                                        <label>
                                          <input type="radio" class="flat" checked name="siblings_gender0[]" value="male"> Male
                                        </label>
                                
                                        <label>
                                          <input type="radio" class="flat" name="siblings_gender0[]" value="female"> Female
                                        </label>
                                      </div>

                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                  <div class="invalid-feedback">
                                        Please provide Mother's Name.
                                  </div>
                               </div>

                               <div class="col-md-2 mt-3">
                                  <label for="validationCustom02" class="form-label"></label>
                                  <button type="button" onclick="addMoreField2()" class="btn btn-md btn-success"><i class="fa fa-plus"></i>Add More Fields</button>
                              </div>

                          </div>
                      </form>
                  </div>
              </div>

              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
          </div>
    
    </div>

    

    <!-- Confirm Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmModalLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Well done!
          </div>
          Your total point is: <b class= "total_points"></b>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="closeModal()">Ok, close and reset</button>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.min.js"></script>

    <script type="text/javascript" src="../vendors/jQuery-Smart-Wizard/js/demo.js"></script>

    <script type="text/javascript">

      var input_count = 0;
      var reg_input_count = 0;
      function addMoreField1(){
        $('.tab-content').css("overflow", 'scroll');
        $('.tab-content').css("height", '600px');
        var max_fields = 10;
       
        if(input_count < max_fields){
         input_count += 1;
         var html = '';
          html += ' <div class="col-md-12 removeMe">';
           html += '<div class="text-center">';
              html += '<div class="col-md-3 mt-3">';
                html += '<label for="validationCustom02" class="form-label">First Name</label>';
                html += '<input type="text" class="form-control" name="unreg_sibling_first_name[]" value="" required>';
                html += '<div class="valid-feedback">'+ ' Looks good!' + '</div>';
                html += ' <div class="invalid-feedback">Please provide Siblings Name</div>';
              html += '</div>';

              html += '<div class="col-md-3 mt-3">';
                html += '<label for="validationCustom02" class="form-label">Last Name</label>';
                html += '<input type="text" class="form-control" name="unreg_sibling_last_name[]" value="" required>';
                html += '<div class="valid-feedback">'+ ' Looks good!' + '</div>';
                html += ' <div class="invalid-feedback">Please provide Siblings Name</div>';
              html += '</div>';

              html += '<div class="col-md-3 mt-3">';
                html += '<label for="validationCustom02" class="form-label">Date of Birth</label>';
                html += '<input type="date" class="form-control" name="unreg_sibling_dob[]" value="" required>';
                html += '<div class="valid-feedback">'+ ' Looks good!' + '</div>';
                html += '<div class="invalid-feedback">Please provide Siblings Name</div>';
              html += '</div>';
           html += '</div>';

            html += '<div class="col-md-1 mt-3">';
              html += '<label for="validationCustom02" class="form-label">Gender</label>';
              html += ' <div class="radio">';
              html += '<label>';
              html += ' <input type="radio" class="flat" checked name="unreg_siblings_gender'+ input_count +'[]" value="male"> Male';
              html += '</label>';

              html += '<label>';
              html += ' <input type="radio" class="flat" name="unreg_siblings_gender'+ input_count +'[]" value="female"> Female';
              html += '</label>';
             html += '</div>';
             html += '</div>';
             html+= '<div class="col-md-2 mt-3">';
                html += '<label for="validationCustom02" class="form-label"></label>';
                html += '<button type="button" class="btn btn-sm btn-danger removeField"><i class="fa fa-trash"></i></button>';
              html += '</div>';    
           html += '</div>';


            
               $('#extended').append(html);
           
           }
      

           $('#extended').on('click', '.removeField', function(e){
            e.preventDefault();
            $(this).closest('.removeMe').remove();
            input_count--;
           })
      }

      function addMoreField2(){
        $('.tab-content').css("overflow", 'scroll');
        $('.tab-content').css("height", '600px');
        var max_fields = 10;
    
        var html = '';
        if(reg_input_count < max_fields){
            reg_input_count += 1;
      
        html += ' <div class="col-md-12 removeMe">';
           html += '<div class="text-center">';
              html += '<div class="col-md-3 mt-3">';
                html += '<label for="validationCustom02" class="form-label">First Name</label>';
                html += '<input type="text" class="form-control" name="siblings_first_name[]" value="" required>';
                html += '<div class="valid-feedback">'+ ' Looks good!' + '</div>';
                html += ' <div class="invalid-feedback">Please provide Father Name</div>';
              html += '</div>';

              html += '<div class="col-md-3 mt-3">';
                html += '<label for="validationCustom02" class="form-label">Last Name</label>';
                html += '<input type="text" class="form-control" name="siblings_last_name[]" value="" required>';
                html += '<div class="valid-feedback">'+ ' Looks good!' + '</div>';
                html += ' <div class="invalid-feedback">Please provide Father Name</div>';
              html += '</div>';

              html += '<div class="col-md-3 mt-3">';
                html += '<label for="validationCustom02" class="form-label">Date of Birth</label>';
                html += '<input type="date" class="form-control" name="sibling_dob[]" value="" required>';
                html += '<div class="valid-feedback">'+ ' Looks good!' + '</div>';
                html += '<div class="invalid-feedback">Please provide Father Name</div>';
              html += '</div>';
           html += '</div>';

            html += '<div class="col-md-1 mt-3">';
              html += '<label for="validationCustom02" class="form-label">Gender</label>';
              html += ' <div class="radio">';
              html += '<label>';
              html += ' <input type="radio" class="flat" checked name="siblings_gender'+ reg_input_count +'[]" value="male"> Male';
              html += '</label>';

              html += '<label>';
              html += ' <input type="radio" class="flat" name="siblings_gender'+ reg_input_count +'[]" value="female"> Female';
              html += '</label>';
             html += '</div>';
             html += '</div>';
             html+= '<div class="col-md-2 mt-3">';
                html += '<label for="validationCustom02" class="form-label"></label>';
                html += '<button type="button" class="btn btn-sm btn-danger removeField"><i class="fa fa-trash"></i></button>';
              html += '</div>';    
           html += '</div>';

      
              $('#extended1').append(html);
           }
      

           $('#extended1').on('click', '.removeField', function(e){
            e.preventDefault();
            $(this).closest('.removeMe').remove();
            input_count--;
           })
      }
      
        $('#why_not').hide();
      function show1(){
        $('#why_not').show();
        $('#why_not_attend_school').prop('required', true);
        $('.no_attend').hide();
      }
      function hide1(){
        $('#why_not').hide();
        $('#why_not_attend_school').prop('required', false);
        $('.no_attend').show();
      }

      
        const myModal = new bootstrap.Modal(document.getElementById('confirmModal'));


        function onCancel() { 
          // Reset wizard
          $('#smartwizard').smartWizard("reset");

          // Reset form
          document.getElementById("form-1").reset();
          document.getElementById("form-2").reset();
          document.getElementById("form-3").reset();
          document.getElementById("form-4").reset();
          document.getElementById("form-5").reset();
          document.getElementById("form-6").reset();
        }

        function onConfirm() {
          // if (form) {
          //   if (!form.checkValidity()) {
          //     form.classList.add('was-validated');
          //     $('#smartwizard').smartWizard("setState", [3], 'error');
          //     $("#smartwizard").smartWizard('fixHeight');
          //     return false;
          //   }
            
          //   $('#smartwizard').smartWizard("unsetState", [3], 'error');
     
          // }
          let form_6 =  $('#form-6').serializeArray()
                  $.ajax({  
                    type: "POST",  
                    url: "../includes/child_registered_siblings.inc.php",  
                    data: form_6,  
                    success: function(value) {  
                      response = JSON.parse(value);
                    //   $.each(value, function(index, data) {
                 
                    //     console.log(data.id)
                
                    // });
                    console.log(response);
                       $('.child_profile_id').val(response.id)
                       $('.total_points').html(response.points);
                       myModal.show();
                    }
                });
        }

        function closeModal() {
          // Reset wizard
          $('#smartwizard').smartWizard("reset");

          // Reset form
          document.getElementById("form-1").reset();
          document.getElementById("form-2").reset();
          document.getElementById("form-3").reset();
          document.getElementById("form-4").reset();
          document.getElementById("form-5").reset();
          document.getElementById("form-6").reset();

          myModal.hide();
        }

        function showConfirm() {
          const name = $('#first-name').val() + ' ' + $('#last-name').val();
          const products = $('#sel-products').val();
          const shipping = $('#address').val() + ' ' + $('#state').val() + ' ' + $('#zip').val();
          let html = `
                  <div class="row">
                    <div class="col">
                      <h4 class="mb-3-">Customer Details</h4>
                      <hr class="my-2">
                      <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <label class="col-form-label">Name</label>
                        </div>
                        <div class="col-auto">
                          <span class="form-text-">${name}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <h4 class="mt-3-">Shipping</h4>
                      <hr class="my-2">
                      <div class="row g-3 align-items-center">
                        <div class="col-auto">
                          <span class="form-text-">${shipping}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  
        
                  <h4 class="mt-3">Products</h4>
                  <hr class="my-2">
                  <div class="row g-3 align-items-center">
                    <div class="col-auto">
                      <span class="form-text-">${products}</span>
                    </div>
                  </div>

                  `;
          $("#order-details").html(html);
          $('#smartwizard').smartWizard("fixHeight"); 
        }

        $(function() {
        
            // Leave step event is used for validating the forms
            $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIdx, nextStepIdx, stepDirection) {
                // Validate only on forward movement  
                if (stepDirection == 'forward') {
                  let form = document.getElementById('form-' + (currentStepIdx + 1));
                
                  if (form) {
                    if (!form.checkValidity()) {
                      form.classList.add('was-validated');
                      $('#smartwizard').smartWizard("setState", [currentStepIdx], 'error');
                      $("#smartwizard").smartWizard('fixHeight');
          
                      return false;
                    }
                    $('#smartwizard').smartWizard("unsetState", [currentStepIdx], 'error');
                  }
                }
            });

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if(stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if(stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }

                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);

                if (stepPosition == 'last') {
                  showConfirm();
                  $("#btnFinish").prop('disabled', false);
                } else {
                  $("#btnFinish").prop('disabled', true);
                }

                // Focus first name
                if (stepIndex == 1) {
                 let form_1 =  $('#form-1').serializeArray()
                 console.log(form_1)
                 $.ajax({  
                    type: "POST",  
                    url: "../includes/child_profile.inc.php",  
                    data: form_1,  
                    success: function(value) {  
                      response = JSON.parse(value);
                    //   $.each(value, function(index, data) {
                 
                    //     console.log(data.id)
                
                    // });
                       $('.child_profile_id').val(response.id)
                    }
                });

                }
                if (stepIndex == 2) {
                  let form_2 =  $('#form-2').serialize()
                  $.ajax({  
                    type: "POST",  
                    url: "../includes/house_holinfo.inc.php",  
                    data: form_2,  
                    success: function(value) {  
                      response = JSON.parse(value);
                    //   $.each(value, function(index, data) {
                 
                    //     console.log(data.id)
                
                    // })
                    console.log(response);
                    $('.child_points').val(response.points);

                
                    }
                });
                }
                if (stepIndex == 3) {
                  let form_3 =  $('#form-3').serialize()
                  $.ajax({  
                    type: "POST",  
                    url: "../includes/child_school_info.inc.php",  
                    data: form_3,  
                    success: function(value) {  
                      response = JSON.parse(value);
                    //   $.each(value, function(index, data) {
                 
                    //     console.log(data.id)
                
                    // })
                    console.log(response);
                    $('.child_points1').val(response.points);
                    $('.child_points3').val(response.points);
                    }
                });
                }
                if (stepIndex == 4) {
                  let form_4 =  $('#form-4').serialize()
                  $.ajax({  
                    type: "POST",  
                    url: "../includes/child_family_info.inc.php",  
                    data: form_4,  
                    success: function(value) {  
                      response = JSON.parse(value);
                    //   $.each(value, function(index, data) {
                 
                    //     console.log(data.id)
                
                    // })
                        $('.child_points2').val(response.points);
                    }
                });
                }
                if (stepIndex == 5) {
                  let form_5 =  $('#form-5').serializeArray()
                  $.ajax({  
                    type: "POST",  
                    url: "../includes/child_unregistered_siblings.inc.php",  
                    data: form_5,  
                    success: function(value) {  
                      response = JSON.parse(value);
                    //   $.each(value, function(index, data) {
                 
                    //     console.log(data.id)
                
                    // });
                       $('.child_profile_id').val(response.id)
                       $('.child_count').val(response.count)
                    }
                });
                }
                if (stepIndex == 6) {
                  let form_6 =  $('#form-6').serialize()
                  $.ajax({  
                    type: "POST",  
                    url: "../includes/child_registered_siblings.inc.php",  
                    data: form_6,  
                    success: function(value) {  
                      response = JSON.parse(value);
                    //   $.each(value, function(index, data) {
                 
                    //     console.log(data.id)
                
                    // });
                       $('.child_profile_id').val(response.id)
                    }
                });
                  
                }
            });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                // autoAdjustHeight: false,
                theme: 'arrows', // basic, arrows, square, round, dots
                transition: {
                  animation:'none'
                },
                toolbar: {
                  showNextButton: true, // show/hide a Next button
                  showPreviousButton: true, // show/hide a Previous button
                  position: 'bottom', // none/ top/ both bottom
                  extraHtml: `<button class="btn btn-success" id="btnFinish" disabled onclick="onConfirm()">Finish</button>
                              <button class="btn btn-danger" id="btnCancel" onclick="onCancel()">Cancel</button>`
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation 
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: true, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
            });

            $("#state_selector").on("change", function() {
                $('#smartwizard').smartWizard("setState", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

            $("#style_selector").on("change", function() {
                $('#smartwizard').smartWizard("setStyle", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

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