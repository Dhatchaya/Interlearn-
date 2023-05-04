<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_crs_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_crs_content">
        <div class="recp_crs_butn">
            <a href="<?=ROOT?>/receptionist/course/add">
                <button class="recp_crs_btn">Add new course</button>
            </a>
        </div><br><br>
 
        <?php if(!empty($sums)):?>
            <?php foreach($sums as $sum):?>
        <div class="recp_crs_rectangle">
        
            <a href="<?=ROOT?>/receptionist/course/view/1?id=<?=esc($sum->subject_id)?> ">
            <div class="guest-view-image">
                <?php if($sum->grade == 6) :?>
                    <img src="<?=ROOT?>/assets/images/6n.png" alt="" class="guest_crs_img">
                <?php elseif($sum->grade == 7) :?>
                    <img src="<?=ROOT?>/assets/images/7n.png" alt="" class="guest_crs_img">
                <?php elseif($sum->grade == 8) :?>
                    <img src="<?=ROOT?>/assets/images/8n.png" alt="" class="guest_crs_img">
                <?php elseif($sum->grade == 9) :?>
                    <img src="<?=ROOT?>/assets/images/9n.png" alt="" class="guest_crs_img">
                <?php elseif($sum->grade == 10) :?>
                    <img src="<?=ROOT?>/assets/images/10n.png" alt="" class="guest_crs_img">
                <?php elseif($sum->grade == 11) :?>
                    <img src="<?=ROOT?>/assets/images/11n.png" alt="" class="guest_crs_img">
                <?php elseif($sum->grade == 12) :?>
                    <img src="<?=ROOT?>/assets/images/12n.png" alt="" class="guest_crs_img">
                <?php else :?>
                    <img src="<?=ROOT?>/assets/images/13n.png" alt="" class="guest_crs_img">
                <?php endif;?>
            </div>
                <!-- <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="recp_crs_img"> -->
                <!-- <p>Grade 11 Mathematics</p> -->
                <div class="grade-text">
                    Grade <?=esc($sum->grade)?>
                </div>
                <div class="subject-name">
                <?=esc($sum->subject)?>
                </div>
                <!-- <p > </p>
                <p class="subject-name"> <?=esc($sum->subject)?></p><br> -->
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
</div>
<?php $this->view("includes/footer");?>