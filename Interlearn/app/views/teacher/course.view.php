<?php $this->view("includes/header");?>


<div class="teacher_crs_container main-body-div">
<?php $this->view("includes/sidebar_teach");?>
<div class="top-to-bottom-content">
    <?php $this->view("includes/nav");?>
    <div class="teacher_crs_main">


        <div class="teacher_crs_content">
            <img src="<?=ROOT?>/assets/images/tchrview.png" class="teacher_crs_topimg">
            <div class="teacher_crs_tophead">
                <?php if(!empty($courses)):?>
                <div id="course_id" style="display: none;"><?=$courses[0]->course_id?></div>
                <h2 class="teacher_crs_subject">Grade <?=esc($courses[0]->grade)?> - <?=esc($courses[0]->subject)?></h2>
                <h4 class="teacher_crs_subject"><i><?=esc($courses[0]->language_medium)?> Medium</i></h4> 
                <?php endif;?>
            </div>
        </div>
        <div class="teacher_crs_content2" id="aaa">
            <a href="<?=ROOT?>/teacher/course/announcement/<?=$course_id?>/0" class="teacher-course-announcement">
                Announcements
                <img src="<?=ROOT?>/assets/images/next.png" alt="" class="teacher-course-ann-img">
            </a>
            <?php
                $i = 1;
                foreach ($courseWeeks as $value) {
            ?>
            <div class="teacher-grid-item" id="Week_<?=$i?>">
            <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button31" onclick="openModal4(<?=$i?>)">
                <div class="teacher-card-content">
                    <div class="teacher-card-title">
                        <div class="teacher-card-head">
                            <p class="teacher-card-head-title"><?=$value->week_name?></p>
                            <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button30" onclick="openModal3(<?=$i?>)">
                        </div>
                    </div>
                    <div class="teacher-card-body">
                        <?php if(!empty($materials)):  ?>
                        <?php foreach($materials as $material):?>
                            <?php if($material->week_no==$i):?>
                                <?php if($material->type == "material"):?>
                                <?php if($material->file_type==="application/pdf"):?>
                                    <p><a href="#">
                                    <img src="<?=ROOT?>/assets/images/pdf.png" alt="" class="teacher_card_img3">
                                    <?=$material->upload_name?>
                                    <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button32" onclick="openModal5('<?=$material->cid?>')">
                                    <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button33" onclick="openModal6('<?=$material->cid?>')">
                                    </a></p>
                                <?php elseif($material->file_type==="text/plain"):?>
                                    <p><a href="#">
                                    <img src="<?=ROOT?>/assets/images/pp.png" alt="" class="teacher_card_img3">
                                    <?=$material->upload_name?>
                                    <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button32" onclick="openModal5('<?=$material->cid?>')">
                                    <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button33" onclick="openModal6('<?=$material->cid?>')">
                                    </a></p>
                                <?php elseif($material->file_type==="application/x-zip-compressed"):?>
                                    <p><a href="#">
                                    <img src="<?=ROOT?>/assets/images/zip.png" alt="" class="teacher_card_img3">
                                    <?=$material->upload_name?>
                                    <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button32" onclick="openModal5('<?=$material->cid?>')">
                                    <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button33" onclick="openModal6('<?=$material->cid?>')">
                                    </a></p>
                                <?php else:?>
                                    <!-- <p><a href="<?=$material->view_URL?>"><?=$material->upload_name?> </a>
                                    <a href="<?=$material->edit_URL?>">
                                    <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button32">
                                    </a>
                                    <a href="#">
                                    <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button33" >
                                    </a></p> -->
                                    <p><a href="#">
                                    <img src="<?=ROOT?>/assets/images/paper.png" alt="" class="teacher_card_img3">
                                    <?=$material->upload_name?>
                                    <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button32" onclick="openModal5('<?=$material->cid?>')">
                                    <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button33" onclick="openModal6('<?=$material->cid?>')">
                                    </a></p>
                                <?php endif;?>

                            <?php elseif($material->type == "assignment"):?>
                                <p><a href=<?=$material->view_URL?>>
                                <img src="<?=ROOT?>/assets/images/assignment.png" alt="" class="teacher_card_img3">

                                <?=$material->upload_name?>
                                </a>
                                <a href=<?=$material->edit_URL?>>
                                <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button32" >
                                </a>
                                <!-- <a href=<?=$material->delete_URL?>> -->
                                <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button33" onclick="openModal6('<?=$material->cid?>')">
                                <!-- </a></p> -->
                                </p>
                            <?php elseif($material->type == "forum"):?>
                                <p><a href=<?=$material->view_URL?>>
                                <img src="<?=ROOT?>/assets/images/assignment.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?>
                                </a>
                                <!-- <a href=<?=$material->delete_URL?>> -->
                                <!-- <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button32" onclick="openModal5('<?=$material->cid?>')"> -->
                                <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button33" onclick="openModal6('<?=$material->cid?>')">
                                <!-- </a></p> -->
                                </p>
                            <?php elseif($material->type == "URL"):?>
                                <p><a href=<?=$material->view_URL?>>
                                <img src="<?=ROOT?>/assets/images/web.png" alt="" class="teacher_card_img3">
                                <?=$material->upload_name?>
                                </a>
                                <img src="<?=ROOT?>/assets/images/edit.png" alt="" class="teacher_card_img2" id="button32" onclick="openModal5('<?=$material->cid?>')">
                                <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_card_img2" id="button33" onclick="openModal6('<?=$material->cid?>')">
                                </p>
                            <?php endif;?>
                            
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php endif;?>
                        <p class="add-activity" id="button28" onclick="openModal(<?=$i?>)"><a href="#">+ Add an activity or resource</a></p>
                    </div>
                </div>
            </div>
            <?php $i++;  }?>
            <p class="add-week" id="button29" onclick="openModal2()"> <a href="#">+ Add a week</a></p>


            <!-- add activity popup -->
            <div id="profileModal" class="popupModal">
                <div class="tchr-popupmodal-content">
                    <span class="ann_close" onclick="closeModal()">&times;</span><br>
                    <h4>--Add an activity--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <input type="hidden" name="week_no" id="week_no">
                        <div class="teacher-crs-activities">
                        <?php if(!empty($courses)): ?>
                            <?php foreach($courses as $course):?>
                            <div class="teacher-crs-activity">
                                <a href="<?=ROOT?>/teacher/course/forum/<?=$course->course_id?>" name="upload"><img src="<?=ROOT?>/assets/images/forum.png" alt="" class="teacher-crs-img"><br>Add Forum</a>
                            </div>
                            <div class="teacher-crs-activity">
                                <a href="<?=ROOT?>/teacher/course/quiz/<?=$course->course_id?>" name="quiz"><img src="<?=ROOT?>/assets/images/quiz.png" alt="" class="teacher-crs-img"><br>Add a quiz</a>
                            </div>
                            <div class="teacher-crs-activity">
                                <a href="<?=ROOT?>/teacher/course/quiz/<?=$course->course_id?>"  ><img src="<?=ROOT?>/assets/images/quizb.png" alt="" class="teacher-crs-img"><br>Add a quiz bank</a>
                            </div>
                            <div class="teacher-crs-activity">
                                <a href="<?=ROOT?>/teacher/course/assignment/<?=$course->course_id?>" name="assignment"><img src="<?=ROOT?>/assets/images/submission.png" alt="" class="teacher-crs-img"><br>Add a submission</a>
                            </div>

                            <div class="teacher-crs-activity">
                                <a href="<?=ROOT?>/teacher/course/upload/<?=$course->course_id?>" name="upload">
                                   <img src="<?=ROOT?>/assets/images/paper.png" alt="" class="teacher-crs-img"><br>Add lecture materials
                                </a>
                            </div>
                            <!-- <div class="teacher-crs-activity">
                                <a href="#"><img src="<?=ROOT?>/assets/images/recording.png" alt="" class="teacher-crs-img"><br>Add recordings</a>
                             </div> -->
                             <div class="teacher-crs-activity">
                                <a href="<?=ROOT?>/teacher/course/url/<?=$course->course_id?>" name="url">
                                <img src="<?=ROOT?>/assets/images/web.png" alt="" class="teacher-crs-img"><br>Add URL
                                </a>
                             </div>
                            <?php endforeach;?>
                            <?php endif;?>
                             
                        </div>
                    </form>
                </div>
            </div>
        </div>


            <!-- adding weeks popup -->
            <div id="profileModal2" class="popupModal">
                <div class="tchr-popupmodal-content2">
                    <span class="ann_close" onclick="closeModal2()">&times;</span><br>
                    <h4>--Add weeks--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="card-count" class="teacher-inc-head">No.of sections you want to add:</label><br><br><hr>
                            <div class="teacher-increment">
                                <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" name="no_of_weeks" id="card-number" value="0" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                            </div><hr><br><br>
                            <div>
                            <button type="submit" class="teacher_upl_btn" name="submit-weeks" id="add-btn">Add</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <!-- adding title to the week -->
            <div id="profileModal3" class="popupModal">
                <div class="tchr-popupmodal-content2">
                    <span class="ann_close" onclick="closeModal3()">&times;</span><br>
                    <h4>--Add Title--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="title" class="teacher-edit">Title: </label>
                            <input type="hidden" value="" name="weeknumber" id="weeknumber">
                            <input type="text" class="teacher-edit-title" name="title" value=""><br><br>
                            <button type="submit" class="teacher_upl_btn" name="submit-title" id="add-btn">Save</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>



            <!-- deleting the week popup -->
            <div id="profileModal4" class="popupModal">
                <div class="tchr-popupmodal-content2">
                    <span class="ann_close" onclick="closeModal4()">&times;</span><br>
                    <h4>--Delete Week--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="delete-sec" class="teacher-edit">Are you sure you want to delete this section? </label>
                            <!-- <input type="text" class="teacher-edit-title" name="title"> -->
                            <input type="hidden" value="" name="delete-weeknumber" id="delete-weeknumber">
                            <br><br>
                            <button type="submit" class="teacher_upl_btn" name="submit-delete-week" id="add-btn">Yes</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                            </div>
                    </form>
                </div>
            </div>



            <!-- editing the upload name -->
            <div id="profileModal5" class="popupModal">
                <div class="tchr-popupmodal-content2">
                    <span class="ann_close" onclick="closeModal5()">&times;</span><br>
                    <h4>--Edit Upload Name--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="upload-title" class="teacher-edit">New upload name: </label>
                            <input type="hidden" value="" name="cid" id="cid">
                            <input type="text" class="teacher-edit-title" name="upload-title"><br><br>
                            <button type="submit" class="teacher_upl_btn" name="submit-upload" id="add-btn">Save</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>



            <!-- deleting the upload popup -->
            <div id="profileModal6" class="popupModal">
                <div class="tchr-popupmodal-content2">
                    <span class="ann_close" onclick="closeModal6()">&times;</span><br>
                    <h4>--Delete Upload--</h4><br>
                    <form action="" method="post" class="up-profile">
                        <div class="teacher-crs-activities2">
                            <label for="delete-upload" class="teacher-edit">Are you sure you want to delete this upload? </label>
                            <input type="hidden" value="" name="delete-filenumber" id="delete-filenumber">
                            <br><br>
                            <button type="submit" class="teacher_upl_btn" name="submit-delete-up" id="add-btn">Yes</button>
                            <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/course.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>