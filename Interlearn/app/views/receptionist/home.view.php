<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_view_container">
    <?php $this->view("includes/sidebar_recep");?>
    <div class="recp_view_content">
        <!-- <h1 class="recp_view_greeting">Good Morning Monica!</h1><br> -->
            <div class="recp_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/recp_std.png" alt="" class="recp_view_img">
                    <p>Students</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/course">
                    <img src="<?=ROOT?>/assets/images/recp_std.png" alt="" class="recp_view_img">
                    <p>Courses</p>
                </a>
            </div><br>
            <div class="recp_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/recp_std.png" alt="" class="recp_view_img">
                    <p>Staffs</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/tt.png" alt="" class="recp_view_img">
                    <p>Time Table</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/announcement">
                    <img src="<?=ROOT?>/assets/images/tt.png" alt="" class="recp_view_img">
                    <p>Announcement</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/enrollment">
                    <img src="<?=ROOT?>/assets/images/recp_std.png" alt="" class="recp_view_img">
                    <p>Student Enrollments</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/registration">
                    <img src="<?=ROOT?>/assets/images/tt.png" alt="" class="recp_view_img">
                    <p>Registration</p>
                </a>
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
    <div  id="overlay"></div>
    <script defer src="<?=ROOT?>/assets/js/calendar_recep.js?v=<?php echo time(); ?>"></script>

    <!-- <script defer src="./enquiry.js"></script> -->
    <?php $this->view("includes/footer");?>