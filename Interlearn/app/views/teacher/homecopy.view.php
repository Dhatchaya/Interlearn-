<?php $this->view("includes/header");?>

<!-- <?php
// var_dump($sums);
// ?> -->

<div class="teacher_view_container">
    <?php $this->view("includes/sidebar_teach");?>
    <div class="top-to-bottom-content">
        <div class="all-header">
        <?php $this->view("includes/nav");?>
</div>
        <div class="all-middle-content">
            <!-- <div class="teacher_view_content"> -->
            
                <div class="teach_view_greeting">
                    <div class="teach_view_greet">Welcome Back,<br> <?= ucfirst(Auth::getusername())?>!</div>
                    <img src="<?=ROOT?>/assets/images/education.png" alt="">
                </div>
                    <!-- <div class="teacher_view_Rectangle">
                        <a href="<?=ROOT?>/teacher/course">
                            <img src="<?=ROOT?>/assets/images/2023.jpg" alt="" class="teacher_view_Img">
                            <p>2023 A/L</p>
                            <p>Combined Maths</p>
                            <p>Hall No 04</p>
                        </a>
                    </div> -->
                <div>
                    <?php if(!empty($sums)):?>
                    <?php foreach($sums as $sum):?>
                        <div class="recp_crs_rectangle">

                            <a href="<?=ROOT?>/teacher/course/view/<?=$sum->course_id?> ">
                                <!-- <img src="<?=ROOT?>/uploads/images/<?= Auth::getdisplay_picture();?>" alt="" class="recp_crs_img"> -->
                                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="recp_crs_img">
                                <br><br>
                                <p>Grade <?=esc($sum->grade)?> - <?=esc($sum->subject)?></p>
                                <p>(<?=esc($sum->language_medium)?>)</p>
                                <!-- <div class="recp_crs_butn2">
                                    <a href="<?=ROOT?>/receptionist/course/view/1/?id=<?=esc($sum->subject_id)?>">
                                        <button class="recp_crs_btn2">More info</button>
                                    </a>
                                </div> -->

                            </a>

                        </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </div>
                <div class="student_calendar">
                    <?php $this->view("includes/calendar");?>
                </div>

        </div>
    <script defer src="<?=ROOT?>/assets/js/calendar_teacher.js?v=<?php echo time(); ?>"></script>


    </div>
                    </div>

    <?php $this->view("includes/footer");?>