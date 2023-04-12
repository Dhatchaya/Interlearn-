<?php $this->view("includes/header");?>
<?php $this->view("includes/nav"); 
$url = $_GET['url'];
$url = rtrim($url,'/');
$val = explode('/',$url);
?>


<div class="recp_cl_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_cl_content">
        <button name="add-teacher" type="submit" class="recp_det_btn" id="button28" onclick="openModal()">+Add Teacher</button>
        <?php if(!empty($subjects)):?>
       
            <h2>Grade <?=esc($subjects[0][0]->grade)?> - <?=esc($subjects[0][0]->subject)?></h2>
            <br><br>
            <h3>About this course</h3>
            <p><?=esc($subjects[0][0]->description)?></p>
        
        <?php endif;?>
        <br>

        <h4><i>Choose the language medium</i> </h4><br>
        <!-- medium navbar  -->
        
        <nav class="recp_cl_navbar">
            <div class="recp_cl_medium">
            <!-- <a href="<?=ROOT?>/receptionist/course/view/1/?id=<?=$medium->subject_id?>" > -->
                <?php if(!empty($mediums)):?>
                    <?php foreach($mediums as $medium):?>

                        <?php if($medium->language_medium == 'Sinhala'):?>
                            <div id="medium_sinhala" class="recp_cl_nav active" onclick=setTab(this.id,this);><?=$medium->language_medium?></div>
                        <?php elseif($medium->language_medium == 'English'):?>
                            <div id="medium_english" class="recp_cl_nav" onclick=setTab(this.id,this);><?=$medium->language_medium?></div>
                        <?php else:?>
                            <div id="medium_tamil" class="recp_cl_nav" onclick=setTab(this.id,this);><?=$medium->language_medium?></div>
                        <?php endif;?>

                   <?php endforeach;?>
                <?php endif;?>
            </div>
        </nav>



        <div id="medium_tab_content" class= "medium_tab_content">
            <!-- content table -->


            <div id="medium_sinhala_content" class="recp_cl_staff">

                <table class="teacher-class-table">
                    <th>Day</th>
                    <th>Time</th>
                    <th>Teacher  </th>
                    <th>Instructor  </th>
                    <th>Action</th>
                    <?php if(!empty($subjects)):
                        $med_ID=0;
                        $subject_id=0;
                        if(isset($_GET['id'])){
                            $subject_id = $_GET['id'];
                        }
                        // show($subject_id);die;
                        for($x=0; $x<=count($subjects); $x++){
                            // show($subjects[$x][0]);
                            if($subject_id==$subjects[$x][0]->subject_id){
                                $med_ID=$x;
                                break;
                            }
                        }
                        // show($subjects[$med_ID]);die;
                        ?>
                    <?php foreach($subjects[$med_ID] as $teacher):?>

                    <tr>
                        <td><?=esc($teacher->day)?></td>
                        <td><?=esc($teacher->timefrom)?> - <?=esc($teacher->timeto)?></td>
                        <td><?=esc($teacher->teacherName)?>
                            <?php if(empty($teacher->teacherName)):?>
                                <?php echo "No teachers assigned!";?>
                            <?php endif?>
                        </td>
                        <td>
                            <?php if(!empty($teach_instructors[$teacher->course_id])):?>
                                <?php foreach($teach_instructors[$teacher->course_id] as $teach_instructor):?>
                                    <?=esc($teach_instructor->instructorName)?>
                                    <input type="hidden" value="<?=esc($teacher->day)?>">

                                    <br/>
                                <?php endforeach;?> 
                                <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button29" class="teacher_crs_img2" onclick="openModal2(<?=esc($teacher->course_id)?>)">
                            <?php else:?>
                                    <?php echo "No instructors assigned!";?>
                                    <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button29" class="teacher_crs_img2" onclick="openModal2(<?=esc($teacher->course_id)?>)">
                            <?php endif?>
                        </td> 
                        <td>
                        <?php if(!empty($mediums)):?>
                                <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2" id="button30" onclick="openModal3(<?=esc($teacher->course_id)?>)">

                                <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2" id="button35" onclick="openModal4(<?=esc($teacher->course_id)?>)">
                        
                        <?php endif;?>
                        </td>
                    </tr>

                <!-- edit teachers class popup -->
                <div id="profileModal3_<?php echo $teacher->course_id?>" class="popupModal">
                    <div class="popupmodal-content">
                        <span class="ann_close" onclick="closeModal3(<?=esc($teacher->course_id)?>)">&times;</span><br>
                        <form action="" method="post" class="up-profile">

                        <div class="recp_det_box">
                            <h4>Teacher ID: </h4>
                            <!-- <?php show($teacher);?> -->
                            <input type="hidden" name="teacher_id" id="teacher_id" value="<?=$teacher->teacher_ID?>">
                            <input type="text" name="teacher_id" id="teacher_id" value="<?=esc($teacher->teacher_ID)?>:<?=esc($teacher->teacherName)?>" class="recp_ann_clz" disabled>
                        </div>

                        <div class="recp_det_box">
                            <h4>Instructor ID: </h4>

                            <?php if(!empty($teach_instructors[$teacher->course_id])):?>

                                <?php foreach($teach_instructors[$teacher->course_id] as $teach_instructor):?>
                                    <input type="text" value="<?=esc($teach_instructor->instructorName)?>" disabled>
                                    <!-- <input type="hidden" name="teacher_id" id="teacher_id" value="<?=$teacher->teacher_ID?>"> -->
                                    <input type="hidden" value="<?=$teach_instructor->emp_id?>" id="instructorID" name="instructorID">
                                    <input type="hidden" value="<?=$teach_instructor->course_id?>" id="courseID" name="courseID">
                                    <button type="submit" name="submit-remove-instructor"><span class="instructor-remove" >&times;</span></button> <br>
                                <?php endforeach;?>

                            <?php else:?>
                                <p style="font-size: small;"><?=esc("No instrcutors to show!")?></p>
                            <?php endif;?>
                        </div>

                        <div class="recp_det_box">
                            <h4>Day: </h4>
                            <select name="day" id="day" class="recp_ann_clz">
                            <option value="slct" selected>--select day--</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div><br>

                        <div class="recp_det_box">
                            <h4>Time:</h4>
                            <div class="recp_det_dura">
                                <input type="time" name="timefrom" value="08:00" id="timefrom" class="recp_det_time">
                                <p> to </p>
                                <input type="time" name="timeto" value="08:00" id="timeto" class="recp_det_time">
                            </div>
                        </div>
                        <br><br>

                        <button name="edit-teacher" type="submit" class="recp_det_btn">Save</button>
                        </form>
                     </div>
                </div>
                        
                <?php endforeach;?>
                <?php endif;?>
                </table>
            </div>
            <br><br>
            <!-- end of sinhala table -->


        <!-- english table  -->

            <div id="medium_english_content" class="recp_cl_staff hide">
                <table class="teacher-class-table">
                    <th>Day</th>
                    <th>Time</th>
                    <th>Teacher  </th>
                    <th>Instructor  </th>
                    <th>Action</th>
                    <?php if(!empty($subjects)):
                        $med_ID=0;
                        $subject_id=0;
                        if(isset($_GET['id'])){
                            $subject_id = $_GET['id'];
                        }
                        // show($subject_id);die;
                        for($x=0; $x<=count($subjects); $x++){
                            // show($subjects[$x][0]);
                            if($subject_id==$subjects[$x][0]->subject_id){
                                $med_ID=$x;
                                break;
                            }
                        }
                        // show($subjects[$med_ID]);die;
                        ?>
                    <?php foreach($subjects[$med_ID] as $teacher):?>
                    <tr>
                        <td><?=esc($teacher->day)?></td>
                        <td><?=esc($teacher->timefrom)?> - <?=esc($teacher->timeto)?></td>
                        <td><?=esc($teacher->teacherName)?>
                            <?php if(empty($teacher->teacherName)):?>
                                <?php echo "No teachers assigned!";?>
                            <?php endif?>
                        </td>
                        <td>
                            
                        <?php if(!empty($teach_instructors[$teacher->course_id])):?>
                            <?php foreach($teach_instructors[$teacher->course_id] as $teach_instructor):?>
                                <?=esc($teach_instructor->instructorName)?>
                                <input type="hidden" value="<?=esc($teacher->day)?>">

                                <br/>
                            <?php endforeach;?> 
                            <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button29" class="teacher_crs_img2" onclick="openModal2(<?=esc($teacher->course_id)?>)">
                        <?php else:?>
                                <?php echo "No instructors assigned!";?>
                                <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button29" class="teacher_crs_img2" onclick="openModal2(<?=esc($teacher->course_id)?>)">
                        <?php endif?>
                        </td> 
                        <td>
                        <?php if(!empty($mediums)):?>
                                <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2" id="button30" onclick="openModal3(<?=esc($teacher->course_id)?>)">

                                <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2" id="button35" onclick="openModal4(<?=esc($teacher->course_id)?>)">
                        
                        <?php endif;?>
                        </td>
                    </tr>

                     <!-- edit teachers class -->
                <div id="profileModal3_<?php echo $teacher->course_id?>" class="popupModal">
                <div class="popupmodal-content">
                    <span class="ann_close" onclick="closeModal3(<?=esc($teacher->course_id)?>)">&times;</span><br>
                    <form action="" method="post" class="up-profile">

                    <div class="recp_det_box">
                        <h4>Teacher ID: </h4>
                        <!-- <?php show($teacher);?> -->
                        <input type="hidden" name="teacher_id" id="teacher_id" value="<?=$teacher->teacher_ID?>">
                        <input type="text" name="teacher_id" id="teacher_id" value="<?=esc($teacher->teacher_ID)?>:<?=esc($teacher->teacherName)?>" class="recp_ann_clz" disabled>
                    </div>

                    <div class="recp_det_box">
                        <h4>Instructor ID: </h4>

                        <?php if(!empty($teach_instructors[$teacher->course_id])):?>

                            <?php foreach($teach_instructors[$teacher->course_id] as $teach_instructor):?>
                                <input type="text" value="<?=esc($teach_instructor->instructorName)?>" disabled>
                                <!-- <input type="hidden" name="teacher_id" id="teacher_id" value="<?=$teacher->teacher_ID?>"> -->
                                <input type="hidden" value="<?=$teach_instructor->emp_id?>" id="instructorID" name="instructorID">
                                <input type="hidden" value="<?=$teach_instructor->course_id?>" id="courseID" name="courseID">
                                <button type="submit" name="submit-remove-instructor"><span class="instructor-remove" >&times;</span></button> <br>
                            <?php endforeach;?>

                        <?php else:?>
                            <p style="font-size: small;"><?=esc("No instrcutors to show!")?></p>
                        <?php endif;?>
                    </div>

                    <div class="recp_det_box">
                        <h4>Day: </h4>
                        <select name="day" id="day" class="recp_ann_clz">
                        <option value="slct" selected>--select day--</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div><br>

                    <div class="recp_det_box">
                        <h4>Time:</h4>
                        <div class="recp_det_dura">
                            <input type="time" name="timefrom" value="08:00" id="timefrom" class="recp_det_time">
                            <p> to </p>
                            <input type="time" name="timeto" value="08:00" id="timeto" class="recp_det_time">
                        </div>
                    </div>
                    <br><br>

                    <button name="edit-teacher" type="submit" class="recp_det_btn">Save</button>
                    </form>
                 </div>
                </div>
                        
                <?php endforeach;?>
                <?php endif;?>
                </table>
            </div>
            <br><br>

            <!-- end of english table  -->


        <!-- tamil table  -->

        <div id="medium_tamil_content" class="recp_cl_staff hide">
            <table class="teacher-class-table">
                <th>Day</th>
                <th>Time</th>
                <th>Teacher  </th>
                <th>Instructor  </th>
                <th>Action</th>
                <?php if(!empty($subjects)):
                    $med_ID=0;
                    $subject_id=0;
                    if(isset($_GET['id'])){
                        $subject_id = $_GET['id'];
                    }
                    // show($subject_id);die;
                    for($x=0; $x<=count($subjects); $x++){
                        // show($subjects[$x][0]);
                        if($subject_id==$subjects[$x][0]->subject_id){
                            $med_ID=$x;
                            break;
                        }
                    }
                    // show($subjects[$med_ID]);die;
                    ?>
                <?php foreach($subjects[$med_ID] as $teacher): ?>
                <tr>
                    <td><?=esc($teacher->day)?></td>
                    <td><?=esc($teacher->timefrom)?> - <?=esc($teacher->timeto)?></td>
                    <td><?=esc($teacher->teacherName)?>

                        <?php if(empty($teacher->teacherName)):?>
                            <?php echo "No teachers assigned!";?>
                        <?php endif?>
                    </td>
                    <td>
                   
                    <?php if(!empty($teach_instructors[$teacher->course_id])):?>
                        <?php foreach($teach_instructors[$teacher->course_id] as $teach_instructor):?>
                            <?=esc($teach_instructor->instructorName)?>
                            <input type="hidden" value="<?=esc($teacher->day)?>">
                            
                            <br/>
                        <?php endforeach;?> 
                        <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button29" class="teacher_crs_img2" onclick="openModal2(<?=esc($teacher->course_id)?>)">
                    <?php else:?>
                            <?php echo "No instructors assigned!";?>
                            <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button29" class="teacher_crs_img2" onclick="openModal2(<?=esc($teacher->course_id)?>)">
                    <?php endif?>
                    </td> 
                    <td>
                    <?php if(!empty($mediums)):?>
                            <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2" id="button30" onclick="openModal3(<?=esc($teacher->course_id)?>)">

                            <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2" id="button35" onclick="openModal4(<?=esc($teacher->course_id)?>)">
                     
                    <?php endif;?>
                    </td>
                </tr>

                 <!-- edit teachers class -->
                <div id="profileModal3_<?php echo $teacher->course_id?>" class="popupModal">
                    <div class="popupmodal-content">
                        <span class="ann_close" onclick="closeModal3(<?=esc($teacher->course_id)?>)">&times;</span><br>
                        <form action="" method="post" class="up-profile">

                        <div class="recp_det_box">
                            <h4>Teacher ID: </h4>
                            <!-- <?php show($teacher);?> -->
                            <input type="hidden" name="teacher_id" id="teacher_id" value="<?=$teacher->teacher_ID?>">
                            <input type="text" name="teacher_id" id="teacher_id" value="<?=esc($teacher->teacher_ID)?>:<?=esc($teacher->teacherName)?>" class="recp_ann_clz" disabled>
                        </div>

                        <div class="recp_det_box">
                            <h4>Instructor ID: </h4>

                            <?php if(!empty($teach_instructors[$teacher->course_id])):?>
                            
                                <?php foreach($teach_instructors[$teacher->course_id] as $teach_instructor):?>
                                    <input type="text" value="<?=esc($teach_instructor->instructorName)?>" disabled>
                                    <!-- <input type="hidden" name="teacher_id" id="teacher_id" value="<?=$teacher->teacher_ID?>"> -->
                                    <input type="hidden" value="<?=$teach_instructor->emp_id?>" id="instructorID" name="instructorID">
                                    <input type="hidden" value="<?=$teach_instructor->course_id?>" id="courseID" name="courseID">
                                    <button type="submit" name="submit-remove-instructor"><span class="instructor-remove" >&times;</span></button> <br>
                                <?php endforeach;?>
                                
                            <?php else:?>
                                <p style="font-size: small;"><?=esc("No instrcutors to show!")?></p>
                            <?php endif;?>
                        </div>
                            
                        <div class="recp_det_box">
                            <h4>Day: </h4>
                            <select name="day" id="day" class="recp_ann_clz">
                            <option value="slct" selected>--select day--</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div><br>
                            
                        <div class="recp_det_box">
                            <h4>Time:</h4>
                            <div class="recp_det_dura">
                                <input type="time" name="timefrom" value="08:00" id="timefrom" class="recp_det_time">
                                <p> to </p>
                                <input type="time" name="timeto" value="08:00" id="timeto" class="recp_det_time">
                            </div>
                        </div>
                        <br><br>
                            
                        <button name="edit-teacher" type="submit" class="recp_det_btn">Save</button>
                        </form>
                     </div>
                </div>
            
                <?php endforeach;?>
                <?php endif;?>
            </table>
        </div>
        <br><br>

