<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_crs_pg_container">
<?php $this->view("includes/sidebar");?>
    <div class="std_crs_main">
        <div class="std_crs_pg_content">
            <div class="std_crs_pg_name">
            <?php if(!empty($courses)):?>
                <h2>Grade <?=$courses[0]->grade?> - <?=$courses[0]->subject?></h2>
                <h3><?=$courses[0]->first_name?> <?=$courses[0]->last_name?></h3>
            <?php endif;?>
            </div>
            <!-- <div class="std_crs_pg_butn"> -->
            <a href="<?=ROOT?>/student/overall">
                <button class="std_crs_pg_btn">View Progress</button>
            </a>
            <!-- </div> -->
        </div>
        <div class="teacher_crs_content2">
            <a href="<?=ROOT?>/student/course/view/<?=$id?>/announcement" class="teacher-course-announcement">
                Announcements
                <img src="<?=ROOT?>/assets/images/next.png" alt="" class="teacher-course-ann-img">
            </a>
        <?php
                $i = 1;
                foreach ($çourseWeeks as $value) {
            ?>
            <div class="teacher-grid-item" id="Week_<?=$i?>">
                <div class="teacher-card-content">
                    <div class="teacher-card-title">
                        <div class="teacher-card-head">
                            <p class="teacher-card-head-title"><?=$value->week_name?></p>
                        </div>
                    </div>
                    <div class="teacher-card-body">
                        <?php if(!empty($materials)):
                            // var_dump($materials);
                            ?>
                        <?php foreach($materials as $material):?>
                            <?php if($material->week_no==$i):?>
                                <?php if($material->type == "material"):?>
                                    <p><a href="<?=$material->view_URL?>">
                                <img src="<?=ROOT?>/assets/images/pdf.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?> 
                                </a></p>

                            <!-- <?php if($material->file_type==="application/pdf"):?>
                                <p><a href="<?=$material->view_URL?>">
                                <img src="<?=ROOT?>/assets/images/pdf.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?> 
                                </a></p>
                                <?php elseif($material->file_type==="text/plain"):?>
                                    <p><a href="<?=$material->view_URL?>">
                                    <img src="<?=ROOT?>/assets/images/pp.png" alt="" class="teacher_card_img3">
                                    <?=$material->upload_name?> 
                                    </a></p>
                                <?php else:?>
                                    <p><a href="<?=$material->view_URL?>">
                                    <?=$material->upload_name?> 
                                    </a></p> 
                                <?php endif;?> -->

                                <?php elseif($material->type == "assignment"):?>
                                    <p><a href="<?=$material->studentView_URL?>">
                                <img src="<?=ROOT?>/assets/images/assignment.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?> 
                                </a></p>

                                <?php elseif($material->type == "URL"):?>
                                    <p><a href="<?=$material->view_URL?>">
                                <img src="<?=ROOT?>/assets/images/web.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?> 
                                </a></p>

                                <?php elseif($material->type == "forum"):?>
                                    <p><a href="<?=$material->view_URL?>">
                                <img src="<?=ROOT?>/assets/images/forum.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?> 
                                </a></p>
                                <?php endif;?>
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php
            $i++;
            }
            ?>
        </div>
    </div>
</div>
<?php $this->view("includes/footer");?>
    