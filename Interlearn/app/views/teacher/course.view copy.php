<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="teacher_crs_container">
<?php $this->view("includes/sidebar_teach");?>
<div class="teacher_crs_main">
    <div class="teacher_crs_content">
        <img src="<?=ROOT?>/assets/images/tchrview.png" class="teacher_crs_topimg">
        <div class="teacher_crs_tophead">
        <?php if(!empty($courses)):?>
        
            <div id="course_id" style="display: none;"><?=$courses[0]->course_id?></div>
            <h2 class="teacher_crs_subject">Grade <?=esc($courses[0]->grade)?> - <?=esc($courses[0]->subject)?></h2>
            
            <?php endif;?>
        </div>
    </div>
        <div class="teacher_crs_content2" id="aaa">

            
            
            <?php
                for($i=0;$i<$courses[0]->No_Of_Weeks;$i++):
            ?>
            <div class="teacher-grid-item" id="Week_<?=$i+1?>">
                <div class="teacher-card-content">
                    <div class="teacher-card-title">
                        <div class="teacher-card-head">
                            <p class="teacher-card-head-title">Title</p>
                            <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button30" onclick="openModal3()">
                        </div>
                    </div>
                    <div class="teacher-card-body">
                        <?php if(!empty($materials)):?>
                        <?php foreach($materials as $material):?>
                            <?php if($material->type=='application/pdf'):?>
                                <p><a href="#">
                                <img src="<?=ROOT?>/assets/images/pdf.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?>
                                </a></p>
                                <?php elseif($material->type=='text/plain'):?>
                                    <p><a href="#">
                                    <img src="<?=ROOT?>/assets/images/pp.png" alt="" class="teacher_card_img3">
                                    <?=$material->upload_name?>
                                    </a></p>
                                <?else:?>
                                    <p><a href="#"><?=$material->upload_name?></a></p>
                                    <?php endif;?>
                        <?php endforeach;?>
                        <?php endif;?>
                        <p class="add-activity" id="button28" onclick="openModal()"><a href="#">+ Add an activity or resource</a></p>
                    </div>
                </div>
            </div>
            <?php
            endfor;
            ?>



            <p class="add-week" id="button29" onclick="openModal2()">
            <a href="#">+ Add a week</a></p>

            <div id="profileModal" class="popupModal">
                <div class="tchr-popupmodal-content">
                    <span class="ann_close" onclick="closeModal()">&times;</span><br>
                    <h4>--Add an activity--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities">
                            <div class="teacher-crs-activity">
                                <a href="#"><img src="<?=ROOT?>/assets/images/forum.png" alt="" class="teacher-crs-img"><br>Add Forum</a>
                            </div>
                            <div class="teacher-crs-activity">
                                <a href="#"><img src="<?=ROOT?>/assets/images/quiz.png" alt="" class="teacher-crs-img"><br>Add a quiz</a>
                            </div>
                            <div class="teacher-crs-activity">
                                <a href="#"><img src="<?=ROOT?>/assets/images/submission.png" alt="" class="teacher-crs-img"><br>Add a submission</a>
                            </div>
                            <?php if(!empty($courses)): ?>
                            <?php foreach($courses as $course):?>
                             <div class="teacher-crs-activity">
                                <a href="<?=ROOT?>/teacher/course/upload/<?=$course->course_id?>">
                                   <img src="<?=ROOT?>/assets/images/paper.png" alt="" class="teacher-crs-img"><br>Add lecture materials
                                </a>
                            </div>
                            <?php endforeach;?>
                            <?php endif;?>
                             <div class="teacher-crs-activity">
                                <a href="#"><img src="<?=ROOT?>/assets/images/recording.png" alt="" class="teacher-crs-img"><br>Add recordings</a>
                             </div>
                             <div class="teacher-crs-activity">
                                <a href="#"><img src="<?=ROOT?>/assets/images/progress.png" alt="" class="teacher-crs-img"><br>View Progress</a>
                             </div>
                             <div class="teacher-crs-activity">
                                <a href="#"><img src="<?=ROOT?>/assets/images/web.png" alt="" class="teacher-crs-img"><br>Add URL</a>
                             </div>
                        </div>
                    </form>
                </div>
            </div>


            <div id="profileModal2" class="popupModal">
                <div class="tchr-popupmodal-content2">
                    <span class="ann_close" onclick="closeModal2()">&times;</span><br>
                    <h4>--Add weeks--</h4><br>
                    <div action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="card-count" class="teacher-inc-head">No.of sections you want to add:</label><br><br><hr>
                            <div class="teacher-increment">
                                <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" id="card-number" value="0" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                            </div><hr><br><br>
                            <div>
                            <button type="submit" class="teacher_upl_btn" name="submit" id="add-btn">Add</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="profileModal3" class="popupModal">
                <div class="tchr-popupmodal-content2">
                    <span class="ann_close" onclick="closeModal3()">&times;</span><br>
                    <h4>--Add Title--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="title" class="teacher-edit">Title: </label>
                            <input type="text" class="teacher-edit-title" name="title"><br><br>
                            <button type="submit" class="teacher_upl_btn" name="submit" id="add-btn">Save</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <!-- <a href="#"><img src="<?=ROOT?>/assets/images/forum.png" class="teacher_crs_img">Forum</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/fdb.png" class="teacher_crs_img">Feedback Form</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br><br><hr><br>

            <h4>Day 1</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img"></img>Recording</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 1</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2020</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 1</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br><hr><br>

            <h4>Day 2</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 2</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2019</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 2</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br><hr><br>

            <h4>Day 3</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 2-Part B</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2021</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 3</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br><br><hr><br>

            <h4>Day 4</h4><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/rec.png" class="teacher_crs_img">Recording</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pdf.png" class="teacher_crs_img">Lesson 3-Part A</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/pp.png" class="teacher_crs_img">Past Paper 2018</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br>
            <a href="#"><img src="<?=ROOT?>/assets/images/hw.png" class="teacher_crs_img">Home work 4</a>
            <a href="#"><img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2"><img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2"></a><br> -->
        </div>
    </div>    
</div>
<script defer src="<?=ROOT?>/assets/js/course.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>