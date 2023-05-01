<?php $this->view("includes/header");?>


<div class="main-body-div">
    <?php $this->view("includes/sidebar_teach");?>
    <div class="top-to-bottom-content">
       
        <?php $this->view("includes/nav");?>
   
        <div class="all-middle-content">

            <div class="center-content">
                <div class="teach_view_greeting">
                    <div class="teach_view_greet">Welcome Back,<br> <?= ucfirst(Auth::getusername())?>!</div>
                    <img src="<?=ROOT?>/assets/images/education.png" alt="">
                </div>
     
                <div class="maindash">
                    <?php if(!empty($sums)):?>
                    <?php foreach($sums as $sum):?>
                        <div class="recp_crs_rectangle">

                            <a href="<?=ROOT?>/teacher/course/view/<?=$sum->course_id?> ">
                                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="recp_crs_img">
                                <br><br>
                                <p>Grade <?=esc($sum->grade)?> - <?=esc($sum->subject)?></p>
                                <p>(<?=esc($sum->language_medium)?>)</p>
                            </a>

                        </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
            <div class="student_calendar">
        <?php $this->view("includes/calendar");?>
        <div id = "assignment_today" class ="assignment_today">
                 
                </div>
                </div>

        </div>



    </div>
    <script defer src="<?=ROOT?>/assets/js/calendar_teacher.js?v=<?php echo time(); ?>"></script>
</div>        
<?php $this->view("includes/footer");?>     
