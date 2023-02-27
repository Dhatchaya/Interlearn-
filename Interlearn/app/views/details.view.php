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
               
               <?php if( $val[3] == 1) :?> 
                    <?php echo ' <li><a href="'.ROOT.'/receptionist/course/view/1/?id='.$subjects[0]->subject_id.'" class="recp_cl_nav active">Sinhala</a></li>';?>
                    <?php if(empty($subjects)):?>
                        <br><button class="recp_cl_btn" id="button28" onclick="openModal()">+Add medium</button>
                    <?php endif;?>

                <?php else :?>
                    <?php echo ' <li><a href="'.ROOT.'/receptionist/course/view/1/?id='.$subjects[0]->subject_id.'" class="recp_cl_nav">Sinhala</a></li>';?>
                <?php endif;?>

                <?php if( $val[3] == 2) :?>
                    <?php echo ' <li><a href="'.ROOT.'/receptionist/course/view/2/?id='.$subjects[0]->subject_id.'" class="recp_cl_nav active">English</a></li>';?>
                    <?php if(empty($subjects)):?>
                        <br><button class="recp_cl_btn" id="button28" onclick="openModal()">+Add medium</button>
                    <?php endif;?>
                <?php else :?>
                    <?php echo '<li><a href="'.ROOT.'/receptionist/course/view/2/?id='.$subjects[0]->subject_id.'" class="recp_cl_nav">English</a></li>';?>
                <?php endif;?>

                <?php if( $val[3] == 3) :?> 
                    <?php echo ' <li><a href="'.ROOT.'/receptionist/course/view/3/?id='.$subjects[0]->subject_id.'" class="recp_cl_nav active">Tamil</a></li>';?>
                    <?php if(empty($subjects)):?>
                        <br><button class="recp_cl_btn" id="button28" onclick="openModal()">+Add medium</button>
                    <?php endif;?>
                <?php else :?>
                    <?php echo '<li><a href="'.ROOT.'/receptionist/course/view/3/?id='.$subjects[0]->subject_id.'" class="recp_cl_nav">Tamil</a></li>';?>
                <?php endif;?>
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

        <div class="recp_cl_staff">
            <table>
                <th>Day</th>
                <th>Time</th>
                <th>Teacher  <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button1" class="teacher_crs_img2"></th>
                <th>Instructor  <img src="<?=ROOT?>/assets/images/plus.png" alt="" id="button2" class="teacher_crs_img2"></th>
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
                    <td><?=esc($teacher->instructorName)?>
                        <?php if(empty($teacher->instructorName)):?>
                            <?php echo "No instructors assigned!";?>
                        <?php endif?>       
                    </td>
                    
                </tr>
                <?php endforeach;?>
                    <?php endif;?>
            </table>
            <br><br>
                <div class="recp_cl_head">
                            <!-- <button class="recp_cl_btn" id="button1">+Add new teacher</button> -->
                            <div class="outer-popup1" id="popup1">
                            <div class="wrapper-popup">
                                <h2>Add Teachers</h2>
                                <span onclick='document.querySelector(".outer-popup1").style.display = "none";' class="close1">&times;</span>
                                <br>
                            <form method="post">
                            <h4>Teacher ID: </h4>
                                <select name="teacher_id" id="" class="recp_ann_clz">
                                    <option value="" selected>--Select teacher id--</option>
                                    <?php 
                                    
                                    if(!empty($teachers)):?>
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
                                        <input type="time" name="timefrom" value="08:56" id="" class="recp_det_time"> 
                                        <p> to </p>
                                        <input type="time" name="timeto" value="08:56" id="" class="recp_det_time">
                                    </div>
                                </div><br>
                                <button name="save-btn" type="submit" class="recp_det_btn">Save</button>
                            </div>
                            </form>
                            </div>

                            <script>
                                document.getElementById('button1').addEventListener("click",function(){
                                document.querySelector(".outer-popup1").style.display = "flex";
                                })
                                document.getElementById('.close1').addEventListener("click",function(){
                                document.querySelector(".outer-popup1").style.display = "none";
                                })
                            </script>
                </div>
                </div>

                
                <br><br>
                <div class="recp_cl_head">
                            <!-- <button class="recp_cl_btn" id="button2">+Add new instructor</button> -->
                            <div class="outer-popup2" id="popup1">
                            <div class="wrapper-popup">
                                <h2>Add Instructors</h2>
                                <button onclick='document.querySelector(".outer-popup2").style.display = "none";' class="close2">&times;</button>
                                <br>
                            <form method="post">
                            <h4>Teacher ID: </h4>
                                <select name="teacher_id" id="" class="recp_ann_clz">
                                    <option value="" selected>--Select teacher id--</option>
                                    <?php 
                                    
                                    if(!empty($teachers)):?>
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
                                        <input type="time" name="timefrom" value="08:56" id="" class="recp_det_time"> 
                                        <p> to </p>
                                        <input type="time" name="timeto" value="08:56" id="" class="recp_det_time">
                                    </div>
                                </div><br><br>
                                <button name="save-btn2" type="submit" class="recp_det_btn">Save</button>
                            </div>
                            </form>
                            </div>

                    <script>
                                document.getElementById('button2').addEventListener("click",function(){
                                document.querySelector(".outer-popup2").style.display = "flex";
                                })
                                document.getElementById('.close2').addEventListener("click",function(){
                                document.querySelector(".outer-popup2").style.display = "none";
                                })
                            </script>
                </div>
            </div>
            </div>
            <br><br>
            <br>
        </div>
    </div>
</div>
<script defer src="<?=ROOT?>/assets/js/announcement.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>