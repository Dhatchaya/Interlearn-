<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>
<!-- <?php 
var_dump($sums); 
?> -->

<div class="teacher_view_container">
    <?php $this->view("includes/sidebar_teach");?>
    <div class="teacher_view_content">
        <p class="teacher_view_greeting">Welcome <?= ucfirst(Auth::getusername())?>!</p><br><br>
            <?php if(!empty($sums)):?>
            <?php foreach($sums as $sum):?>
        <div class="recp_crs_rectangle">
        
            <a href="<?=ROOT?>/instructor/course/view/<?=$sum->course_id?> ">
                <!-- <img src="<?=ROOT?>/uploads/images/<?= Auth::getdisplay_picture();?>" alt="" class="recp_crs_img"> -->
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
</div> 
    <div  id="overlay"></div>
    <?php $this->view("includes/footer");?>