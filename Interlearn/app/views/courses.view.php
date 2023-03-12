<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_crs_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_crs_content">
        <!-- <div class="recp_crs_butn">
            <a href="<?=ROOT?>/receptionist/addCourse">
                <button class="recp_crs_btn">Add new course</button>
            </a>
        </div><br><br> -->
 
        <?php if(!empty($sums)):?>
            <?php foreach($sums as $sum):?>
        <div class="recp_crs_rectangle">
        
            <a href="<?=ROOT?>/courses/index/view/1/?id=<?=esc($sum->subject_id)?>">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="recp_crs_img">
                <!-- <p>Grade 11 Mathematics</p> -->
                <p>Grade <?=esc($sum->grade)?> - <?=esc($sum->subject)?></p>
                <div class="recp_crs_butn2">
                    <!-- <a href="<?=ROOT?>/courses/view/1/?id=<?=esc($sum->subject_id)?>"> -->
                        <button class="recp_crs_btn2">More info</button>
                    <!-- </a> -->
                </div>
            </a>
            
        </div>
        <?php endforeach;?>
        <?php endif;?>
        
    </div>
</div>
<?php $this->view("includes/footer");?>