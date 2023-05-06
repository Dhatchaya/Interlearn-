<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_det_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_det_content">
        <h2>Add new course</h2><br>
        <form method="post" action="" enctype="multipart/form-data">
        <?php if(!empty($errors)){show($errors) ;} ?>
        <!-- <div class="recp_crs_add"> -->
            

            <div class="recp_det_box" id="new">
            <h4>Subject:</h4><br>
                <input type="text" class="recp_det_name" name="subject" id="subject">
                <div id="alert-div1" style="display:none;" class="warning"></div>
            </div>
            <br><br><br>

            <div class="recp_det_box">
            <h4>Grade:</h4>
            <select name="grade" id="grades" class="recp_dropdown_clz">
                    <option value="grade" selected>--Select grade--</option>
                   <option value="6">Grade 6</option>
                   <option value="7">Grade 7</option>
                   <option value="8">Grade 8</option>
                   <option value="9">Grade 9</option>
                   <option value="10">Grade 10</option>
                   <option value="11">Grade 11</option>
                   <option value="12">Grade 12</option>
                   <option value="13">Grade 13</option>
                </select>
                <div id="alert-div2" style="display:none;" class="warning"></div>
            </div><br><br>
            <div class="recp_det_box">
                <h4>Language Medium:</h4>
                <select name="language_medium" id="mediums" class="recp_dropdown_clz">
                <!-- <input type="hidden" name="medium" id="medium"> -->
                    <option value="language_medium" selected>--select language medium--</option>
                    <option value="Sinhala">Sinhala</option>
                    <option value="English">English</option>
                    <option value="Tamil">Tamil</option>

                </select>
                <div id="alert-div3" style="display:none;" class="warning"></div>
                <?php if(!empty($errors)):?>
                <p class="warning"><?=$errors['language_medium'];?></p>
                <?php endif;?>
            </div>
            <br><br>

            <div class="recp_det_box">
                <h4>Description:</h4><br>
                <input type="text" class="recp_det_name" name="description" id="description">
                <div id="alert-div4" style="display:none;" class="warning"></div>
                <?php if(!empty($errors)):?>
                <p class="warning"><?=$errors['description'];?></p>
                <?php endif;?>
            </div><br><br><br>
            

            <div class="recp_det_box">
            <h4>Teacher ID:</h4>
            <select name="teacher_id" id="teacher_id" class="recp_dropdown_clz">
                <option value="" selected>--Select teacher id--</option>
                <?php if(!empty($teachers)):?>
                <?php foreach($teachers as $teacher):?>
                <option  value="<?=$teacher->emp_id?>" ><?=esc($teacher->emp_id)?>:<?=esc($teacher->teacherName)?></option>
                <?php endforeach;?>
                <?php endif;?>
            </select>
            <div id="alert-div5" style="display:none;" class="warning"></div>

            <p id="addCourseerror" class="warning"></p>
            <?php if(!empty($errors)):?>
                <p class="warning"><?=$errors['teacher_id'];?></p>
                <?php endif;?>
            </div><br><br>

            <div class="recp_det_box">
            <h4>Day: </h4>
            <select name="day" id="day" class="recp_dropdown_clz">
            <option value="slct" selected>--select day--</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            <div id="alert-div6" style="display:none;" class="warning"></div>
            <?php if(!empty($errors)):?>
                <p class="warning"><?=$errors['day'];?></p>
                <?php endif;?>
            </div><br><br>

            <div class="recp_det_box">
                <h4>Time:</h4>
                <div class="recp_det_dura">
                    <input type="time" name="timefrom" value="00:00" id="timefrom" class="recp_det_time">
                    <?php if(!empty($errors)):?>
                    <p class="warning"><?=$errors['timefrom'];?></p>
                    <?php endif;?>
                    <p> to </p>
                    <input type="time" name="timeto" value="00:00" id="timeto" class="recp_det_time">
                    <?php if(!empty($errors)):?>
                    <p class="warning"><?=$errors['timeto'];?></p>
                    <?php endif;?>
                </div>

            </div>
            <br>
            <div class="recp_det_box">
                <h4>Capacity:</h4><br>
                <input type="text" class="recp_det_name" name="capacity" id="capacity">
                <?php if(!empty($errors)):?>
                <p class="warning"><?=$errors['capacity'];?></p>
                <?php endif;?>
            </div>
            <br><br>
            <div class="recp_add_butn">
                <a href="<?=ROOT?>/receptionist/course">
                    <button type="button" class="recp_det_btn">Cancel</button>
                </a>
                <button name="courseSubmitBtn" type="submit" class="recp_det_btn" id="courseSubmitBtn">Save</button>
            </div>
            
        <!-- </div> -->
        </form>
    </div>
</div>
<!-- <script defer src="<?=ROOT?>/assets/js/addCourse.js?v=<?php echo time(); ?>"></script> -->
<script defer src="<?=ROOT?>/assets/js/selectCourse.js?v=<?php echo time(); ?>"></script>
<?php $this->view("includes/footer");?>

            