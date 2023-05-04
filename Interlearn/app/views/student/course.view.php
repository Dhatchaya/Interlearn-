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
                <img src="<?=ROOT?>/assets/images/bookn.jpg" alt="" class="std_crs_img_new">
                <br><br>
                <p><b>Grade <?=esc($sum->grade)?> - <?=esc($sum->subject)?></b> <br><br>
                <?=esc($sum->language_medium)?> Medium <br><br>
                <b><?=esc($sum->fullname)?></b></p>
                <!-- <div class="recp_crs_butn2">
                    <a href="<?=ROOT?>/course/view/1/?id=<?=esc($sum->subject_id)?>">
                        <button class="recp_crs_btn2">More info</button>
                    </a>
                </div> -->
            </a>

        </div>
        <?php endforeach;?>
        <?php endif;?>
    </div>
        
</div>
    <div  id="overlay"></div>
    <script defer src="/assets/js/dropdown.js"></script>
    <?php $this->view("includes/footer");?>