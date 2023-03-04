<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="std_crs_pg_container">
<?php $this->view("includes/sidebar");?>
    <div class="std_crs_main">
        <div class="std_crs_pg_content">
            <div class="std_crs_pg_name">
            <?php if(!empty($courses)):?>
            <?php foreach($courses as $course):?>
                <h2>Grade <?=$course->grade?> - <?=$course->subject?></h2>
                <h3><?=$course->firstname?> <?=$course->lastname?></h3>
                <?php endforeach;?>
            <?php endif;?>
            </div>
            <!-- <div class="std_crs_pg_butn"> -->
            <a href="<?=ROOT?>/student/overall">
                <button class="std_crs_pg_btn">View Progress</button>
            </a>
            <!-- </div> -->
        </div>
        <div class="teacher_crs_content2">
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
                            <?php if($material->type==="application/pdf"):?>
                                <p><a href="#">
                                <img src="<?=ROOT?>/assets/images/pdf.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?> 
                                </a></p>
                                <?php elseif($material->type==="text/plain"):?>
                                    <p><a href="#">
                                    <img src="<?=ROOT?>/assets/images/pp.png" alt="" class="teacher_card_img3">
                                    <?=$material->upload_name?> 
                                    </a></p>
                                <?php else:?>
                                    <p><a href="#"><?=$material->upload_name?> 
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
    