<!-- end of tamil table  -->
        </div>
<!-- end of content  -->
        


        <!-- delete course -->
        <div id="profileModal4" class="popupModal">
            <div class="tchr-popupmodal-content2">
                <span class="ann_close" onclick="closeModal4()">&times;</span><br>
                <h4>--Delete Course--</h4><br>
                <form action="" method="post" class="up-profile">
                    <div class="teacher-crs-activities2">
                        <label for="delete-sec" class="teacher-edit">Are you sure you want to delete this course? </label>
                        <!-- <input type="text" class="teacher-edit-title" name="title"> -->
                        <input type="hidden" value="" name="delete-course" id="delete-course">
                        <br><br>
                        <a href="<?=ROOT?>/receptionist/course/view/1/?id=<?=esc($teacher->subject_id)?>">
                        <button type="button" class="teacher_upl_btn" name="submit-delete-course" id="add-btn">Yes</button>
                        </a>
                        <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
                        
                



        <!-- add teachers popup -->
        <div id="profileModal" class="popupModal">
            <div class="popupmodal-content">
                <span class="ann_close" onclick="closeModal()">&times;</span><br>
                <h3>Add Teachers</h3><br>
                <form action="" method="post" class="up-profile">
                    <div class="recp_det_box">
                        <h4>Teacher ID: </h4>
                        <select name="teacher_id" id="teacher_id" class="recp_ann_clz">
                            <option value="" selected>--Select teacher id--</option>
                            <?php if(!empty($teachers)):?>
                            <?php foreach($teachers as $teacher):?>
                            <option  value="<?=$teacher->emp_id?>" ><?=esc($teacher->emp_id)?>:<?=esc($teacher->teacherName)?></option>
                            <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>
                    <br><br>
                    <div class="recp_det_box">
                    <h4>Day: </h4>
                    <select name="day" id="day" class="recp_ann_clz">
                    <option value="slct" selected>--select day--</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                    </div><br><br>
                    <div class="recp_det_box">
                        <h4>Time:</h4>
                        <div class="recp_det_dura">
                            <input type="time" name="timefrom" value="08:00" id="timefrom" class="recp_det_time">
                            <p> to </p>
                            <input type="time" name="timeto" value="08:00" id="timeto" class="recp_det_time">
                        </div>
                    </div><br>
                    <div class="recp_det_box">
                        <h4>Capacity:</h4>
                        <input type="text" class="recp_ann_clz" name="capacity">
                        <?php if(!empty($errors)):?>
                        <p class="warning"><?=$errors['capacity'];?></p>
                        <?php endif;?>
                    </div>
                    <button name="add-teacher" type="submit" class="recp_det_btn">Save</button>
                </form>
             </div>
        </div>
        <br><br>


        <!-- add instructor popup-->

        <div id="profileModal2" class="popupModal">
            <div class="popupmodal-content">
                <span class="ann_close" onclick="closeModal2()">&times;</span><br>
                <h3>Add Instructors</h3><br><br>
                <form action="" method="post" class="up-profile">
                    <input type="hidden" value="" id="modal2_course_id" name="course_id">
                <h4>Instructor ID: </h4><br>
                    <select name="emp_id" id="" class="recp_ann_clz">

                        <option value="slct" selected>--Select instructor id--</option>
                        <?php if(!empty($instructors)):?>
                        <?php foreach($instructors as $instructor):?>
                            <option  value="<?=$instructor->emp_id?>" ><?=esc($instructor->emp_id)?>:<?=esc($instructor->instructorName)?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                    </select><br><br>
                <button name="add-instructor" type="submit" class="recp_det_btn">Save</button>

                </form>
             </div>
        </div>


        



    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/mediumBar.js?v=<?php echo time(); ?>"></script>
<script defer src="<?=ROOT?>/assets/js/addcourse.js?v=<?php echo time(); ?>"></script>
<script defer src="<?=ROOT?>/assets/js/courseTime.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>