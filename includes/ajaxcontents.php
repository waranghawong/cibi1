<?php
include "../includes/programs.inc.php";
include "../classes/userContr.classes.php";
$userdata = new UserCntr();
$user = $userdata->get_userdata();
if(isset($_GET['id'])){
    $child_id = $programs->getChildId($user['user_id'])['child_id'];
    $prgrm = $programs->getProgramDetails($_GET['id']);
     $school_data = $programs->getSchoolData($child_id);
     $income = $programs->getChildIncome($child_id)['income'];
     $child_age = $programs->getChildAge($child_id);
     $isMalnourished = $programs->isChildMalnourish($child_id);
  // var_dump($isMalnourished)['child_id'];
    // foreach($prgrm as $sd){
    // }
}
?>
            <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Program Information</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                        <?php 
                        $asd = explode(',', $prgrm['tags']);
                        $health = false;
                        $age = false;
                        $malnourished = '';
                        $school = false;
                        $school_message = '';
                        $forall = false;
                          foreach($asd as $sd){
             
                            // echo $sd.'<br>'; 
                            if($sd == "health "){
                              $health = true;
                            }

                            if (str_contains($sd, '-')) { 
                                $result = sscanf($sd, '%d-%d');
                                if ( in_array($child_age, range($result[0],$result[1])) ) {
                                  $age = true;
                                }
                                else{
                                  $age = false;
                                }
                            }

                            if ($sd == 'underweight ') {
                                if(str_contains($sd, $isMalnourished)){
                                  $malnourished = "<p class='red'>*Highly Suggested You are malnourished*</p>";
                                }
                                else{
                                  if($isMalnourished == 'obese'){
                                    $malnourished = "your are already $isMalnourished . we suggest to take a diet and have some exercise";
                                  }
                                  elseif($isMalnourished == 'overweight'){
                                    $malnourished = "your weight is $isMalnourished.  we suggest to take a diet and have some exercise";
                                  }
                                  else{
                                    $malnourished = "your weight is $isMalnourished ";
                                  }
                                 
                                }
                             }

                             if($sd == 'all '){
                              $forall = true;
                             }

                             if($sd == 'education ' && $age == false){
                              $school_message = '<p class="red">*You are only '.$child_age.' years of age to qualify in this program*</p>';
                             }

                             if($sd == 'college ' || $sd == 'senior high ' || $sd == 'elementary' || $sd == 'highschool'){

                               if(str_contains($sd, $school_data['recent_grade_level'])){
                                  $school = true;
                                }
                             }
                             
                            }

                            if($health == true && $age == true && $malnourished && $school == true){
                              echo '<b>Highly Recommended to enroll</b>';
                             }
                             if($health == true &&  $age == false){
                              echo '<p class="red">*You are only '.$child_age.' years of age to qualify in this program*</p>';
                             }
                             if($health == true &&  $age == true && $malnourished){
                              echo $malnourished;
                             }
                             if($health == true &&  $age == true and $malnourished == ''){
                              echo '<p class="red">*Highly Suggested*</p>';
                             }
                             if($forall == true){
                              echo '*You are eligible to apply for this program*';
                             }
                             if($school == true){
                              echo 'You can enroll to this program';
                             }
                             

                             echo $school_message;

                        

                            echo '<h1>'.$prgrm['program_name'].'</h1>';
                            echo '<p>'.$prgrm['program_description'].'</p>';
                            echo '<p>Open From : <b>'.$prgrm['date_from'].'</b></p>';
                            echo '<p>Will End To: <b>'.$prgrm['date_to'].'</b></p>';
                          
                        ?>
                     <button type="button" class="btn btn-sm btn-primary"  onclick="enrollChild(<?= $user['user_id']; ?>, <?= $_GET['id'] ?>)">Enroll Now</button>
                   
                    </div>
                  </div>

                </div>
              </div>
            </div>





    <script>
        function enrollChild(child_id, program_id){
            $.ajax({
            type: "POST",
            url: "../includes/programs.inc.php",
            data: {
                id: child_id,
                program_id: program_id
            },

            success: function(response){
                var json = $.parseJSON(response);
                   if(json[0].error){
                  
                        $('.error_div').html(json[0].error)
                        $( ".error_alert" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                    }
                    else{
                        $('.success_div').html(json[0].success)
                        $( ".success_alert" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                    }
                   
            },

            error: function(){
            },

            complete: function(){
            }
        });
        }
    </script>