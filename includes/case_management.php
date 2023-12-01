
<?php
include "../includes/programs.inc.php";
include "../classes/userContr.classes.php";
$userdata = new UserCntr();
$user = $userdata->get_userdata();
if(isset($_GET['id'])){
    var_dump($_GET['id']);
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



                    <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Active</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Non-Active</a>
                      </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                            synth. Cosby sweater eu banh mi, qui irure terr.
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                            booth letterpress, commodo enim craft beer mlkshk aliquip
                      </div>
                    </div>
                  </div>
               

    </div>
</div>
