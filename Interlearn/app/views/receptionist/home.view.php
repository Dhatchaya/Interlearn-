<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_view_container">
    <?php $this->view("includes/sidebar");?>
    <div class="recp_view_content">
        <!-- <h1 class="recp_view_greeting">Good Morning Monica!</h1><br> -->
            <div class="recp_view_rectangle">
                <a href="#">
                    <img src="<?=ROOT?>/assets/images/recp_std.png" alt="" class="recp_view_img">
                    <p>Students</p>
                </a>
            </div>
            <div class="recp_view_rectangle">
                <a href="#">
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
        </div>
    </div>
</div> 
    <div  id="overlay"></div>
    <script defer src="./enquiry.js"></script>
    <?php $this->view("includes/footer");?>