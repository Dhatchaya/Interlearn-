<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_view_container">
    <?php $this->view("includes/sidebar_recep");?>
    <div class="recp_view_content">
        <!-- <h1 class="recp_view_greeting">Good Morning Monica!</h1><br> -->
            <div class="recp_view_rectangle">
                <a href="#">
                    <div class="recp_home_rect">
                    <img src="<?=ROOT?>/assets/images/students.jpg" alt="" class="recp_view_img_new">
                    </div>
                    <div>

                        <p class="recp_text">Students</p>
                    </div>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/course">
                    <img src="<?=ROOT?>/assets/images/courses.png" alt="" class="recp_view_img_new">
                    <p>Courses</p>
                </a>
            </div><br>
            <div class="recp_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/staff.avif" alt="" class="recp_view_img_new">
                    <p>Staffs</p>
                </a>
            </div>
            <!-- <div class="recp_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/tt.png" alt="" class="recp_view_img_new">
                    <p>Time Table</p>
                </a>
            </div> -->
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/announcement">
                    <img src="<?=ROOT?>/assets/images/announcement.jpeg" alt="" class="recp_view_img_new">
                    <p>Announcement</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/enrollment">
                    <img src="<?=ROOT?>/assets/images/std_enrollment.png" alt="" class="recp_view_img_new">
                    <p>Student Enrollments</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="<?=ROOT?>/receptionist/registration">
                    <img src="<?=ROOT?>/assets/images/std_registration.jpg" alt="" class="recp_view_img_new">
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