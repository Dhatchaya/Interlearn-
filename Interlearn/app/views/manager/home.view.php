<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_view_container">
    <?php $this->view("includes/sidebar_man");?>
    <div class="mng_view_content">
        <!-- <h1 class="recp_view_greeting">Good Morning Monica!</h1><br> -->
            <div class="mng_view_rectangle">
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
            </div>
            
        </div>
    </div>
</div> 
    <div  id="overlay"></div>
    <script defer src="./enquiry.js"></script>
    <?php $this->view("includes/footer");?>