<?php $this->view("includes/header");?>
<?php $this->view("includes/nav"); 
$url = $_GET['url'];
$url = rtrim($url,'/');
$val = explode('/',$url);
?>


<div class="recp_cl_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_cl_content">
        <?php if(!empty($subjects)):?>
       
        <h2>Grade <?=esc($subjects[0]->grade)?> - <?=esc($subjects[0]->subject)?></h2>
        <br><br>
        <h3>About this course</h3>
        <p><?=esc($subjects[0]->description)?></p>
        
        <?php endif;?>
        <br>
        <h4><i>Choose the language medium</i> </h4><br>
        <nav class="recp_cl_navbar">
            <ul class="recp_cl_medium">

            <?php if(!empty($mediums)):?>
                    <?php foreach($mediums as $medium):?>
                    <li><a href="<?=ROOT?>/receptionist/course/view/1/?id=<?=$medium->subject_id?>" class="recp_cl_nav active"><?=$medium->language_medium?></a></li>
               <?php endforeach;?>
               <?php endif;?>

               
               <!-- <?php if( $val[3] == 1) :?> 
                    <?php echo ' <li><a href="'.ROOT.'/receptionist/course/view/1/?id='.$sinhalaid[0]->subject_id.'" class="recp_cl_nav active">Sinhala</a></li>';?>
                  

                <?php else :?>
                    <?php echo ' <li><a href="'.ROOT.'/receptionist/course/view/1/?id='.$sinhalaid[0]->subject_id.'" class="recp_cl_nav">Sinhala</a></li>';?>
                <?php endif;?>

                <?php if( $val[3] == 2) :?>
                    <?php echo ' <li><a href="'.ROOT.'/receptionist/course/view/2/?id='.$englishid[0]->subject_id.'" class="recp_cl_nav active">English</a></li>';?>
                 
                <?php else :?>
                    <?php echo '<li><a href="'.ROOT.'/receptionist/course/view/2/?id='.$englishid[0]->subject_id.'" class="recp_cl_nav">English</a></li>';?>
                <?php endif;?>

                <?php if( $val[3] == 3) :?> 
                    <?php echo ' <li><a href="'.ROOT.'/receptionist/course/view/3/?id='.$tamilid[0]->subject_id.'" class="recp_cl_nav active">Tamil</a></li>';?>
                   
                <?php else :?>
                    <?php echo '<li><a href="'.ROOT.'/receptionist/course/view/3/?id='.$tamilid[0]->subject_id.'" class="recp_cl_nav">Tamil</a></li>';?>
                <?php endif;?> -->
            </ul>
        </nav>
        <div id="profileModal" class="popupModal">
                       <div class="popupmodal-content">
                           <span class="ann_close" onclick="closeModal()">&times;</span><br>
                           <form action="" method="post" class="up-profile">
                           <h4>Teacher ID: </h4>
                                <select name="teacher_id" id="" class="recp_ann_clz">
                                    <option value="" selected>--Select teacher id--</option>
                                    <?php if(!empty($teachers)):?>
                                    <?php foreach($teachers as $teacher):?>
                                        <?=esc($teacher->firstname)?>
                                    <option  value="<?=$teacher->teacher_id?>" ><?=esc($teacher->teacher_id)?>:<?=esc($teacher->firstname)?></option>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </select>
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
                                        <input type="time" name="timefrom" value="08:00" id="" class="recp_det_time"> 
                                        <p> to </p>
                                        <input type="time" name="timeto" value="08:00" id="" class="recp_det_time">
                                    </div>
                                </div><br>
                                <button name="save-btn" type="submit" class="recp_det_btn">Save</button>
                           </form>
                        </div>
        </div>
        <br>

        <!-- content table -->
        <div class="recp_cl_staff">
            <table class="teacher-class-table">
                <th>Day</th>
                <th>Time</th>
                <th>Teacher  <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button1" class="teacher_crs_img2"></th>
                <th>Instructor  <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button2" class="teacher_crs_img2"></th>
                <th></th>
                <?php if(!empty($subjects)):?>
                <?php foreach($subjects as $teacher):?>
                <tr>
                    
                    <td><?=esc($teacher->day)?></td>
                    <td><?=esc($teacher->timefrom)?> - <?=esc($teacher->timeto)?></td>
                    <td><?=esc($teacher->teacherName)?>
                        <?php if(empty($teacher->teacherName)):?>
                            <?php echo "No teachers assigned!";?>
                        <?php endif?>
                    </td>
                    <?php foreach($instructors as $instructor):?>
                    <td><?=esc($instructor->instructorName)?>
                        <?php if(empty($instructor->instructorName)):?>
                            <?php echo "No instructors assigned!";?>
                        <?php endif?>       
                    </td>
                    <?php endforeach;?>
                    <td>
                        <a href="<?=ROOT?>/receptionist/course/edit/<?=esc($teacher->course_id)?>">
                            <img src="<?=ROOT?>/assets/images/edit.png" class="teacher_crs_img2" id="button28" onclick="openModal()">
                        </a>
                        <a href="<?=ROOT?>/receptionist/course/delete/<?=esc($teacher->course_id)?>">
                            <img src="<?=ROOT?>/assets/images/delete.png" class="teacher_crs_img2" id="button35" onclick="openModal4(<?=esc($teacher->course_id)?>)">
                        </a>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
            </table>
        </div>
        <br><br>

        <!-- add teachers popup -->
        <div class="outer-popup1" id="popup1">
            <div class="wrapper-popup">
                <div>
                    <h2>Add Teachers</h2>
                </div>
                <br>
                <span onclick='document.querySelector(".outer-popup1").style.display = "none";' class="close1">&times;</span>
                <br>
                <form method="post">
                    <h4>Teacher ID: </h4>
                    <select name="teacher_id" id="" class="recp_ann_clz">
                        <option value="" selected>--Select teacher id--</option>
                        <?php if(!empty($teachers)):?>
                        <?php foreach($teachers as $teacher):?>
                            <?=esc($teacher->firstname)?>
                        <option  value="<?=$teacher->teacher_id?>" ><?=esc($teacher->teacher_id)?>:<?=esc($teacher->firstname)?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                    </select>
                    <br>
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
                    <br>
                    <h4>Time:</h4>
                    <div class="recp_det_dura">
                        <input type="time" name="timefrom" value="08:56" id="" class="recp_det_time">
                        <p> to </p>
                        <input type="time" name="timeto" value="08:56" id="" class="recp_det_time">
                    </div>
                    <br>
                    <button name="save-btn" type="submit" class="recp_det_btn">Save</button>
                </form>
            </div>
        </div>

        <script>
            document.getElementById('button1').addEventListener("click",function(){
            document.querySelector(".outer-popup1").style.display = "flex";
            })
            document.getElementById('.close1').addEventListener("click",function(){
            document.querySelector(".outer-popup1").style.display = "none";
            })
        </script>
                
        <br><br>


        <!-- add instructor popup         -->

        <div class="outer-popup2" id="popup1">
            <div class="wrapper-popup">
                <h2>Add Instructors</h2>
                <button onclick='document.querySelector(".outer-popup2").style.display = "none";' class="close2">&times;</button>
                    <br>
                <form method="post">
                <h4>Teacher ID: </h4>
                    <select name="teacher_id" id="" class="recp_ann_clz">
                        <option value="" selected>--Select teacher id--</option>
                        <?php if(!empty($teachers)):?>
                        <?php foreach($teachers as $teacher):?>
                            <?=esc($teacher->firstname)?>
                            <option  value="<?=$teacher->teacher_id?>" ><?=esc($teacher->teacher_id)?>:<?=esc($teacher->firstname)?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                    </select>
                <h4>Instructor ID: </h4>
                    <select name="instructor_id" id="" class="recp_ann_clz">
                        <option value="" selected>--Select instructor id--</option>
                        <?php if(!empty($instructors)):?>
                        <?php foreach($instructors as $instructor):?>
                            <?=esc($instructor->firstname)?>
                            <option  value="<?=$instructor->instructor_id?>" ><?=esc($instructor->instructor_id)?>:<?=esc($instructor->firstname)?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                    </select>
                    <!-- <div class="recp_det_box"> -->
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
                    <!-- </div> -->
                <br>
                    <!-- <div class="recp_det_box"> -->
                <h4>Time:</h4>
                    <div class="recp_det_dura">
                        <input type="time" name="timefrom" value="08:56" id="" class="recp_det_time">
                        <p> to </p>
                        <input type="time" name="timeto" value="08:56" id="" class="recp_det_time">
                    </div>
                    <!-- </div> -->
                <br><br>
                <button name="save-btn2" type="submit" class="recp_det_btn">Save</button>

                </form>
            </div>
        </div>

        <script>
            document.getElementById('button2').addEventListener("click",function(){
                document.querySelector(".outer-popup2").style.display = "flex";
            })
            document.getElementById('.close2').addEventListener("click",function(){
                document.querySelector(".outer-popup2").style.display = "none";
            })
        </script>
                <!-- </div> -->
            <!-- </div> -->

        <!-- edit teachers class -->
        <div id="profileModal" class="popupModal">
            <div class="popupmodal-content">
                <span class="ann_close" onclick="closeModal()">&times;</span><br>
                <form action="" method="post" class="up-profile">
                    <h4>Teacher ID: </h4>
                    <select name="teacher_id" id="" class="recp_ann_clz">
                        <option value="" selected>--Select teacher id--</option>
                        <?php if(!empty($teachers)):?>
                        <?php foreach($teachers as $teacher):?>
                            <?=esc($teacher->firstname)?>
                        <option  value="<?=$teacher->teacher_id?>" ><?=esc($teacher->teacher_id)?>:<?=esc($teacher->firstname)?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                    </select>
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
                            <input type="time" name="timefrom" value="08:00" id="" class="recp_det_time">
                            <p> to </p>
                            <input type="time" name="timeto" value="08:00" id="" class="recp_det_time">
                        </div>
                    </div><br>
                    <button name="save-btn" type="submit" class="recp_det_btn">Save</button>
                </form>
             </div>
        </div>

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
                        <button type="submit" class="teacher_upl_btn" name="submit-delete-course" id="add-btn">Yes</button>
                        <button type="reset" class="teacher_upl_btn" id="cancel-btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/addcourse.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>