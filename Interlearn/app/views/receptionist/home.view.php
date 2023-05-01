<?php $this->view("includes/header");?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<div class="main-body-div">
    <?php $this->view("includes/sidebar_recep");?>
 

   
    
<div class="recp_view_container top-to-bottom-content">     
    <?php $this->view("includes/nav");?>
    <div class="all-middle-content">
    <div class="maindash0">
        <!-- <h1 class="recp_view_greeting">Good Morning Monica!</h1><br> -->

        <div class="recep_view_greeting">
                    <div class="teach_view_greet">Welcome Back,<br> <?= ucfirst(Auth::getusername())?>!</div>
                    <img src="<?=ROOT?>/assets/images/homepage/staffs.png" alt="" class="homepageHand">
                </div>
        <div class="maindash2">
            <div class="statNow" id="statNow">
            <div class="tablet1">
                <p id="thisYear"></p> This Year Enrollments
            </div>
            <div class="tablet2">
                <p id="thisMonth"></p> This Month Enrollments
            </div>
            
            </div>
            <div class="enrollChart" id="enrollchart">
                    Enrollments per Year
            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
        </div>
        <div class="maindash1">
            
        <div class="maincard">
            <div class="recp_view_rectangle">
                <a href="http://localhost/Interlearn/public/staffs/profileView">
                    <img src="<?=ROOT?>/assets/images/homepage/student.png" alt="" class="recp_view_img">
                    <p>Students</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/course">
                    <img src="<?=ROOT?>/assets/images/homepage/course.png" alt="" class="recp_view_img">
                    <p>Courses</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
            <a href="http://localhost/Interlearn/public/staffs/profilestaffView">
                    <img src="<?=ROOT?>/assets/images/homepage/staf.png" alt="" class="recp_view_img">
                    <p>Staffs</p>
                </a>
            </div>
            <!-- <div class="recp_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/tt.png" alt="" class="recp_view_img">
                    <p>Time Table</p>
                </a>
            </div> -->
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/announcement">
                    <img src="<?=ROOT?>/assets/images/homepage/announcement.png" alt="" class="recp_view_img">
                    <p>Announcement</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/enrollment">
                    <img src="<?=ROOT?>/assets/images/homepage/enroll.png" alt="" class="recp_view_img">
                    <p>Student Enrollments</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/registration">
                    <img src="<?=ROOT?>/assets/images/homepage/register1.png" alt="" class="recp_view_img">
                    <p>Registration</p>
                </a>
            </div>
        </div>
        </div>
        
        </div>
        <div class="student_calendar">
        <?php $this->view("includes/calendar");?>
        <div id = "assignment_today" class ="assignment_today">
           <!-- <a href ="http://localhost/Interlearn/public/student/coursepg/submissionstatus/4?id=M.Pavithra63fb0e481edef3.79614533"> <div  class ="assignment_card">
                <div class ="assignment_card_title"><p>Mathematics assignment 1 is due<p></div>
                <ul> 
                    <li> Deadline: 2020-02-04</li>
                    <li> Subject: Mathematics</li>
                </ul>
            </div>
                    </a> -->
           
        </div> 
    </div>
</div>
    </div>
</div> 
    <!-- <div  id="overlay"></div> -->
    <script defer src="<?=ROOT?>/assets/js/calendar_recep.js?v=<?php echo time(); ?>"></script>
    <script defer src="<?=ROOT?>/assets/js/enrollmentchart.js?v=<?php echo time(); ?>"></script>
    <!-- <script defer src="./enquiry.js"></script> -->
    <?php $this->view("includes/footer");?>