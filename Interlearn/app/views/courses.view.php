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
        
            <a href="<?=ROOT?>/receptionist/class">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="recp_crs_img">
                <!-- <p>Grade 11 Mathematics</p> -->
                <p>Grade <?=esc($sum->grade)?> - <?=esc($sum->subject)?></p>
            </a>
            
        </div>
        <?php endforeach;?>
        <?php endif;?>
        
    </div>
</div>
<?php $this->view("includes/footer");?>