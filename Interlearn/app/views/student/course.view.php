<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_crs_container">
    <?php $this->view("includes/sidebar");?>
        <!-- <h1 class="greeting">Good Morning Monica!</h1><br> -->
    <div class="std_crs_content">
        <?php if(!empty($sums)):?>
            <?php foreach($sums as $sum):?>

        <div class="recp_crs_rectangle">
        
            <a href="<?=ROOT?>/student/course/view/<?=$sum->course_id?>">
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="recp_crs_img">
                <br><br>
                <p>Grade <?=esc($sum->grade)?> - <?=esc($sum->subject)?></p>
                <p>(<?=esc($sum->language_medium)?>)</p>
                <p><?=esc($sum->fullname)?></p>
            </a>
            
        </div>
        <?php endforeach;?>
        <?php endif;?>
    </div>
        
</div>
    <div  id="overlay"></div>
    <script defer src="/assets/js/dropdown.js"></script>
    <?php $this->view("includes/footer");?>