<?php $this->view("includes/header");?>
<?php $this->view("includes/nav");?>

<div class="recp_det_container">
<?php $this->view("includes/sidebar_recep");?>
    <div class="recp_det_content">
        <h2>--Add a new course--</h2><br>
        <form method="post" action="" enctype="multipart/form-data">
        <?php if(!empty($error)){echo $error;} ?>
        <!-- <div class="recp_crs_add"> -->
            
            <div class="recp_det_box" id="new">
            <h4>Subject:</h4>
                <!-- <select name="subject" id="" class="recp_ann_clz"> -->
                <!-- <input type="hidden" name="name" id="name"> -->
                <input type="text" class="recp_det_name" name="subject">
                    <!-- <option value="subject" selected>--Select subject--</option>
                    <?php if(!empty($subjects)):?>
                    <?php foreach($subjects as $subject):?>
                    <option  value="<?=esc($subject->subject)?>" ><?=esc($subject->subject)?></option>
                    
                    <?php endforeach;?>
                    <?php endif;?> -->
                <!-- </select> -->
            </div>
            <br><br>

            <div class="recp_det_box">
            <h4>Grade:</h4>
            <select name="grade" id="" class="recp_ann_clz">
            <!-- <input type="hidden" name="grade" id="grade"> -->
                    <option value="grade" selected>--Select grade--</option>
                   <option value="6">Grade 6</option>
                   <option value="7">Grade 7</option>
                   <option value="8">Grade 8</option>
                   <option value="9">Grade 9</option>
                   <option value="10">Grade 10</option>
                   <option value="11">Grade 11</option>
                   <option value="A/L">Grade A/L</option>
                </select>
            </div><br><br>
            <div class="recp_det_box">
                <h4>Language Medium:</h4>
                <select name="language_medium" id="" class="recp_ann_clz">
                <!-- <input type="hidden" name="medium" id="medium"> -->
                    <option value="language_medium" selected>--select language medium--</option>
                    <option value="Sinhala">Sinhala</option>
                    <option value="English">English</option>
                    <option value="Tamil">Tamil</option>
                    
                </select>
            </div>
            <br><br>

            <div class="recp_det_box">
            <h4>Description:</h4>
                <input type="text" class="recp_det_name" name="description">
            </div><br><br>
            

            <div class="recp_det_box">
            <h4>Teacher ID:</h4>
            <select name="teacher_id" id="" class="recp_ann_clz">
                <option value="" selected>--Select teacher id--</option>
                <?php if(!empty($teachers)):?>
                <?php foreach($teachers as $teacher):?>
                <option  value="<?=$teacher->teacher_id?>" ><?=esc($teacher->teacher_id)?>:<?=esc($teacher->firstname)?></option>
                <?php endforeach;?>
                <?php endif;?>
            </select>
            </div><br><br>

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
            </div>
            <br><br>
            <!-- <div class="recp_det_box">
                <h4>Upload image:</h4><br>
                <div class="recp_det_dura">
                    <input type="file" name="uploadimg" id="uploadimg">
                </div>
            </div> -->
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
<script src="<?=ROOT?>/public/assets/js/addcourse.js"></script>
<?php $this->view("includes/footer");?>

            