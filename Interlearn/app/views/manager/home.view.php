<?php $this->view("includes/header");?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<div class="main-body-div">
<div class="recp_view_container">
<?php $this->view("includes/sidebar_man");?>

    <div class="top-to-bottom-content">
    <?php $this->view("includes/nav");?>
        <div class="all-middle-content ">
    <!-- <div class="mng_view_content"> -->
        <!-- <h1 class="recp_view_greeting">Good Morning Monica!</h1><br> -->
            <!-- <div class="mng_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/team.png" alt="" class="mng_view_img">
                    <h3>Staffs</h3>
                    <p>View all the staffs in the institute</p>
                </a>
            </div>
            <div class="mng_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/enquiry.png" alt="" class="mng_view_img">
                    <h3>Enquiry</h3>
                    <p>View all the unsolved enquiries</p>
                </a>
            </div>
            <div class="mng_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/write.png" alt="" class="mng_view_img">
                    <h3>Students</h3>
                    <p>View all the students in the institute</p>
                </a>
            </div>
            <div class="mng_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/calendar.png" alt="" class="mng_view_img">
                    <h3>Time Table</h3>
                    <p>Check today's Time Table</p>
                </a>
            </div>
            <div class="mng_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/systemlog.png" alt="" class="mng_view_img">
                    <h3>System Log</h3>
                    <p>Review the system log</p>
                </a>
            </div> -->

        <!-- </div> -->

        <div class="maindash0">
        <!-- <h1 class="recp_view_greeting">Good Morning Monica!</h1><br> -->

        <!-- <div class="recep_view_greeting">
                    <div class="teach_view_greet">Welcome Back,<br> <?= ucfirst(Auth::getusername())?>!</div>
                    <img src="<?=ROOT?>/assets/images/education.png" alt="">
                </div> -->
                <div class="maindash4">


            <div class="recp_view_rectangle nomargin">
             <a href="http://localhost/Interlearn/public/staffs/profileView">
                    <img src="<?=ROOT?>/assets/images/homepage/student.png" alt="" class="recp_view_img">
                    <p>Students</p>
                </a>
            </div>
            <!-- <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/course">
                    <img src="<?=ROOT?>/assets/images/homepage/course.png" alt="" class="recp_view_img">
                    <p>Courses</p>
                </a>
            </div> -->
            <div class="recp_view_rectangle nomargin">
                <a href="http://localhost/Interlearn/public/manager/staff">
                    <img src="<?=ROOT?>/assets/images/homepage/staf.png" alt="" class="recp_view_img">
                    <p>Staffs</p>
                </a>
            </div>


            <div class="recp_view_rectangle nomargin">
                <a href="<?=ROOT?>/courses">
                    <img src="<?=ROOT?>/assets/images/homepage/register1.png" alt="" class="recp_view_img">
                    <p>Courses</p>
                </a>
            </div>

        </div>
        <div class="maindash3">
            <div class="staffChart">
                <canvas id="staffChart" style="width:100%"></canvas>
            </div>
            <div class="subjectChart">
                <canvas id="subjectChart" style="width:100%"></canvas>
            </div>
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
    </div>
    <!-- <div  id="overlay"></div> -->
    <!-- <script defer src="./enquiry.js"></script> -->
    <script defer src="<?=ROOT?>/assets/js/calendar_recep.js?v=<?php echo time(); ?>"></script>
    <script defer src="<?=ROOT?>/assets/js/enrollmentchart.js?v=<?php echo time(); ?>"></script>
    <!-- <script defer src="./enquiry.js"></script> -->
    <?php $this->view("includes/footer");?>