<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="guest_crs_container">
    <div class="guest_crs_content">
        <!-- <div class="recp_crs_butn">
            <a href="<?=ROOT?>/receptionist/addCourse">
                <button class="recp_crs_btn">Add new course</button>
            </a>
        </div><br><br> -->
        <div class="class-search-box">
            <input type="text" name="class-search" id="class-search" onkeyup="search_classes()" placeholder="Search for subject name..">
        </div>
 
        <?php if(!empty($sums)):?>
            <?php foreach($sums as $sum):?>
                <div class="empty-class-message" id="empty-class-message"></div>
        <div class="guest_crs_rectangle">
        
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

                <!-- <p>Grade 11 Mathematics</p> -->
                <div class="guest-subject-name">
                <!-- Grade <?=esc($sum->grade)?> -->
                <?=esc($sum->subject)?>
                </div>
                <div class="guest-grade-text">
                We have the best qualified teachers for <?=esc($sum->subject)?> for grade <?=esc($sum->grade)?> in <?=esc($sum->count)?> mediums!
                </div>
                <div class="link-guest">
                <a href="<?=ROOT?>/courses/index/view/1/?id=<?=esc($sum->subject_id)?>" class="link-guest">
                <button class="guest-view-btn">More</button>

                </a>
                </div>



            <!-- </a> -->
            
        </div>
        <?php endforeach;?>
        <?php endif;?>
        
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/courseSearch.js?v=<?php echo time(); ?>"></script>

<?php $this->view("includes/footer");?>